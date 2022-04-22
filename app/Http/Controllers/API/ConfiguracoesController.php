<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Configuracoes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ConfiguracoesController extends Controller
{
    // função q salva a taxa de juros e ao mesmo tempo modifica caso ela não tenha id!!!!!
    public function taxaJuros(Request $request, $id = null)
    {
        if($id){
            $data = Configuracoes::find($id);
            $data->taxaJurosVista = $request->taxaJurosVista;
            $data->taxaJurosPrazo = $request->taxaJurosPrazo;
            $data->taxaJurosDebito = $request->taxaJurosDebito;
            $data->taxaJurosParcela = $request->taxaJurosParcela;
            $data->save();
            
        }else{
            Configuracoes::create([
                'taxaJurosVista' => $request['taxaJurosVista'],
                'taxaJurosPrazo' => $request['taxaJurosPrazo'],
                'taxaJurosDebito' => $request['taxaJurosDebito'],
                'taxaJurosParcela' => $request['taxaJurosParcela']
            ]);
        }
    }

    public function getJuros()
    {
        $data = Configuracoes::get()->first();
        return $data;
    }
}
