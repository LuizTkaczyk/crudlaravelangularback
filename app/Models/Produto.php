<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = "produtos";

    protected $fillable = [
        'nome',
        'quantidade',
        'valorCompra',
        'valorLucro',
        'valorVenda',
        'valorTotalCompra',
        'valorTotalVenda',
        'codProduto',
        'data_compra',
        'data_venda',
        'deleted_at'
    ];
}
