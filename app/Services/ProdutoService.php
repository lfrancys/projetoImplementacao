<?php namespace estudo\Services;

use Andersonef\Repositories\Abstracts\ServiceAbstract;
use Illuminate\Database\DatabaseManager;
use \estudo\Repositories\ProdutoRepository;

/**
 * Service layer that will applies all application rules to work with Produto class.
 *
 * Class ProdutoService
 * @package estudo\Services
 */
class ProdutoService extends ServiceAbstract{

    /**
     * This constructor will receive by dependency injection a instance of ProdutoRepository and DatabaseManager.
     *
     * @param ProdutoRepository $repository
     * @param DatabaseManager $db
     */
    public function __construct(ProdutoRepository $repository, DatabaseManager $db)
    {
        parent::__construct($repository, $db);
    }

    public function listaProdutosDestaque(){

        return $this->findBy(['destaqueProduto' => 1])->orderBy('created_at', 'desc')->paginate(9);

    }



}