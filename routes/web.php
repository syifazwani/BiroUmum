<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminGalleryController;
use App\Http\Controllers\GalleryUserController;
use App\Http\Controllers\OrganisasiAdminController;
use App\Http\Controllers\StrukturOrganisasiController;

// Halaman user
Route::get('/', function () {
    return view('home');
});

Route::get('/organisasi', function () {
    return view('organisasi');
});

Route::get('/ppid', function () {
    return view('ppid');
});

Route::get('/informasi', [StrukturOrganisasiController::class, 'index'])->name('informasi.index');

Route::get('/foto&video', [GalleryUserController::class, 'index'])->name('foto.video.index');

// Admin routes
Route::prefix('admin')->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/OrganisasiAdmin', function () {
        return view('admin.OrganisasiAdmin');
    });

    Route::get('/GaleriAdmin', [AdminGalleryController::class, 'index'])->name('admin.galeri.index');

    // Upload album, photo, video
    Route::post('/galeri/album', [AdminGalleryController::class, 'uploadAlbum'])->name('admin.galeri.album.upload');
    Route::post('/galeri/photo', [AdminGalleryController::class, 'uploadPhoto'])->name('admin.galeri.photo.upload');
    Route::post('/galeri/video', [AdminGalleryController::class, 'uploadVideo'])->name('admin.galeri.video.upload');

    // OrganisasiAdminController routes
    Route::post('/upload-struktur', [OrganisasiAdminController::class, 'uploadStruktur'])->name('struktur.upload');
    Route::post('/hapus-struktur', [OrganisasiAdminController::class, 'hapusStruktur'])->name('struktur.hapus');
    Route::post('/upload-kebijakan', [OrganisasiAdminController::class, 'uploadKebijakan'])->name('kebijakan.upload');
    Route::delete('/kebijakan/delete/{filename}', [OrganisasiAdminController::class, 'deleteKebijakan'])->name('kebijakan.delete');
    Route::post('/organisasi/renstra/upload', [OrganisasiAdminController::class, 'uploadRenstra'])->name('renstra.upload');
    Route::delete('/organisasi/renstra/delete/{filename}', [OrganisasiAdminController::class, 'deleteRenstra'])->name('renstra.delete');
});

// StrukturOrganisasiController routes
Route::post('/struktur', [StrukturOrganisasiController::class, 'store'])->name('struktur.store');
Route::delete('/struktur/{id}', [StrukturOrganisasiController::class, 'destroy'])->name('struktur.destroy');
Route::get('/admin/organisasiadmin', [StrukturOrganisasiController::class, 'adminIndex'])->name('admin.OrganisasiAdmin');
Route::resource('struktur', StrukturOrganisasiController::class);
