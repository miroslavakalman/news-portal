<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CommentController;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\NewUserController;
use App\Http\Controllers\Auth\LoginController;
Route::get('/admin/comments', [CommentController::class, 'index'])->name('admin.comments.index');
Route::delete('/comments/{comment}',  [CommentController::class, 'destroy'])->name('comments.destroy');
Route::post('/comments',  [CommentController::class, 'store'])->name('comments.store');

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/new-register', [NewUserController::class, 'showRegistrationForm'])->name('new_users.register');
Route::post('/new-register', [NewUserController::class, 'register'])->name('new_users.register.post');
Route::get('/new-register/success', [NewUserController::class, 'registrationSuccess'])->name('new_users.success');

Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
Route::get('/admin/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/admin/users', [UserController::class, 'store'])->name('admin.users.store');
Route::get('/admin/users/{newUser}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
Route::put('/admin/users/{newUser}', [UserController::class, 'update'])->name('admin.users.update');
Route::delete('/admin/users/{newUser}', [UserController::class, 'destroy'])->name('admin.users.destroy');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);


Route::get('/posts/{post}', [PostController::class, 'see'])->name('posts.show');

Route::get('/', [PostController::class, 'welcome'])->name('welcome');
Route::get('/search', [PostController::class, 'search'])->name('search');
Route::get('/token', function (Request $request) {
    return response()->json(['token' => csrf_token()]);
});
Route::get('post_images/{filename}', function ($filename) {
    $path = storage_path('app/post_images/' . $filename);

    if (!file_exists($path)) {
        abort(404);
    }

    $file = \Illuminate\Support\Facades\File::get($path);
    $type = \Illuminate\Support\Facades\File::mimeType($path);

    $response = \Illuminate\Support\Facades\Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});


Route::get('/admin/posts/create', [PostController::class, 'create'])->name('admin.posts.create');
Route::post('/admin/posts', [PostController::class, 'store'])->name('admin.posts.store');
Route::put('/admin/posts/{post}', [PostController::class, 'update'])->name('admin.posts.update');
Route::get('/admin/posts/{post}/edit', [PostController::class, 'edit'])->name('admin.posts.edit');
Route::get('/admin/posts', [PostController::class, 'index'])->name('admin.posts.index');
Route::get('/admin/posts/{post}', [PostController::class, 'show'])->name('admin.posts.show');
Route::delete('/admin/posts/{post}', [PostController::class, 'destroy'])->name('admin.posts.destroy');

