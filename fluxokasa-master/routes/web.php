<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;


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

Route::get('/', fn () => view('auth.login'));


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::group(array('namespace' => 'Auth'), function () {
    Route::prefix('Categoria')->group(function () {
        route::get('/create', [CategoriaController::class, 'create'])->name('create_Categoria');
        route::post('/store', [CategoriaController::class, 'store'])->name('store_Categoria');
        route::get('/index', [CategoriaController::class, 'index'])->name('index_Categoria');
        route::get('/destroy/{id}',[CategoriaController::class,'destroy']);
        route::get('/show/{id}',[CategoriaController::class,'show'])->name('show_Categoria');
        route::POST('/update',[CategoriaController::class,'update'])->name('update_Categoria');
    });
});
