<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\pessoasController;
use App\Http\Controllers\contaController;


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
Route::get('/dashboardbak',fn() => view('dashboardbak'));


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
    Route::prefix('pessoa')->group(function () {
        route::get('/create', [pessoasController::class, 'create'])->name('create_pessoa');
        route::post('/store', [pessoasController::class, 'store'])->name('store_pessoa');
        route::get('/index', [pessoasController::class, 'index'])->name('index_pessoa');
        route::get('/destroy/{pessoas}',[pessoasController::class,'destroy']);
        route::get('/edit/{pessoas}',[pessoasController::class,'edit'])->name('edit_pessoa');
        
        route::POST('/update',[pessoasController::class,'update'])->name('update_pessoa');
    });
    Route::prefix('conta')->group(function () {
        route::get('/create', [contaController::class, 'create'])->name('create_conta');
        route::post('/store', [contaController::class, 'store'])->name('store_conta');
        route::get('/index', [contaController::class, 'index'])->name('index_conta');
        route::get('/destroy/{conta}',[contaController::class,'destroy']);
        route::get('/edit/{conta}',[contaController::class,'edit'])->name('edit_conta');
        
        route::POST('/update',[contaController::class,'update'])->name('update_conta');
    });
});
