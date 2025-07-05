<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\JenisSurat;

class SuratController extends Controller
{
    // Untuk user: ajukan surat
    public function create()
    {
        $jenisSurats = JenisSurat::orderBy('name')->get();
        return view('user.surat.create', compact('jenisSurats'));
    }

    // Simpan pengajuan surat
    public function store(Request $request)
    {
        $request->validate([
            'jenis_surat' => 'required',
            'tujuan' => 'required',
            'keterangan' => 'nullable'
        ]);

        $surat = Surat::create([
            'user_id' => Auth::id(),
            'jenis_surat' => $request->jenis_surat,
            'tujuan' => $request->tujuan,
            'keterangan' => $request->keterangan
        ]);

        // Redirect ke form persyaratan berdasarkan jenis surat
        return redirect()->route('persyaratan.form', ['id' => $surat->id])
                         ->with('success', 'Pengajuan surat berhasil. Silakan lengkapi data persyaratan.');
    }

    // Untuk user: lihat daftar surat miliknya
    public function index()
    {
        $surats = Surat::where('user_id', Auth::id())->get();
        return view('pages.service-letters.user-index', compact('surats'));
    }

    // Untuk admin: lihat semua surat
    public function admin_index(Request $request)
    {
        $query = Surat::with('user');

        if ($request->filled('nama')) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->nama . '%');
            });
        }

        if ($request->filled('tanggal')) {
            $query->whereDate('created_at', $request->tanggal);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $surats = $query->latest()->get(); 
        return view('pages.service-letters.index', compact('surats'));
    }

    // Tampilkan detail surat
    public function show($id)
    {
        $surat = Surat::with('user')->findOrFail($id);

        if (Auth::user()->role === 'User' && $surat->user_id !== Auth::id()) {
            abort(403);
        }

        return view('pages.service-letters.show', compact('surat'));
    }

    // Untuk admin: update status surat
    public function update_status($id, $status)
    {
        \Log::info("Update surat: ID $id ke status $status");

        $surat = Surat::findOrFail($id);
        $surat->status = $status;
        $surat->save();

        return redirect()->route('admin.surat.index')->with('success', 'Status surat berhasil diperbarui.');
    }

    // Download PDF surat
    public function download($id)
    {
        $surat = Surat::findOrFail($id);

        if ($surat->status !== 'disetujui') {
            abort(403, 'Surat belum disetujui');
        }

        $pdf = Pdf::loadView('pdf.surat-template', ['surat' => $surat]);
        return $pdf->download('surat_keterangan_' . $surat->id . '.pdf');
    }

    // Preview PDF surat
    public function preview($id)
    {
        $surat = Surat::with('user')
            ->where('id', $id)
            ->where('user_id', auth()->id())
            ->first();

        if (!$surat) {
            return redirect()->back()->with('error', 'Surat tidak ditemukan atau Anda tidak memiliki akses.');
        }

        if ($surat->status !== 'disetujui') {
            return redirect()->back()->with('error', 'Surat belum disetujui.');
        }

        try {
            $pdf = PDF::loadView('surat.bukti-keterangan', compact('surat'));
            $pdf->setPaper('A4', 'portrait');
            return $pdf->stream('preview-bukti-keterangan-' . $surat->id . '.pdf');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menampilkan preview: ' . $e->getMessage());
        }
    }

    // Tampilkan form persyaratan berdasarkan jenis surat
    public function formPersyaratan($id)
    {
        $surat = Surat::findOrFail($id);
        $jenis = strtolower($surat->jenis_surat);
        $viewName = 'user.surat.persyaratan-' . $jenis;

        if (view()->exists($viewName)) {
            return view($viewName, compact('surat'));
        }

        return abort(404, 'Form persyaratan untuk jenis surat ini belum tersedia.');
    }
}
