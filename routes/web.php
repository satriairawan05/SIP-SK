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
        Route::get('/', fn () => view('backend.home'))->name('home');

        // Organisasi
        Route::resource('organisasi', \App\Http\Controllers\Backend\OrganisasiController::class);

        // Kegiatan
        Route::resource('kegiatan',\App\Http\Controllers\Backend\KegiatanController::class);
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

        // Jurusan
        Route::resource('jurusan', \App\Http\Controllers\Backend\JurusanController::class);

        // Prodi
        Route::resource('prodi', \App\Http\Controllers\Backend\ProdiController::class);
        Route::get('prodi/{jurusan}', [\App\Http\Controllers\Backend\ProdiController::class, 'findJurusan'])->name('prodi.findJurusan');

        // Mahasiswa
        Route::resource('mahasiswa', \App\Http\Controllers\Backend\MahasiswaController::class);

        // Organisasi
        Route::resource('organisasi', \App\Http\Controllers\Backend\OrganisasiController::class);

        // Kegiatan
        Route::resource('kegiatan',\App\Http\Controllers\Backend\KegiatanController::class);

        // Jenis Surat
        Route::resource('jenis_surat',\App\Http\Controllers\Backend\JenisSuratController::class);

        Route::get('surat_keputusan/kegiatan/document', function(){
            return view('backend.surat_kegiatan.document');
        });

        Route::get('surat_keputusan/organisasi/document', function(){
            return view('backend.surat_organisasi.document');
        });
    });
});
