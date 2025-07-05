<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

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




// Ganti kedua method show() dengan satu method ini saja
public function show($id)
{
    $surat = Surat::with('user')->findOrFail($id);
    
    // Cek authorization untuk User role
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

public function download($id)
{
    $surat = Surat::findOrFail($id);

    // Hanya izinkan download jika status disetujui
    if ($surat->status !== 'disetujui') {
        abort(403, 'Surat belum disetujui');
    }

    // Ambil view dan generate PDF (TANPA menyimpannya di storage)
    $pdf = Pdf::loadView('pdf.surat-template', ['surat' => $surat]);

    // Langsung kembalikan file sebagai download response
    return $pdf->download('surat_keterangan_'.$surat->id.'.pdf');
}

    /**
     * Preview bukti keterangan surat sebelum download (opsional)
     */
    public function preview($id)
    {
        // Ambil data surat berdasarkan ID dan pastikan milik user yang login
        $surat = Surat::with('user')
            ->where('id', $id)
            ->where('user_id', auth()->id())
            ->first();

        // Validasi surat
        if (!$surat) {
            return redirect()->back()->with('error', 'Surat tidak ditemukan atau Anda tidak memiliki akses untuk melihat surat ini.');
        }

        // Validasi status surat
        if ($surat->status !== 'disetujui') {
            return redirect()->back()->with('error', 'Surat belum disetujui, tidak dapat dilihat.');
        }

        try {
            // Generate PDF untuk preview
            $pdf = PDF::loadView('surat.bukti-keterangan', compact('surat'));
            $pdf->setPaper('A4', 'portrait');
            
            // Stream PDF ke browser (preview)
            return $pdf->stream('preview-bukti-keterangan-' . $surat->id . '.pdf');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menampilkan preview: ' . $e->getMessage());
        }
    }

}
