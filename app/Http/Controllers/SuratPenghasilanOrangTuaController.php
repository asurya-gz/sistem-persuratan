<?php

namespace App\Http\Controllers;

use App\Models\SuratPenghasilanOrangTua;
use Illuminate\Http\Request;

class SuratPenghasilanOrangTuaController extends Controller
{
    public function index()
    {
        $data = SuratPenghasilanOrangtua::with('surat')->get();
        return response()->json($data);
    }

    public function findBySuratsId($surats_id)
    {
        $data = SuratPenghasilanOrangtua::where('surats_id', $surats_id)->first();

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
            'nama_orangtua' => 'required|string|max:255',
            'pekerjaan_orangtua' => 'required|string|max:255',
            'tempat_lahir_orangtua' => 'required|string|max:100',
            'tanggal_lahir_orangtua' => 'required|date',
            'jenis_kelamin_orangtua' => 'required|in:Laki-laki,Perempuan',
            'alamat_orangtua' => 'required|string',

            'nama_anak' => 'required|string|max:255',
            'pekerjaan_anak' => 'required|string|max:255',
            'tempat_lahir_anak' => 'required|string|max:100',
            'tanggal_lahir_anak' => 'required|date',
            'jenis_kelamin_anak' => 'required|in:Laki-laki,Perempuan',
            'alamat_anak' => 'required|string',

            'jumlah_penghasilan' => 'required|numeric|min:0',
            'no_telp' => 'required|string|max:20',
            'email' => 'required|email|max:255',
        ]);

        SuratPenghasilanOrangtua::create($validated);

        return redirect()->route('surat.index')->with('success', 'Data penghasilan orang tua berhasil disimpan.');
    }
}


