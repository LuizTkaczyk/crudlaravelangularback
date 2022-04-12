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
                'totalDesconto' => $valueOf['totalDesconto']

            ]);
        };
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
}
