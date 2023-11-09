<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\CategoryController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        $users = User::all();
        return view('dashboard', compact ('users'));
    })->name('dashboard');
});

Route::get('/all/category',[CategoryController::class,'index'])->name('AllCat');
Route::get('/all/categories', [CategoryController::class, 'index'])->name('AllCat');
Route::post('/all/categories', [CategoryController::class, 'store'])->name('AllCat'); 