<?php

namespace App\Http\Controllers;

use App\Models\SuratKeteranganPemilikRumah;
use Illuminate\Http\Request;

class SuratKeteranganPemilikRumahController extends Controller
{
    public function index()
    {
        $data = SuratKeteranganPemilikRumah::with('surat')->get();
        return response()->json($data);
    }

    public function findBySuratsId($surats_id)
    {
        $data = SuratKeteranganPemilikRumah::where('surats_id', $surats_id)->first();

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
    $validated = $request->validate([
        'surats_id' => 'required|exists:surats,id',
        'nik' => 'required|string|max:255',
        'status_perkawinan' => 'required|string|max:100',
        'tempat_lahir' => 'required|string|max:100',
        'tanggal_lahir' => 'required|date',
        'agama' => 'required|string|max:50',
        'warga_negara' => 'required|string|max:50',
        'pekerjaan' => 'required|string|max:100',
        'alamat' => 'required|string',
        'no_telp' => 'required|string|max:20',
        'email' => 'required|email|max:255',
    ]);

    SuratKeteranganPemilikRumah::create($validated);

    return redirect()->route('surat.index')->with('success', 'Data kepemilikan rumah berhasil disimpan.');
}


}
