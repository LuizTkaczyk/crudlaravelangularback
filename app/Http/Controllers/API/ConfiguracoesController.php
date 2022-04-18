<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Configuracoes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ConfiguracoesController extends Controller
{
    // função q salva a taxa de juros e ao mesmo tempo modifica ela sem ter q usar uma classe de update!!!!!
    public function taxaJuros(Request $request)
    {
        DB::table('configuracoes')->where('taxaJurosVista', '!=', null)->update(array('taxaJurosVista' => $request->taxaJurosVista));
        DB::table('configuracoes')->where('taxaJurosPrazo', '!=', null)->update(array('taxaJurosPrazo' => $request->taxaJurosPrazo));

    }

    public function getJuros()
    {
        $data = Configuracoes::get()->first();
        return $data;
    }
}
