<?php

namespace App\Http\Controllers;

use App\Models\Sktm;
use Illuminate\Http\Request;

class SktmController extends Controller
{
    // Menampilkan semua data SKTM
    public function index()
    {
        $sktmList = Sktm::with('surat')->get();
        return response()->json($sktmList);
    }

    // Mencari data SKTM berdasarkan surats_id
    public function findBySuratsId($surats_id)
    {
        $sktm = Sktm::where('surats_id', $surats_id)->first();

        if ($sktm) {
            return response()->json([
                'status' => 'success',
                'data' => $sktm
            ]);
        } else {
            return response()->json([
                'status' => 'not found',
                'message' => 'Data SKTM dengan surats_id tersebut tidak ditemukan.'
            ], 404);
        }
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

    Sktm::create($request->all());

    return redirect()->route('surat.index')->with('success', 'Data persyaratan SKTM berhasil disimpan.');
}

}
