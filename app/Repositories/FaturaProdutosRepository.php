<?php namespace estudo\Repositories;

use Andersonef\Repositories\Abstracts\RepositoryAbstract;
use \estudo\Entities\FaturaProdutos;

/**
 * Data repository to work with entity FaturaProdutos.
 *
 * Class FaturaProdutosRepository
 * @package estudo\Repositories
 */
class FaturaProdutosRepository extends RepositoryAbstract{


    public function entity()
    {
        return \estudo\Entities\FaturaProdutos::class;
    }

}