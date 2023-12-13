<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function (){
    return view('about');
});

Route::middleware('guest')->group(function () {
    // Login
    Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class, 'showLoginMahasiswaForm'])->name('mahasiswa.login');
    Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'loginMahasiswa'])->name('mahasiswa.login_store');

    Route::prefix('home')->middleware(['auth:mahasiswa'])->group(function () {
        // Logout
        Route::post('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logoutMahasiswa'])->name('mahasiswa.logout');

        // Change Password
        Route::get('/change_password/{mahasiswa}/password', [\App\Http\Controllers\Auth\LoginController::class, 'showChangePasswordMahasiswaForm'])->name('mahasiswa.changepassword');
        Route::put('/change_password/{mahasiswa}', [\App\Http\Controllers\Auth\LoginController::class, 'ChangePasswordMahasiswa'])->name('mahasiswa.changepassword_update');

        // Dashboard Mahasiswa
        Route::get('/', fn () => view('mahasiswa.home', [
            'mahasiswa' => \App\Models\Organisasi::count(),
            'organisasi' => \App\Models\Organisasi::count(),
            'acc' => \App\Models\SuratKeputusanOrganisasi::whereNotNull('sko_no_surat')->count() + \App\Models\SuratKeputusanKegiatan::whereNotNull('skk_no_surat')->count(),
            'wait' => \App\Models\SuratKeputusanOrganisasi::whereNull('sko_no_surat')->count() + \App\Models\SuratKeputusanKegiatan::whereNull('skk_no_surat')->count(),
        ]))->name('home');

        // Archive
        Route::get('archive', \App\Http\Controllers\Mahasiswa\ArchiveController::class)->name('arc.index');

        // Organisasi
        Route::resource('organisasi', \App\Http\Controllers\Mahasiswa\OrganisasiController::class)->names('organisasis');

        // Struktur Organisasi
        Route::resource('struktur_organisasi', \App\Http\Controllers\Mahasiswa\StrukturOrganisasiController::class)->names('struktur_organisasis');

        // Surat Keputusan Kegiatan
        Route::resource('skk', \App\Http\Controllers\Mahasiswa\SuratKeputusanKegiatanController::class)->names('skks');

        // Surat Keputusan Organisasi
        Route::resource('sko', \App\Http\Controllers\Mahasiswa\SuratKeputusanOrganisasiController::class)->names('skos');
    });
});

Route::prefix('admin')->middleware('guest')->group(function () {
    // Login
    Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class, 'showLoginUserForm'])->name('user.login');
    Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'loginUser'])->name('user.login_store');

    Route::middleware(['auth:admin'])->group(function () {
        // Logout
        Route::post('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logoutUser'])->name('user.logout');

        // Change Password
        Route::get('/change_password/{user}/password', [\App\Http\Controllers\Auth\LoginController::class, 'showChangePasswordUserForm'])->name('user.changepassword');
        Route::put('/change_password/{user}', [\App\Http\Controllers\Auth\Controller::class, 'ChangePasswordUser'])->name('user.changepassword_update');

        // Dashboard Admin
        Route::get('/', fn () => view('backend.home', [
            'mahasiswa' => \App\Models\Organisasi::count(),
            'organisasi' => \App\Models\Organisasi::count(),
            'acc' => \App\Models\SuratKeputusanOrganisasi::whereNotNull('sko_no_surat')->count() + \App\Models\SuratKeputusanKegiatan::whereNotNull('skk_no_surat')->count(),
            'wait' => \App\Models\SuratKeputusanOrganisasi::whereNull('sko_no_surat')->count() + \App\Models\SuratKeputusanKegiatan::whereNull('skk_no_surat')->count(),
        ]))->name('dashboard');

        // Archive
        Route::get('archive', \App\Http\Controllers\Backend\ArchiveController::class)->name('archive.index');

        // User
        Route::resource('user', \App\Http\Controllers\Backend\UserController::class);

        // Organisasi
        Route::resource('organisasi', \App\Http\Controllers\Backend\OrganisasiController::class);

        // Struktur Organisasi
        Route::resource('struktur_organisasi', \App\Http\Controllers\Backend\StrukturOrganisasiController::class);

        // Jurusan
        Route::resource('jurusan', \App\Http\Controllers\Backend\JurusanController::class);

        // Prodi
        Route::resource('prodi', \App\Http\Controllers\Backend\ProdiController::class);
        Route::get('prodi/{jurusan}', [\App\Http\Controllers\Backend\ProdiController::class, 'findJurusan'])->name('prodi.findJurusan');

        // Mahasiswa
        Route::resource('mahasiswa', \App\Http\Controllers\Backend\MahasiswaController::class);

        // Organisasi
        Route::resource('organisasi', \App\Http\Controllers\Backend\OrganisasiController::class);

        // Jenis Surat
        Route::resource('jenis_surat', \App\Http\Controllers\Backend\JenisSuratController::class);

        // Surat Keputusan Kegiatan
        Route::resource('skk', \App\Http\Controllers\Backend\SuratKeputusanKegiatanController::class);
        // Route::get('skk/{skk}/approval', [\App\Http\Controllers\Backend\SuratKeputusanKegiatanController::class, 'approval'])->name('skk.approval');
        Route::put('skk/{skk}/approval', [\App\Http\Controllers\Backend\SuratKeputusanKegiatanController::class, 'updateApproval'])->name('skk.approval_update');

        // Surat Keputusan Organisasi
        Route::resource('sko', \App\Http\Controllers\Backend\SuratKeputusanOrganisasiController::class);
        // Route::get('sko/{sko}/approval', [\App\Http\Controllers\Backend\SuratKeputusanOrganisasiController::class, 'approval'])->name('sko.approval');
        Route::put('sko/{sko}/approval', [\App\Http\Controllers\Backend\SuratKeputusanOrganisasiController::class, 'updateApproval'])->name('sko.approval_update');

        // Approval
        Route::resource('approval', \App\Http\Controllers\Backend\ApprovalController::class);

        // Signature
        Route::resource('signature', \App\Http\Controllers\Backend\SignatureController::class);

        // Role Permission
        // Route::resource('role', \App\Http\Controllers\Backend\GroupController::class)->except(['show']);
    });
});
