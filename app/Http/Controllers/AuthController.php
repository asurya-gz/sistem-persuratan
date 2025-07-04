<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;

class AuthController extends Controller
{
    
    // Menampilkan halaman login jika belum login // 
    public function login()
    {
        if (Auth::check()) {
            return back(); 
        }

        return view('pages.auth.login');
    }

    
    // Menangani proses autentikasi login //
    public function authenticate(Request $request)
    {
        if (Auth::check()) {
            return back(); 
        }

        // Validasi input login//
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email tidak valid',
            'password.required' => 'Password harus diisi',
        ]);

        // Coba login dengan kredensial yang valid //
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); 

            $userStatus = Auth::user()->status;

            // Jika status user masih "submitted", tolak login //
            if ($userStatus === 'submitted') {
                $this->_logout($request);

                return back()->withErrors([
                    'email' => 'Akun anda masih dalam pengecekan admin',
                ]);
            }

            // Jika akun ditolak oleh admin //
            if ($userStatus === 'rejected') {
                $this->_logout($request);

                return back()->withErrors([
                    'email' => 'Akun anda ditolak oleh admin',
                ]);
            }

            // Login berhasil, arahkan berdasarkan role //
            if (Auth::user()->role_id == Role::ROLE_USER) {
                return redirect()->route('user.home');
            } else {
                return redirect()->intended('dashboard');
            }
        }

        // Jika login gagal //
        return back()->withErrors([
            'email' => 'Email atau password yang anda masukkan salah, silakan periksa kembali.',
        ])->onlyInput('email');
    }

    
    // Menampilkan halaman register jika belum login //
    public function registerView()
    {
        if (Auth::check()) {
            return back();
        }

        return view('pages.auth.register');
    }


    // Menangani proses registrasi akun user //
     
    public function register(Request $request)
    {
        if (Auth::check()) {
            return back(); 
        }

        // Validasi input registrasi //
        $validated = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'name.required' => 'Nama Lengkap Harus Diisi',
            'email.required' => 'Email Harus Diisi',
            'email.email' => 'Email Tidak Valid',
            'password.required' => 'Password Harus Diisi',
        ]);

        // Buat user baru //
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        // $user->alamat = $request->input('alamat'); 
        $user->password = Hash::make($request->input('password'));
        $user->role_id = 2; 
        $user->status = 'submitted'; 
        $user->saveOrFail(); 

        return redirect('/')->with('success', 'Berhasil mendaftarkan akun, dan menunggu persetujuan admin');
    }

    
    // Fungsi logout yang dipanggil dari dalam controller ini //
    public function _logout(Request $request)
    {
        Auth::logout(); 
        $request->session()->invalidate(); 
        $request->session()->regenerateToken(); 
    }

    
    // Fungsi logout yang dipanggil dari route //
    public function logout(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/');
        }

        $this->_logout($request);

        return redirect('/');
    }
}
