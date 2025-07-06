<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ResidentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\LandingController;
use App\Models\Complaint;
use App\Models\Role;
use App\Models\Surat;
use App\Models\User;
use App\Http\Controllers\SkckController;
use App\Http\Controllers\SktmController;
use App\Http\Controllers\SuratKeteranganDomisiliController;
use App\Http\Controllers\SuratKeteranganKehilanganController;
use App\Http\Controllers\SuratKeteranganKematianController;
use App\Http\Controllers\SuratKeteranganMauMenikahController;
use App\Http\Controllers\SuratKeteranganPemilikRumahController;
use App\Http\Controllers\SuratKeteranganUsahaController;
use App\Http\Controllers\SuratPenghasilanOrangTuaController;
use App\Http\Controllers\SuratSudahMenikahController;

// ROUTE UNTUK LANDING PAGE //
Route::get('/', [LandingController::class, 'index']);

// ROUTE UNTUK LOGIN & REGISTER //
Route::get('/login', function() {
    return view('pages.auth.login');
});
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/register', function() {
    return view('pages.auth.register');
});
Route::post('/register', [AuthController::class, 'register']);


// Menampilkan halaman dashboard admin //
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('role:Admin');

route::get('/notifications', function () {
    return view('pages.notifications');
});

Route::post('/notification/{id}/read', function($id) {
    $notification = \Illuminate\Support\Facades\DB::table('notifications')->where('id', $id);
    $notification->update([
        'read_at' => \Illuminate\Support\Facades\DB::raw('CURRENT_TIMESTAMP'),
    ]);

    $dataArray = json_decode($notification->firstOrFail()->data, true);

    if (isset($dataArray['complaint_id'])) { 
        return redirect('/complaint');
    }

    return back();

})->middleware('role:Admin,User');

// USER
Route::middleware(['auth', 'role:User'])->group(function () {
    Route::get('/home', [LandingController::class, 'index'])->name('user.home');
    
    // Surat routes
    Route::get('/surat', function() {
        $surats = Surat::where('user_id', Auth::user()->id)->paginate(10);
        return view('user.surat.index', compact('surats'));
    })->name('surat.index');
    
Route::get('/surat/create', [SuratController::class, 'create'])->name('surat.create');
Route::get('/surat/{id}/persyaratan', [SuratController::class, 'formPersyaratan'])->name('persyaratan.form');


    
    Route::post('/surat', [SuratController::class, 'store'])->name('surat.store');
    
    // Complaint routes
    Route::get('/complaint', function() {
        $user = Auth::user();
        $resident = $user->resident;
        $complaints = [];
        
        if ($resident) {
            $complaints = Complaint::where('resident_id', $resident->id)->get();
        }
        
        return view('user.complaint.index', compact('complaints'));
    });
    
    Route::get('/complaint/create', function() {
        return view('user.complaint.create');
    });
    
    Route::get('/complaint/{id}', [ComplaintController::class, 'edit'])->name('complaint.edit');
    Route::post('/complaint', [ComplaintController::class, 'store']);
    Route::put('/complaint/{id}', [ComplaintController::class, 'update']);
    Route::delete('/complaint/{id}', [ComplaintController::class, 'delete']);
});

// ADMIN
Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/admin/surat', [SuratController::class, 'admin_index'])->name('admin.surat.index');
    Route::get('/admin/surat/{id}', [SuratController::class, 'show'])->name('surat.show')->middleware('role:Admin');

    Route::post('/admin/surat/{id}/status/{status}', [SuratController::class, 'update_status'])
    ->name('admin.surat.update_status')
    ->where(['id' => '[0-9]+', 'status' => 'diajukan|disetujui|ditolak']);
});
Route::get('/surat/{id}/download', [SuratController::class, 'download'])->name('surat.download');
Route::get('/admin/surat/{id}', [SuratController::class, 'show'])->name('admin.surat.show');
// Route Akses Admin //

// request form login dan register //
Route::get('account-list', [UserController::class, 'account_list_view'])->middleware('role:Admin');
Route::get('/account-request', [UserController::class, 'account_request_view'])->middleware('role:Admin');
Route::get('/service-letters', [SuratController::class, 'admin_index'])->middleware('role:Admin')->name('admin.surat.index');


