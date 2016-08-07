<?php namespace estudo\Repositories;

use Andersonef\Repositories\Abstracts\RepositoryAbstract;
use \estudo\Entities\Categoria;

/**
 * Data repository to work with entity Categoria.
 *
 * Class CategoriaRepository
 * @package estudo\Repositories
 */
class CategoriaRepository extends RepositoryAbstract{


    public function entity()
    {
        return \estudo\Entities\Categoria::class;
    }

}