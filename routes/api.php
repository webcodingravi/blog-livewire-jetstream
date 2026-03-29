<?php

use App\Http\Controllers\api\blog\BlogImageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// routes/api.php
Route::post('/api/blog/image-upload', [BlogImageController::class, 'uploadImage'])->name('api.blog.image-upload');
Route::post('/api/blog/image-delete', [BlogImageController::class, 'deleteImage'])->name('api.blog.image-delete');
