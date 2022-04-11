<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Vendas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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

        foreach ($data as $datas) {
            Vendas::create([
                'codigo' => $datas['codigo'],
                'nome' => $datas['nome'],
                'valorVenda' => $datas['valorVenda'],
                'quantidade' => $datas['quantidade'],
                'desconto' => $datas['desconto'],
                'valorComDesconto' => $datas['valorComDesconto'],
                'valorSemDesconto' => $datas['valorSemDesconto'],
                'dataVenda' => $datas['dataVenda'],
                'totalVenda' => 100

            ]);
        };
    }


    // Produto::create([
    //     'nome' => $request['nome'],
    //     'quantidade' => $request['quantidade'],
    //     'valorCompra' => $request['valorCompra'],
    //     'valorLucro' => $request['lucro'],
    //     'valorVenda' => $request['valorVenda'],
    //     'valorTotalCompra' => $request['valorTotalCompra'],
    //     'valorTotalVenda' => $request['valorTotalVenda'],
    //     'codProduto' => $request['codProduto'],
    //     'data_compra' => Carbon::now()->subHours(3)
    // ]);

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
}
