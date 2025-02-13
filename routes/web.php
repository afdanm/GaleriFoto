<?php

use App\Http\Controllers\GalleryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home'); // Home Page
});

Route::get('/galeri-saya', [GalleryController::class, 'gallery'])->name('galeri-saya');
Route::get('/seni-saya', [GalleryController::class, 'art'])->name('seni-saya');
Route::get('/kontak-saya', [GalleryController::class, 'contact'])->name('kontak-saya');

// ✅ Rute untuk upload fot

Route::get('/upload-photo', [GalleryController::class, 'uploadForm'])->name('upload-form');
Route::post('/upload-photo', [GalleryController::class, 'uploadPhoto'])->name('upload-photo');

Route::get('/upload-art', [GalleryController::class, 'uploadArtForm'])->name('upload-art-form');
Route::post('/upload-art', [GalleryController::class, 'uploadArt'])->name('upload-art');

Route::get('/photos/destroy/{id}', [GalleryController::class, 'destroyPhoto'])->name('photos.destroy');
Route::get('/arts/destroy/{id}', [GalleryController::class, 'destroyArt'])->name('arts.destroy');