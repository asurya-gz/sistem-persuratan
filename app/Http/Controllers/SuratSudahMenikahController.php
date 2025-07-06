<?php

namespace App\Http\Controllers;

use App\Models\SuratSudahMenikah;
use Illuminate\Http\Request;

class SuratSudahMenikahController extends Controller
{
    public function index()
    {
        $data = SuratSudahMenikah::with('surat')->get();
        return response()->json($data);
    }

    public function findBySuratsId($surats_id)
    {
        $data = SuratSudahMenikah::where('surats_id', $surats_id)->first();

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
    'nama_pria' => 'required',
    'nik_pria' => 'required',
    'tempat_lahir_pria' => 'required',
    'tanggal_lahir_pria' => 'required',
    'warga_negara_pria' => 'required',
    'agama_pria' => 'required',
    'alamat_pria' => 'required',

    'nama_wanita' => 'required',
    'nik_wanita' => 'required',
    'tempat_lahir_wanita' => 'required',
    'tanggal_lahir_wanita' => 'required',
    'warga_negara_wanita' => 'required',
    'agama_wanita' => 'required',
    'alamat_wanita' => 'required',

    'tanggal_pernikahan' => 'required',
    'alamat_pernikahan' => 'required',

    'no_telp' => 'required',
    'email' => 'required',
]);


        SuratSudahMenikah::create($request->all());

        return redirect()->route('surat.index')->with('success', 'Data berhasil disimpan.');
    }
}
