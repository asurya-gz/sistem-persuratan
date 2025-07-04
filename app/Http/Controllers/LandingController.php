<?php

namespace App\Http\Controllers;

use App\Models\resident;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        // Mengambil data statistik penduduk
        $totalResidents = resident::count();
        $maleResidents = resident::where('gender', 'male')->count();
        $femaleResidents = resident::where('gender', 'female')->count();
        
        return view('landing.index', [
            'totalResidents' => $totalResidents,
            'maleResidents' => $maleResidents,
            'femaleResidents' => $femaleResidents
        ]);
    }
} 