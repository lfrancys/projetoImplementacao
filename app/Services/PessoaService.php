<?php namespace estudo\Services;

use Andersonef\Repositories\Abstracts\ServiceAbstract;
use Illuminate\Database\DatabaseManager;
use \estudo\Repositories\PessoaRepository;

/**
 * Service layer that will applies all application rules to work with Pessoa class.
 *
 * Class PessoaService
 * @package estudo\Services
 */
class PessoaService extends ServiceAbstract{

    /**
     * This constructor will receive by dependency injection a instance of PessoaRepository and DatabaseManager.
     *
     * @param PessoaRepository $repository
     * @param DatabaseManager $db
     */
    public function __construct(PessoaRepository $repository, DatabaseManager $db)
    {
        parent::__construct($repository, $db);
    }



}