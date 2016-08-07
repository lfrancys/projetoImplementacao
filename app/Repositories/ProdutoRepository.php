<?php namespace estudo\Repositories;

use Andersonef\Repositories\Abstracts\RepositoryAbstract;
use \estudo\Entities\Produto;

/**
 * Data repository to work with entity Produto.
 *
 * Class ProdutoRepository
 * @package estudo\Repositories
 */
class ProdutoRepository extends RepositoryAbstract{


    public function entity()
    {
        return \estudo\Entities\Produto::class;
    }

}