<?php


use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\TenantController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::view('tenant-404','error.tenant-404')->name('tenant.404');

Route::resource('tenant', TenantController::class);
Route::resource('categoria', CategoriaController::class);

Route::controller(ProdutoController::class)
        ->prefix('/produto')
        ->name('produto.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/cadastro', 'create')->name('create');
            Route::post('/cadastro', 'store')->name('store');
            Route::delete('/{produto}', 'destroy')->name('destroy');
            Route::get('/{produto}/edit', 'edit')->name('edit');
            Route::put('/{produto}','update')->name('update');


        });



