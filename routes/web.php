<?php

use App\Livewire\Admin\Dashboard;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Author\Dashboard as AuthorDashboard;
use App\Livewire\Author\PendingAuthor;
use App\Livewire\Front\BlogDetails;
use App\Livewire\Front\Home;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');

Route::get('/blog', BlogDetails::class)->name('blog-details');

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', Register::class)->name('register');
    Route::get('/login', Login::class)->name('login');
});

Route::group(['middleware' => ['auth:sanctum', config('jetstream.auth_session'), 'verified']], function () {
    Route::get('/pending', PendingAuthor::class)->name('author.pending');

});

Route::group(['prefix' => 'author', 'as' => 'author.', 'middleware' => ['auth:sanctum', config('jetstream.auth_session'), 'verified', 'role:author']], function () {
    Route::get('/dashboard', AuthorDashboard::class)->name('dashboard');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth:sanctum', config('jetstream.auth_session'), 'verified', 'role:admin']], function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
});
