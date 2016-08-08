<?php

namespace estudo\Entities;

use Illuminate\Database\Eloquent\Model;

class Fatura extends Model
{
    protected $table = 'fatura';
    public static $snakeAttributes = false;
    protected $primaryKey = 'id';

    protected $fillable = [
        'clienteFatura',
        'ipClienteFatura',
        'valorFatura',
        'obsFatura'
    ];
}
