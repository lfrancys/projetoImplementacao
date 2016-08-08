<?php namespace estudo\Services;

use Andersonef\Repositories\Abstracts\ServiceAbstract;
use estudo\Exceptions\FaturaException;
use Illuminate\Database\DatabaseManager;
use \estudo\Repositories\FaturaRepository;
use Illuminate\Support\Facades\Request;

/**
 * Service layer that will applies all application rules to work with Fatura class.
 *
 * Class FaturaService
 * @package estudo\Services
 */
class FaturaService extends ServiceAbstract{
    protected $faturaProdutosService;

    /**
     * This constructor will receive by dependency injection a instance of FaturaRepository and DatabaseManager.
     *
     * @param FaturaRepository $repository
     * @param DatabaseManager $db
     */
    public function __construct(FaturaRepository $repository, DatabaseManager $db, FaturaProdutosService $faturaProdutosService)
    {
        parent::__construct($repository, $db);
        $this->faturaProdutosService = $faturaProdutosService;
    }

    public function create(array $data){
        if(!session()->has('usuario'))
            throw new FaturaException('Não há nenhuma pessoa responsável por esssa fatura');

        try{

            $pessoa = session()->get('usuario');

            $this->db->beginTransaction();

            $fatura = parent::create([
                'clienteFatura'     => $pessoa->emailPessoa,
                'ipClienteFaura'    => Request::ip(),
                'valorFatura'       => $data['totalFatura']
            ]);

            foreach($data['produtos'] as $produto){
                $this->faturaProdutosService->create([
                    'idFatura'          => $fatura->id,
                    'idProduto'         => $produto->id,
                    'nomeProduto'       => $produto->nomeProduto,
                    'precoProduto'      => $produto->precoProduto,
                    'quantidadeProduto' => $produto->qtdProduto
                ]);
            }
            $this->db->commit();
            return $fatura;
        }catch (\Exception $e){
            $this->db->rollback();
            throw $e;
            throw new FaturaException('');
        }

    }



}