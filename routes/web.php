<?php

use App\Http\Controllers\AuthController;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Home;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('home');
// });


// Route::get('/dashboard', function () {
//     return view('dashboard');
// });

Route::get('/', Home::class);
Route::get('/dashboard/user', Dashboard::class)->middleware(['user']);
Route::get('/dashboard/admin', Dashboard::class)->middleware(['admin'])->name('admin');


Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');