<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuracoes extends Model
{
    use HasFactory;

    protected $table = "configuracoes";

    protected $fillable =[
        'taxaJurosVista',
        'taxaJurosPrazo',
        'taxaJurosDebito',
        'taxaJurosParcela'
    ];
}
