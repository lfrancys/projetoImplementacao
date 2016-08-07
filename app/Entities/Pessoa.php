<?php

namespace estudo\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Pessoa extends Model implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract {
    use Authenticatable, Authorizable, CanResetPassword;

    protected $table = 'pessoa';
    public static $snakeAttributes = false;
    public $timestamps = false;
    protected $primaryKey = 'idPessoa';
    protected $hidden = ['senhaPessoa'];

    protected $fillable = [
        'nomePessoa',
        'emailPessoa',
        'cpfPessoa',
        'senhaPessoa',
        'statusPessoa'
    ];

    public function getAuthPassword()
    {
        return $this->senhaPessoa;//change the 'passwordFieldinYourTable' with the name of your field in the table
    }

    public function getRememberToken()
    {
    }
    /**
     * Set the token value for the "remember me" session.
     *
     * @param  string  $value
     * @return void
     */
    public function setRememberToken($value)
    {
    }
    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
    }


}
