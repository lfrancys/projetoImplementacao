<?php

namespace estudo\Entities;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categoria';
    public static $snakeAttributes = false;
    public $timestamps = false;
    protected $primaryKey = 'id';

    protected $fillable = [
        'idCategoriaPai',
        'nomeCategoria'
    ];
}
