<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use App\Models\Vendas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use utils\Utils;

class VendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Log::debug("entrou no index");
        return json_encode("Oii belezão!");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        foreach ($data as $valueOf) {
            Vendas::create([
                'codigo' => $valueOf['codigo'],
                'nome' => $valueOf['nome'],
                'valorVenda' => $valueOf['valorVenda'],
                'quantidade' => $valueOf['quantidade'],
                'desconto' => $valueOf['desconto'],
                'valorComDesconto' => $valueOf['valorComDesconto'],
                'valorSemDesconto' => $valueOf['valorSemDesconto'],
                'dataVenda' => $valueOf['dataVenda'],
                'totalComDesconto' => $valueOf['totalComDesconto'],
                'totalSemDesconto' => $valueOf['totalSemDesconto'],
                'totalDesconto' => $valueOf['totalDesconto'],
                'idVenda' => $valueOf['idVenda'],
                'formaPagamento' => $valueOf['formaPagamento'],
                'cod_relatorio' => $valueOf['codRelatorio'],
                'tipo_juros' => $valueOf['tipoJuros']

            ]);
        };

    }

    public function removeEstoque(Request $request){
        $sub = $request->get('quantidadeVendida');
        $produtoId = $request->get('produtoId');
        
        $produto = Produto::where('id', $produtoId)->first();
        $emEstoque = $produto['quantidade']-$sub;

        Produto::where('id', $produtoId)->update(['quantidade' => $emEstoque]);
        Produto::where('quantidade',0)->delete();
    }

    public function restoreEstoque(Request $request, $idProduto){
        $produto = Produto::where('codProduto', $idProduto)->withTrashed()->first();
        //Log::debug($produto);
        Produto::where('codProduto', $idProduto)->update(['quantidade' => $produto->quantidade + $request->quantidade]);
        
        if($produto->quantidade == 0){
            Produto::where('codProduto', $idProduto)->restore();
            Produto::where('codProduto', $idProduto)->update(['quantidade' => $produto->quantidade + $request->quantidade]);
        
        }
    }

    public function gerarRelatorio(){
        $res = Vendas::all()->sortByDesc('created_at')->groupBy('dataVenda');
        return response()->json($res, 200);
    }

    public function getTotais($idVenda){
        $soma = Vendas::where('cod_relatorio', $idVenda)->get();
        $totalSemDesconto = $soma->sum('valorSemDesconto');
        $totalComDesconto = $soma->sum('valorComDesconto');

        $data = ([
            'totalSemDesconto' => $totalSemDesconto,
            'totalComDesconto' => $totalComDesconto,
            'totalDesconto' => $totalSemDesconto - $totalComDesconto
        ]);
            
        return $data;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function randomCode()
    {
        do{
            $randomCode = random_int(100000,999999);
        }while(Vendas::where('idVenda', '=', $randomCode)->first());

        return $randomCode;
    }
}
