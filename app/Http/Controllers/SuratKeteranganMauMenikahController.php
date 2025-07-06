<?php

namespace App\Http\Controllers;

use App\Models\SuratKeteranganMauMenikah;
use Illuminate\Http\Request;

class SuratKeteranganMauMenikahController extends Controller
{
    public function index()
    {
        $data = SuratKeteranganMauMenikah::with('surat')->get();
        return response()->json($data);
    }

    public function findBySuratsId($surats_id)
    {
        $data = SuratKeteranganMauMenikah::where('surats_id', $surats_id)->first();

        if ($data) {
            return response()->json(['status' => 'success', 'data' => $data]);
        }

        return response()->json([
            'status' => 'not found',
            'message' => 'Data tidak ditemukan.'
        ], 404);
    }
    public function store(Request $request)
{
    $request->validate([
        'surats_id' => 'required|exists:surats,id',
        'tanggal_pernikahan' => 'required|date',

        'nama_pria' => 'required',
        'nik_pria' => 'required',
        'tempat_lahir_pria' => 'required',
        'tanggal_lahir_pria' => 'required|date',
        'warga_negara_pria' => 'required',
        'agama_pria' => 'required',
        'alamat_pria' => 'required',

        'nama_wanita' => 'required',
        'nik_wanita' => 'required',
        'tempat_lahir_wanita' => 'required',
        'tanggal_lahir_wanita' => 'required|date',
        'warga_negara_wanita' => 'required',
        'agama_wanita' => 'required',
        'alamat_wanita' => 'required',

        'alamat_pernikahan' => 'required',
        'no_telp' => 'required',
        'email' => 'required|email',
    ]);

    SuratKeteranganMauMenikah::create($request->all());

    return redirect()->route('surat.index')->with('success', 'Data persyaratan menikah berhasil disimpan.');
}

}
