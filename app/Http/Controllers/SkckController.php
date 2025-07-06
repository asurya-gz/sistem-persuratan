<?php

namespace App\Http\Controllers;

use App\Models\Skck;
use Illuminate\Http\Request;

class SkckController extends Controller
{
    // Menampilkan semua data SKCK
    public function index()
    {
        $skckList = Skck::with('surat')->get();
        return response()->json($skckList);
    }

    // Mencari data SKCK berdasarkan surats_id
    public function findBySuratsId($surats_id)
    {
        $skck = Skck::where('surats_id', $surats_id)->first();

        if ($skck) {
            return response()->json([
                'status' => 'success',
                'data' => $skck
            ]);
        } else {
            return response()->json([
                'status' => 'not found',
                'message' => 'Data SKCK dengan surats_id tersebut tidak ditemukan.'
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
        'warga_negara' => 'required',
        'pekerjaan' => 'required',
        'alamat' => 'required',
        'no_telp' => 'required',
        'email' => 'required|email',
    ]);

    Skck::create($request->all());

    return redirect()->route('surat.index')->with('success', 'Data persyaratan SKCK berhasil disimpan.');

}

}
