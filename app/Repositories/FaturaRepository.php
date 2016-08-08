<?php namespace estudo\Repositories;

use Andersonef\Repositories\Abstracts\RepositoryAbstract;
use \estudo\Entities\Fatura;

/**
 * Data repository to work with entity Fatura.
 *
 * Class FaturaRepository
 * @package estudo\Repositories
 */
class FaturaRepository extends RepositoryAbstract{


    public function entity()
    {
        return  Fatura::class;
    }

}