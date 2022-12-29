<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// auth
Route::post("/login", [AuthController::class, "login"])->name('login');
Route::post("/register", [AuthController::class, "register"])->name('register');
Route::get("/me", [AuthController::class, "getUser"])->middleware("auth:sanctum");

// user
Route::get("/users", [UserController::class, "index"])->name('users')->middleware(['auth:sanctum', 'admin']);
Route::get("/user/{id}", [UserController::class, "show"])->name('show')->middleware(['auth:sanctum', 'admin']);
Route::put("/user/{id}/update", [UserController::class, "update"])->name('update')->middleware(['auth:sanctum', 'admin']);
Route::put("/user/{id}/delete", [UserController::class, "destroy"])->name('destroy')->middleware(['auth:sanctum', 'admin']);

// admin
Route::post("/kategori", [AdminController::class, "createKategori"])->name('createKategori')->middleware(['auth:sanctum', 'admin']);
Route::post("/buku", [AdminController::class, "createBuku"])->name('createBuku')->middleware(['auth:sanctum', 'admin']);
Route::get("/bukus", [AdminController::class, "detailBuku"])->name('detailBuku')->middleware(['auth:sanctum', 'admin']);
Route::post("/buku/{id}/update", [AdminController::class, "updateBuku"])->name('updateBuku')->middleware(['auth:sanctum', 'admin']);
Route::delete("/buku/{id}/delete", [AdminController::class, "deleteBuku"])->name('deleteBuku')->middleware(['auth:sanctum', 'admin']);

// pengguna
Route::get("/books", [PenggunaController::class, "bookAvailable"])->name('bookAvailable')->middleware(['auth:sanctum', 'user']);
Route::post("/pinjambuku", [PenggunaController::class, "createBorrowingBook"])->name('createBorrowingBook')->middleware(['auth:sanctum', 'user']);
Route::post("/detailPeminjaman", [PenggunaController::class, "createBorrowingDetail"])->name('createBorrowingDetail')->middleware(['auth:sanctum', 'user']);