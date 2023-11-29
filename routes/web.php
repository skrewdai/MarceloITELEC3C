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

Route::get('/all/categoty',[CategoryController::class,'index'])->name('AllCat');
Route::get('/categories', [CategoryController::class, 'index'])->name('AllCat');
Route::post('/categories', [CategoryController::class, 'store'])->name('AllCat'); 
Route::get('/category/update/{id}', [CategoryController::class, 'edit'])->name('editCategory');
Route::post('/category/update/{id}', [CategoryController::class, 'update']);