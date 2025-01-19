<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\HomeController;
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
    return view('index');
});

Route::get('/register', [AuthController::class, 'showRegister'])->middleware('guest')->name('register');
Route::get('/login', [AuthController::class, 'showLogin'])->middleware('guest')->name('login');
Route::post('/register', [AuthController::class, 'register'])->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');


Route::controller(DashboardAdminController::class)->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', 'index');
    Route::get('/dashboard/allposts/checkSlug', 'checkSlug'); // Move this up to avoid slug conflicts
    Route::get('/dashboard/allposts/create', 'create');
    Route::get('/dashboard/allposts', 'allPostView');
    Route::post('/dashboard/allposts', 'store');
    Route::get('/dashboard/allposts/{post:slug}', 'show');
    Route::get('/dashboard/allposts/{post:slug}/edit', 'edit');
    Route::put('/dashboard/allposts/{post:slug}', 'update'); // Fixed this line
    Route::delete('/dashboard/allposts/{post:slug}', 'destroy');

    // User routes remain the same
    Route::get('/dashboard/allusers', 'allUserView');
    Route::delete('/dashboard/allusers/{user:username}', 'destroyUser');
    Route::get('/dashboard/allusers/create', 'createUser');
    Route::post('/dashboard/allusers', 'storeUser');
    Route::get('/dashboard/allusers/{user:username}', 'editUser');
    Route::put('/dashboard/allusers/{user:username}', 'updateUser');
});

Route::controller(HomeController::class)->middleware(['auth'])->group(function () {
    Route::get('/home', 'index');
    Route::get('/detail/{post:slug}', 'showDetail');
});
