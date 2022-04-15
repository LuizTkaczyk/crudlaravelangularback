<?php

use App\Http\Controllers\API\Pagination;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ProdutoController;
use App\Http\Controllers\API\VendaController;
use App\Http\Controllers\BarCodeController;

// Route::prefix('api/person')->group(function(){
//     Route::get('/', [PersonController::class, 'getAll']);
//     Route::post('/',[PersonController::class, 'create']);
//     Route::delete('/{id}', [PersonController::class, 'delete']);
//     Route::get('/{id}', [PersonController::class, 'get']);
//     Route::put('/{id}',[PersonController::class,'update']);
// });

Route::prefix('api')->middleware(['cors'])->group(function () {
    Route::get('produto/', [ProdutoController::class, 'index']);
    Route::get('produto/', [ProdutoController::class, 'getAllPaginate']);
    Route::get('paginate-produto/', [ProdutoController::class, 'getAllPaginate']);//tesete de paginação!!!!!!!!!!!
    Route::get('all-produto/all', [ProdutoController::class, 'getAll']);
    Route::post('create-produto/',[ProdutoController::class, 'create']);
    Route::delete('delete-produto/{id}', [ProdutoController::class, 'delete']);
    Route::get('get-produto/{id}', [ProdutoController::class, 'get']);
    Route::put('update-produto/{id}',[ProdutoController::class,'update']);
    Route::post('create-venda',  [VendaController::class, 'create']);
    Route::post('remove-estoque', [VendaController::class ,'removeEstoque']);
    Route::get('codigo-venda', [VendaController::class, 'randomCode']);
    Route::get('busca-produto/{codigo}',[ProdutoController::class, 'buscaProduto']);
   
});
// Route::prefix('api')->middleware(['cors'])->group(function () {
//     Route::get('vendas/', [VendaController::class, 'index']);
// });


