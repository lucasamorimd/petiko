<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerClientes;
use App\Http\Controllers\ControllerHome;
use App\Http\Controllers\ControllerPedidos;

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

Route::get('/', [ControllerHome::class, 'home'])->name('home');
//ROTAS DE CLIENTES
Route::get('/cadastrar-cliente', function () {
    return view('cadastrarCliente');
})->name('createCliente');
Route::post('/cadastrar-cliente', [ControllerClientes::class, 'actionCadastraCliente'])->name('formClienteAction');
Route::get('/lista-de-clientes', [ControllerClientes::class, 'tableClientes'])->name('tableClientes');


//ROTAS DE PEDIDOS
Route::get('/cadastrar-pedido', [ControllerPedidos::class, 'formPedido'])->name('formPedido');
Route::post('/pedidos-ajax', [ControllerPedidos::class, 'pedidosAjax'])->name('pedidosAjax');
Route::post('/cadastrar-pedido', [ControllerPedidos::class, 'actionCadastrarPedido'])->name('formPedidoAction');
Route::get('/lista-de-pedidos', [ControllerPedidos::class, 'listaPedidos'])->name('tablePedidos');


Route::fallback(function () {
    return view('404');
});
