<?php
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
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
Route::get('/login', function () {
    return view('auth/login');
});
Route::get('/register', function () {
    return view('auth/register');
});
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

// Route Mulai Data User
Route::get('/data-user', function () {
    return view('User/form-data-diri');
});

// Route Mulai Pengerjaan Test - User
Route::get('/pengerjaan-tes', function () {
    return view('Pengerjaan-Tes.index');
});

// Route Mulai Master Users - Admin
Route::get('/master-users', function () {
    return view('Master-Users.index');
});

// Route Mulai Master Soal -Admin
Route::get('/master-soal', function () {
    return view('Master-Soal.index');
});

// Route Mulai Master Kriteria - Admin
Route::get('/master-kriteria', function () {
    return view('Master-Kriteria.index');
});

// Route Mulai Riwayat Pengisian Soal - Admin
Route::get('/riwayat-pengisian', function () {
    return view('Riwayat-Pengisian.index');
});

// Route Mulai Riwayat Ranking - Admin
Route::get('/ranking', function () {
    return view('Ranking.index');
});


Auth::routes();
