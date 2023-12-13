<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\RepositoryController;
use Illuminate\Support\Facades\auth;
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

Auth::routes();

// // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('user', [UserController::class, 'index'])->name('user');
// Route::post('user', [UserController::class, 'index'])->name('user');
// Route::get('user', [UserController::class, 'index'])->name('user.index');

// Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
// Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
// Route::get('/user/{id}/show', [UserController::class, 'show'])->name('user.show');
// Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
// Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
// // Route::get('/user/{id}/delete', [UserController::class, 'destroy'])->name('user.delete');
// Route::delete('/user/{id}/delete', [UserController::class, 'destroy'])->name('user.delete');
Route::resource('repository', RepsitoryController::class);