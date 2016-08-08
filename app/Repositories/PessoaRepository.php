<?php namespace estudo\Repositories;

use Andersonef\Repositories\Abstracts\RepositoryAbstract;
use \estudo\Entities\Pessoa;

/**
 * Data repository to work with entity Pessoa.
 *
 * Class PessoaRepository
 * @package estudo\Repositories
 */
class PessoaRepository extends RepositoryAbstract{


    public function entity()
    {
        return \estudo\Entities\Pessoa::class;
    }

}