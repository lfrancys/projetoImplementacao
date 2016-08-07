<?php namespace estudo\Services;

use Andersonef\Repositories\Abstracts\ServiceAbstract;
use Illuminate\Database\DatabaseManager;
use \estudo\Repositories\CategoriaRepository;

/**
 * Service layer that will applies all application rules to work with Categoria class.
 *
 * Class CategoriaService
 * @package estudo\Services
 */
class CategoriaService extends ServiceAbstract{

    /**
     * This constructor will receive by dependency injection a instance of CategoriaRepository and DatabaseManager.
     *
     * @param CategoriaRepository $repository
     * @param DatabaseManager $db
     */
    public function __construct(CategoriaRepository $repository, DatabaseManager $db)
    {
        parent::__construct($repository, $db);
    }



}