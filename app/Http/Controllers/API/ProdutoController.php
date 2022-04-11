<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProdutoController extends Controller
{

    public function index(Request $request){

        // teste de conflito
    }
    
    /**
     * Retorna todos os valores do banco de dados paginados
     */
    public function getAllPaginate(Request $request){
        $perPage = $request->perpage;
        $resources = DB::table('produtos')->orderBy('id','DESC')->paginate($perPage);
        return response()->json($resources);
    }

    public function getAll(){
        $data = Produto::get();
        return response()->json($data, 200);
    }

    public function create(Request $request){
        Produto::create([
            'nome' => $request['nome'],
            'quantidade' => $request['quantidade'],
            'valorCompra' => $request['valorCompra'],
            'valorLucro' => $request['lucro'],
            'valorVenda' => $request['valorVenda'],
            'valorTotalCompra' => $request['valorTotalCompra'],
            'valorTotalVenda' => $request['valorTotalVenda'],
            'codProduto' => $request['codProduto'],
            'data_compra' => Carbon::now()->subHours(3)
        ]);
    }

    public function delete($id){
        $res = Produto::find($id)->delete();
        return response()->json([
            'message' => 'Deletado com sucesso',
            'success' => true
        ],200);
    }

    public function get($id){
        $data = Produto::find($id);
        return response()->json($data, 200);
    }

    public function update(Request $request, $id){

        $data = Produto::find($id);
        $data->nome = $request->nome;
        $data->quantidade = $request->quantidade;
        $data->valorCompra = $request->valorCompra;
        $data->valorLucro = $request->lucro;
        $data->valorVenda = $request->valorVenda;
        $data->valorTotalCompra = $request->valorTotalCompra;
        $data->valorTotalVenda = $request->valorTotalVenda;

        $data->save();

        return response()->json([
            'message' => "Atualizado com sucesso",
            'success' => true
        ]);
    }
}
