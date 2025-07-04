<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuratController extends Controller
{
    // Untuk user: ajukan surat
    public function create()
    {
        return view('pages.service-letters.create'); // GANTI path view
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_surat' => 'required',
            'tujuan' => 'required',
            'keterangan' => 'nullable'
        ]);

        Surat::create([
            'user_id' => Auth::id(),
            'jenis_surat' => $request->jenis_surat,
            'tujuan' => $request->tujuan,
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('surat.index')->with('success', 'Pengajuan surat berhasil.');
    }

    // Untuk user: lihat daftar surat miliknya
    public function index()
    {
        $surats = Surat::where('user_id', Auth::id())->get();
        return view('pages.service-letters.user-index', compact('surats')); // GANTI path view
    }

    // Untuk admin: lihat semua surat
public function admin_index(Request $request)
{
    $query = Surat::with('user');

    // Filter berdasarkan nama pemohon
    if ($request->filled('nama')) {
        $query->whereHas('user', function ($q) use ($request) {
            $q->where('name', 'like', '%' . $request->nama . '%');
        });
    }

    // Filter berdasarkan tanggal (satu tanggal saja)
    if ($request->filled('tanggal')) {
        $query->whereDate('created_at', $request->tanggal);
    }

    // Filter berdasarkan status
    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    $surats = $query->latest()->get(); 


    return view('pages.service-letters.index', compact('surats'));
}




public function show($id)
{
    $surat = Surat::findOrFail($id);

    if (Auth::user()->role === 'User' && $surat->user_id !== Auth::id()) {
        abort(403); // Tidak diizinkan
    }

    return view('pages.service-letters.show', compact('surat'));
}




    // Untuk admin: update status
  public function update_status($id, $status)
{
    \Log::info("Update surat: ID $id ke status $status");

    $surat = Surat::findOrFail($id);
    $surat->status = $status;
    $surat->save();

    return redirect()->route('admin.surat.index')->with('success', 'Status surat berhasil diperbarui.');
}

}
