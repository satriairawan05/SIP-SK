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
    return redirect('login');
});

Route::middleware('guest')->group(function () {
    // Login
    Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class, 'showLoginMahasiswaForm'])->name('mahasiswa.login');
    Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'loginMahasiswa'])->name('mahasiswa.login_store');

    Route::prefix('home')->middleware(['auth:mahasiswa'])->group(function () {
        // Logout
        Route::post('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logoutMahasiswa'])->name('mahasiswa.logout');

        // Dashboard Mahasiswa
        Route::get('/', fn () => view('mahasiswa.home'))->name('home');

        // Organisasi
        Route::resource('organisasi', \App\Http\Controllers\Mahasiswa\OrganisasiController::class);

        // Struktur Organisasi
        Route::resource('struktur_organisasi', \App\Http\Controllers\Mahasiswa\StrukturOrganisasiController::class);

        // Surat Keputusan Kegiatan
        Route::resource('skk', \App\Http\Controllers\Mahasiswa\SuratKeputusanKegiatanController::class);

        // Surat Keputusan Organisasi
        Route::resource('sko', \App\Http\Controllers\Mahasiswa\SuratKeputusanOrganisasiController::class);
    });
});


Route::prefix('admin')->middleware('guest')->group(function () {
    // Login
    Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class, 'showLoginUserForm'])->name('user.login');
    Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'loginUser'])->name('user.login_store');

    Route::middleware(['auth:admin'])->group(function () {
        // Logout
        Route::post('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logoutUser'])->name('user.logout');

        // Dashboard Admin
        Route::get('/', fn () => view('backend.home'))->name('dashboard');

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

        // Surat Keputusan Organisasi
        Route::resource('sko', \App\Http\Controllers\Backend\SuratKeputusanOrganisasiController::class);

        // Approval
        Route::resource('approval', \App\Http\Controllers\Backend\ApprovalController::class);

        // Signature
        Route::resource('signature', \App\Http\Controllers\Backend\SignatureController::class);
    });
});