Route::post('/account-request/approval/{id}', [UserController::class, 'account_approval'])->middleware('role:Admin');

 
Route::get('/profile', [UserController::class, 'profile_view'])->middleware('role:Admin,User');
Route::post('/profile/{id}', [UserController::class, 'update_profile'])->middleware('role:Admin,User');
Route::get('/change-password', [UserController::class, 'change_password_view'])->middleware('role:Admin,User');
Route::post('/change-password/{id}', [UserController::class, 'change_password'])->middleware('role:Admin,User');
 
//Router untuk complaint admin //
Route::get('/complaint', [ComplaintController::class, 'index'])->middleware('role:Admin');
Route::post('/complaint/update-status/{id}', [ComplaintController::class, 'update_status'])->middleware('role:Admin');

Route::get('/skck', [SkckController::class, 'index']);
Route::get('/skck/search/{surats_id}', [SkckController::class, 'findBySuratsId']);
Route::get('/sktm', [SktmController::class, 'index']);
Route::get('/sktm/{surats_id}', [SktmController::class, 'findBySuratsId']);
// SKTM
Route::get('/sktm', [SktmController::class, 'index']);
Route::get('/sktm/{surats_id}', [SktmController::class, 'findBySuratsId']);

// SKCK
Route::get('/skck', [SkckController::class, 'index']);
Route::get('/skck/{surats_id}', [SkckController::class, 'findBySuratsId']);

// Domisili
Route::get('/domisili', [SuratKeteranganDomisiliController::class, 'index']);
Route::get('/domisili/{surats_id}', [SuratKeteranganDomisiliController::class, 'findBySuratsId']);

// Kehilangan
Route::get('/kehilangan', [SuratKeteranganKehilanganController::class, 'index']);
Route::get('/kehilangan/{surats_id}', [SuratKeteranganKehilanganController::class, 'findBySuratsId']);

// Kematian
Route::get('/kematian', [SuratKeteranganKematianController::class, 'index']);
Route::get('/kematian/{surats_id}', [SuratKeteranganKematianController::class, 'findBySuratsId']);

// Mau Menikah
Route::get('/mau-menikah', [SuratKeteranganMauMenikahController::class, 'index']);
Route::get('/mau-menikah/{surats_id}', [SuratKeteranganMauMenikahController::class, 'findBySuratsId']);

// Pemilik Rumah
Route::get('/kepemilikan-rumah', [SuratKeteranganPemilikRumahController::class, 'index']);
Route::get('/kepemilikan-rumah/{surats_id}', [SuratKeteranganPemilikRumahController::class, 'findBySuratsId']);

// Usaha
Route::get('/usaha', [SuratKeteranganUsahaController::class, 'index']);
Route::get('/usaha/{surats_id}', [SuratKeteranganUsahaController::class, 'findBySuratsId']);

// Penghasilan Orang Tua
Route::get('/penghasilan-ortu', [SuratPenghasilanOrangTuaController::class, 'index']);
Route::get('/penghasilan-ortu/{surats_id}', [SuratPenghasilanOrangTuaController::class, 'findBySuratsId']);

// Sudah Menikah
Route::get('/sudah-menikah', [SuratSudahMenikahController::class, 'index']);
Route::get('/sudah-menikah/{surats_id}', [SuratSudahMenikahController::class, 'findBySuratsId']);

Route::post('/skck/store', [SkckController::class, 'store'])->name('skck.store');
Route::post('/sktm/store', [SktmController::class, 'store'])->name('sktm.store');
Route::post('/domisili/store', [SuratKeteranganDomisiliController::class, 'store'])->name('domisili.store');
Route::post('/kehilangan/store', [SuratKeteranganKehilanganController::class, 'store'])->name('kehilangan.store');
Route::post('/kematian/store', [SuratKeteranganKematianController::class, 'store'])->name('kematian.store');
Route::post('/mau-menikah/store', [SuratKeteranganMauMenikahController::class, 'store'])->name('mau_menikah.store');
Route::post('/kepemilikan-rumah', [SuratKeteranganPemilikRumahController::class, 'store'])->name('kepemilikan-rumah.store');
Route::post('/usaha/store', [SuratKeteranganUsahaController::class, 'store'])->name('usaha.store');
Route::post('/penghasilan/store', [SuratPenghasilanOrangtuaController::class, 'store'])->name('penghasilan.store');
Route::post('/sudah-menikah/store', [SuratSudahMenikahController::class, 'store'])->name('sudah-menikah.store');


