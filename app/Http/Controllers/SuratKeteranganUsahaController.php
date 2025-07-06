<?php
namespace App\Http\Controllers;
use App\Models\SuratKeteranganUsaha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class SuratKeteranganUsahaController extends Controller
{
    public function index()
    {
        $data = SuratKeteranganUsaha::with('surat')->get();
        return response()->json($data);
    }

    public function findBySuratsId($surats_id)
    {
        $data = SuratKeteranganUsaha::where('surats_id', $surats_id)->first();
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
        try {
            // Debug: Log data yang diterima
            Log::info('Data diterima:', $request->all());

            $validated = $request->validate([
                'surats_id' => 'required|exists:surats,id',
                'nik' => 'required|string|max:255',
                'tempat_lahir' => 'required|string|max:255', // Sesuaikan dengan DB
                'tanggal_lahir' => 'required|date',
                'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
                'agama' => 'required|string|max:255', // Sesuaikan dengan DB
                'warga_negara' => 'required|string|max:255',
                'pekerjaan' => 'required|string|max:255',
                'alamat' => 'required|string',
                'status_perkawinan' => 'required|string|max:255',
                'nama_usaha' => 'required|string|max:255',
                'jenis_usaha' => 'required|string|max:255',
                'omset' => 'required|numeric|min:0',
                'penanggung_jawab' => 'required|string|max:255',
                'alamat_usaha' => 'required|string',
                'no_telp' => 'nullable|string|max:255', // Nullable karena di DB bisa NULL
                'email' => 'required|email|max:255',
            ]);

            Log::info('Data tervalidasi:', $validated);

            // Coba simpan data
            $usaha = SuratKeteranganUsaha::create($validated);
            
            Log::info('Data berhasil disimpan dengan ID:', ['id' => $usaha->id]);

            return redirect()->route('surat.index')->with('success', 'Data usaha berhasil disimpan.');
            
        } catch (ValidationException $e) {
            Log::error('Validation Error:', $e->errors());
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput()
                ->with('error', 'Terjadi kesalahan validasi.');
                
        } catch (\Exception $e) {
            Log::error('Database Error:', [
                'message' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage())
                ->withInput();
        }
    }
}