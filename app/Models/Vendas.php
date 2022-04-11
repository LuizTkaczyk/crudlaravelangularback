<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendas extends Model
{
    use HasFactory;

    protected $table = "vendas";

    
    protected $fillable = [
        'codigo',
        'nome',
        'valorVenda',
        'quantidade',
        'desconto',
        'valorComDesconto',
        'valorSemDesconto',
        'dataVenda',
        'totalVenda'
    ];
}
