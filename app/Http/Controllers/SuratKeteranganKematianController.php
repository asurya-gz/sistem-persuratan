<?php

namespace App\Http\Controllers;

use App\Models\SuratKeteranganKematian;
use Illuminate\Http\Request;

class SuratKeteranganKematianController extends Controller
{
    public function index()
    {
        $data = SuratKeteranganKematian::with('surat')->get();
        return response()->json($data);
    }

    public function findBySuratsId($surats_id)
    {
        $data = SuratKeteranganKematian::where('surats_id', $surats_id)->first();

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
        'nama' => 'required',
        'nik' => 'required',
        'jenis_kelamin' => 'required',
        'umur' => 'required|numeric',
        'pekerjaan' => 'required',
        'alamat' => 'required',
        'tanggal_kematian' => 'required|date',
        'waktu_kematian' => 'required',
        'tempat_kematian' => 'required',
        'penyebab_kematian' => 'required',
        'nama_pelapor' => 'required',
        'hubungan_dengan_meninggal' => 'required',
        'no_telp' => 'required',
        'email' => 'required|email',
    ]);

    SuratKeteranganKematian::create($request->all());

    return redirect()->route('surat.index')->with('success', 'Data persyaratan kematian berhasil disimpan.');
}

}
