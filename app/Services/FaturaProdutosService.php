<?php namespace estudo\Services;

use Andersonef\Repositories\Abstracts\ServiceAbstract;
use Illuminate\Database\DatabaseManager;
use \estudo\Repositories\FaturaProdutosRepository;

/**
 * Service layer that will applies all application rules to work with FaturaProdutos class.
 *
 * Class FaturaProdutosService
 * @package estudo\Services
 */
class FaturaProdutosService extends ServiceAbstract{

    /**
     * This constructor will receive by dependency injection a instance of FaturaProdutosRepository and DatabaseManager.
     *
     * @param FaturaProdutosRepository $repository
     * @param DatabaseManager $db
     */
    public function __construct(FaturaProdutosRepository $repository, DatabaseManager $db)
    {
        parent::__construct($repository, $db);
    }



}