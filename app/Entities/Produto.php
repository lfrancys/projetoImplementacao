<?php

namespace estudo\Entities;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produto';
    public static $snakeAttributes = false;
    protected $primaryKey = 'id';

    protected $fillable = [
        'idCategoria',
        'nomeProduto',
        'fotoProduto',
        'precoProduto',
        'estoqueProduto',
        'destaqueProduto'
    ];
}
