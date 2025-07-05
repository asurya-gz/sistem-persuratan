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
Route::get('/resident', [ResidentController::class, 'index'])->middleware('role:Admin');
Route::get('/resident/create', [ResidentController::class, 'create'])->middleware('role:Admin');
Route::get('/resident/{id}', [ResidentController::class, 'edit'])->middleware('role:Admin');
Route::post('/resident', [ResidentController::class, 'store'])->middleware('role:Admin');
Route::put('/resident/{id}', [ResidentController::class, 'update'])->middleware('role:Admin');
Route::delete('/resident/{id}', [ResidentController::class, 'delete'])->middleware('role:Admin');

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

