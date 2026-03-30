<?php

use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Backend\Admin\CategoryManage;
use App\Livewire\Backend\Admin\CommentManage;
use App\Livewire\Backend\Admin\Dashboard;
use App\Livewire\Backend\Admin\PostManage;
use App\Livewire\Backend\Admin\RoleAndPermissionManage;
use App\Livewire\Backend\Admin\SettingsManage;
use App\Livewire\Backend\Admin\UserManage;
use App\Livewire\Backend\Author\PendingAuthor as AuthorPendingAuthor;
use App\Livewire\Front\Blog;
use App\Livewire\Front\BlogDetails;
use App\Livewire\Front\Home;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');

Route::get('/blog/{categorySlug}', Blog::class)->name('blog');
Route::get('/blog-detail/{blogSlug}', BlogDetails::class)->name('blog-details');

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', Register::class)->name('register');
    Route::get('/login', Login::class)->name('login');
});

Route::group(['middleware' => ['auth:sanctum', config('jetstream.auth_session'), 'verified']], function () {
    Route::get('/pending', AuthorPendingAuthor::class)->name('author.pending');

});

Route::group(['prefix' => 'author', 'as' => 'author.', 'middleware' => ['auth:sanctum', config('jetstream.auth_session'), 'verified', 'role:author']], function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/posts', PostManage::class)->name('post');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth:sanctum', config('jetstream.auth_session'), 'verified', 'role:admin']], function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/users', UserManage::class)->name('users');
    Route::get('/categories', CategoryManage::class)->name('category');
    Route::get('/posts', PostManage::class)->name('post');
    Route::get('/comments', CommentManage::class)->name('comments');
    Route::get('/permission', RoleAndPermissionManage::class)->name('permission');
    Route::get('/settings', SettingsManage::class)->name('settings');

});
