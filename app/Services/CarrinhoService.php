<?php namespace estudo\Services;

use estudo\Exceptions\CarrinhoException;
use Illuminate\Database\DatabaseManager;
use \estudo\Repositories\CarrinhoRepository;
use Illuminate\Session\Store;
use Mockery\CountValidator\Exception;


/**
 * Service layer that will applies all application rules to work with Carrinho class.
 *
 * Class CarrinhoService
 * @package estudo\Services
 */
class CarrinhoService {

    protected $session;
    protected $produtoService;

    function __construct(Store $session,ProdutoService $produtoService)
    {
        $this->session = $session;
        $this->produtoService = $produtoService;
    }

    public function all(){
        if(!session()->has("carrinho"))
            throw new CarrinhoException('Não há produtos no seu carrinho');

        try{
            $produtos = [];
            foreach(session()->get("carrinho") as $carrinho){
                $produto = $this->produtoService->find($carrinho->productId)->toArray();
                $produto['qtdProduto'] = $carrinho->qty;

                $produtos[] = (object)$produto;
            }
            return $produtos;

        }catch (\Exception $e){
            throw new CarrinhoException('Não foi possível buscar os produtos do seu carrinho');
        }
    }

    /**
     * This constructor will receive by dependency injection a instance of CarrinhoRepository and DatabaseManager.
     *
     * @param CarrinhoRepository $repository
     * @param DatabaseManager $db
     */

    public function salvaSession(array $dados, $id){

        try {
            $carrinho = session()->has('carrinho') ? session()->pull('carrinho') : [];

            if (array_key_exists($id, $carrinho)) {
                $carrinho[$id]->qty++;
            } else {
                $carrinho[$id] = (object)[
                    'productId' => $id,
                    'qty' => $dados['qtd']
                ];
            }

            session()->put('carrinho', $carrinho);
            return true;

        }catch (\Exception $e){
            throw new CarrinhoException('Não foi possível adicionar o produto no carrinho');
        }

    }


}