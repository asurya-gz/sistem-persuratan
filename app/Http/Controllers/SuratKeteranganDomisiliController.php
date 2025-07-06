<?php

namespace App\Http\Controllers;

use App\Models\SuratKeteranganDomisili;
use Illuminate\Http\Request;

class SuratKeteranganDomisiliController extends Controller
{
    public function index()
    {
        $data = SuratKeteranganDomisili::with('surat')->get();
        return response()->json($data);
    }

    public function findBySuratsId($surats_id)
    {
        $data = SuratKeteranganDomisili::where('surats_id', $surats_id)->first();

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
        'nik' => 'required',
        'tempat_lahir' => 'required',
        'tanggal_lahir' => 'required|date',
        'jenis_kelamin' => 'required',
        'agama' => 'required',
        'status_perkawinan' => 'required',
        'warga_negara' => 'required',
        'pekerjaan' => 'required',
        'alamat' => 'required',
        'no_telp' => 'required',
        'email' => 'required|email',
    ]);

    SuratKeteranganDomisili::create($request->all());

    return redirect()->route('surat.index')->with('success', 'Data persyaratan domisili berhasil disimpan.');
}

}
