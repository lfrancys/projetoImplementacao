<?php

namespace estudo\Entities;

use Illuminate\Database\Eloquent\Model;

class FaturaProdutos extends Model
{
    protected $table = 'faturaProdutos';
    public static $snakeAttributes = false;
    protected $primaryKey = 'id';

    protected $fillable = [
        'idFatura',
        'idProduto',
        'nomeProduto',
        'precoProduto',
        'quantidadeProduto'
    ];
}
