<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\JenisSurat;
use App\Models\Skck;
use App\Models\Sktm;
use App\Models\SuratKeteranganDomisili;
use App\Models\SuratKeteranganKehilangan;
use App\Models\SuratKeteranganKematian;
use App\Models\SuratKeteranganMauMenikah;
use App\Models\SuratKeteranganPemilikRumah;
use App\Models\SuratKeteranganUsaha;
use App\Models\SuratPenghasilanOrangTua;
use App\Models\SuratSudahMenikah;

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

public function show($id)
{
    $surat = Surat::with(['user'])->findOrFail($id);

    // Ambil data detail tambahan berdasarkan jenis_surat
    $dataTambahan = null;

    switch ($surat->jenis_surat) {
        case 'sktm':
            $dataTambahan = $surat->sktm;
            break;
        case 'skck':
            $dataTambahan = $surat->skck;
            break;
        case 'domisili':
            $dataTambahan = $surat->suratKeteranganDomisili;
            break;
        case 'kehilangan':
            $dataTambahan = $surat->suratKeteranganKehilangan;
            break;
        case 'kematian':
            $dataTambahan = $surat->suratKeteranganKematian;
            break;
        case 'mau_menikah':
            $dataTambahan = $surat->suratKeteranganMauMenikah;
            break;
        case 'kepemilikan_rumah':
            $dataTambahan = $surat->suratKeteranganPemilikRumah;
            break;
        case 'usaha':
            $dataTambahan = $surat->suratKeteranganUsaha;
            break;
        case 'penghasilan_ortu':
            $dataTambahan = $surat->suratPenghasilanOrangTua;
            break;
        case 'sudah_menikah':
            $dataTambahan = $surat->suratSudahMenikah;
            break;
    }

    return view('pages.service-letters.show', compact('surat', 'dataTambahan'));
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

    // Mapping jenis surat ke nama model
     $modelMap = [
        'skck' => Skck::class,
        'sktm' => Sktm::class,
        'domisili' => SuratKeteranganDomisili::class,
        'kehilangan' => SuratKeteranganKehilangan::class,
        'kematian' => SuratKeteranganKematian::class,
        'mau_menikah' => SuratKeteranganMauMenikah::class,
        'kepemilikan_rumah' => SuratKeteranganPemilikRumah::class,
        'usaha' => SuratKeteranganUsaha::class,
        'penghasilan_ortu' => SuratPenghasilanOrangtua::class,
        'sudah_menikah' => SuratSudahMenikah::class,
    ];

    $modelClass = $modelMap[$jenis] ?? null;

    if (!$modelClass) {
        return abort(404, 'Jenis surat tidak dikenal.');
    }

    // Ambil data detail surat dari model terkait berdasarkan surats_id
    $detail = $modelClass::where('surats_id', $id)->first();

    // Nama view sesuai konvensi
    $viewName = 'user.surat.persyaratan-' . $jenis;

    if (view()->exists($viewName)) {
        return view($viewName, compact('surat', 'detail'));
    }

    return abort(404, 'Form persyaratan untuk jenis surat ini belum tersedia.');
}
}
