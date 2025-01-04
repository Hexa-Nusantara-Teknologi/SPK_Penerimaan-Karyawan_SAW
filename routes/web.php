<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SoalController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DataUsersController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\PengerjaanTesController;
use App\Http\Controllers\SubcriteriaController;
use Dflydev\DotAccessData\Data;

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
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

// Route Mulai Data User
// Route::get('/data-user', function () {
//     return view('User/form-data-diri');
// });

Route::middleware(['auth'])->group(function () {
    Route::get('/data-user', [DataUsersController::class, 'index'])->name('dataUser.index');
    Route::post('/data-user/update', [DataUsersController::class, 'update'])->name('user.update');
});

// Route Mulai Pengerjaan Test - User
Route::get('/pengerjaan-tes', [PengerjaanTesController::class, 'index'])->name('index');
Route::get('/tes', [PengerjaanTesController::class, 'kerjakan'])->name('kerjakan');
Route::post('/submit-score', [PengerjaanTesController::class, 'submitScore'])->name('submit-score');


// Route Mulai Master Soal -Admin
Route::get('/master-soal', [SoalController::class, 'index'])->name('soal.index');
Route::get('/master-soal/create', [SoalController::class, 'create'])->name('soal.create');
Route::post('/master-soal', [SoalController::class, 'store'])->name('soal.store');
Route::get('/master-soal/data', [SoalController::class, 'getData'])->name('soal.data');
Route::delete('/master-soal/{id}', [SoalController::class, 'destroy'])->name('soal.destroy');
Route::get('/master-soal/{id}/edit', [SoalController::class, 'edit'])->name('soal.edit');
Route::put('/master-soal/{id}', [SoalController::class, 'update'])->name('soal.update');

// Route Mulai Master Kriteria - Admin
Route::get('/master-kriteria', [CriteriaController::class, 'index'])->name('kriteria.index');
Route::get('/master-kriteria/create', [CriteriaController::class, 'create'])->name('kriteria.create');
Route::post('/master-kriteria', [CriteriaController::class, 'store'])->name('kriteria.store');
Route::get('/master-kriteria/data', [CriteriaController::class, 'getData'])->name('kriteria.data');
Route::delete('/master-kriteria/{id}', [CriteriaController::class, 'destroy'])->name('kriteria.destroy');
Route::get('/master-kriteria/{id}/edit', [CriteriaController::class, 'edit'])->name('kriteria.edit');
Route::put('/master-kriteria/{id}', [CriteriaController::class, 'update'])->name('kriteria.update');

// Route Mulai Master SubKriteria - Admin
Route::get('/master-subkriteria', [SubcriteriaController::class, 'index'])->name('subkriteria.index');
Route::get('/master-subkriteria/create', [SubcriteriaController::class, 'create'])->name('subkriteria.create');
Route::post('/master-subkriteria', [SubcriteriaController::class, 'store'])->name('subkriteria.store');
Route::get('/master-subkriteria/data', [SubcriteriaController::class, 'getData'])->name('subkriteria.data');
Route::delete('/master-subkriteria/{id}', [SubcriteriaController::class, 'destroy'])->name('subkriteria.destroy');
Route::get('/master-subkriteria/{id}/edit', [SubcriteriaController::class, 'edit'])->name('subkriteria.edit');
Route::put('/master-subkriteria/{id}', [SubcriteriaController::class, 'update'])->name('subkriteria.update');


// Route Mulai Riwayat Pengisian Soal - Admin
Route::get('/riwayat-pengisian', function () {
    return view('Riwayat-Pengisian.index');
});

// Route Mulai Riwayat Ranking - Admin
Route::get('/ranking', function () {
    return view('Ranking.index');
});

// Route Mulai Master User - Admin
Route::get('/master-users', [UsersController::class, 'index'])->name('users.index');
Route::get('/master-users/create', [UsersController::class, 'create'])->name('users.create');
Route::post('/master-users', [UsersController::class, 'store'])->name('users.store');
Route::get('/master-users/data', [UsersController::class, 'getData'])->name('users.data');
Route::delete('/master-users/{id}', [UsersController::class, 'destroy'])->name('users.destroy');
Route::get('/master-users/{id}/edit', [UsersController::class, 'edit'])->name('users.edit');
Route::put('/master-users/{id}', [UsersController::class, 'update'])->name('users.update');


Auth::routes();