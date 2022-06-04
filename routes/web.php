<?php


use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\TenantController;
use App\Models\Categoria;
use App\Models\Produto;
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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::view('tenant-404','error.tenant-404')->name('tenant.404');

Route::resource('tenant', TenantController::class);
Route::resource('categoria', CategoriaController::class);
Route::get('/', function () {
    $produtos =Produto::paginate(10);
    return view('index', compact('produtos'));

});

Route::post('/', [App\Http\Controllers\ProdutoController::class, 'search'])->name('search');

//Rota adicinonar item carrinho
Route::post('/addCart', [App\Http\Controllers\CarinhoController::class, 'addCart'])->name('addCart');

//Rota gerenciar itens do carrinho
Route::get('/addCart/{itemId}/{acao}', [App\Http\Controllers\CarinhoController::class, 'ajustCart'])->name('ajustCart');

//Checkout dos itens da session
Route::get('/checkoutCart', [App\Http\Controllers\CarinhoController::class, 'checkoutCart'])->name('checkoutCart');

//Salva o pedido no banco de dados
Route::post('/pedido', [App\Http\Controllers\PedidoController::class, 'store'])->name('pedido.store');

//lista os pedidos do banco de dados
Route::get('/pedido', [App\Http\Controllers\PedidoController::class, 'index'])->name('pedido.index');

//filtrar pedido
Route::post('/pedido-localizar', [App\Http\Controllers\PedidoController::class, 'localizarPedido'])->name('pedido.localizarPedido');

//mostar todos os clientes do tenant
Route::get('/clientes',[App\Http\Controllers\ClienteController::class,'listar'])->name('cliente.listar');


//Grupo de rotas produto
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



