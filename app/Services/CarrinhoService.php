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

    /**
     * @var Store
     */
    protected $session;
    /**
     * @var ProdutoService
     */
    protected $produtoService;

    /**
     * @param Store $session
     * @param ProdutoService $produtoService
     */
    function __construct(Store $session,ProdutoService $produtoService)
    {
        $this->session = $session;
        $this->produtoService = $produtoService;
    }

    /**
     * Retorna os dados do carrinho com as informacoes de produto e da sessão
     *
     * @return array
     * @throws CarrinhoException
     */
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
     * Salva os dados do carrrinho na sessão
     *
     * @param CarrinhoRepository $repository
     * @param DatabaseManager $db
     */

    public function salvaSession(array $dados, $id){

        try {
            $carrinho = session()->has('carrinho') ? session()->pull('carrinho') : [];

            if (!array_key_exists($id, $carrinho)) {
                $carrinho[$id] = (object)[
                    'productId' => $id,
                    'qty' => 0
                ];
            }

            if(!isset($dados['qtdProduto']))
                $carrinho[$id]->qty++;
            else
                $carrinho[$id]->qty = $dados['qtdProduto'];


            if($carrinho[$id]->qty == 0)
                unset($carrinho[$id]);

            session()->put('carrinho', $carrinho);
            return true;

        }catch (\Exception $e){
            throw new CarrinhoException('Não foi possível adicionar o produto no carrinho');
        }

    }

    /**
     * Salva o usuario na sessão e calcula o valor da fatura para mostrar na tela
     *
     * @param array $data
     * @return bool
     * @throws CarrinhoException
     */
    public function geraResumo(array $data){

        try {
            $usuario = (object)[
                'nomePessoa' => $data['nomePessoa'],
                'emailPessoa' => $data['emailPessoa']
            ];
            session()->put('usuario', $usuario);

            $produtos = $this->all();
            $total = 0;
            foreach($produtos as $item){
                $total += $item->precoProduto * $item->qtdProduto;
            }
            return ['total' => $total, 'produtos' => $produtos];

        }catch (\Exception $e){
            throw new CarrinhoException('Não foi possível finalizar compra');
        }

    }


}