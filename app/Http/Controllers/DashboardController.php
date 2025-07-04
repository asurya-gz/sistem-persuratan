<?php

namespace App\Http\Controllers;

use App\Models\resident;
use App\Models\Surat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil data statistik penduduk
        $totalResidents = resident::count();
        
        // Mengambil data surat
        $pendingSurat = Surat::where('status', 'diajukan')->count();
        $completedSurat = Surat::where('status', 'disetujui')->count();
        
        // Mendapatkan nama admin/user untuk pesan selamat datang
        $user = Auth::user();
        
        return view('pages.dashboard', [
            'totalResidents' => $totalResidents,
            'pendingSurat' => $pendingSurat,
            'completedSurat' => $completedSurat,
            'user' => $user
        ]);
    }
} 