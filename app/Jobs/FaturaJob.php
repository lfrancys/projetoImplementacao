<?php

namespace estudo\Jobs;

use estudo\Entities\Produto;
use estudo\Exceptions\FaturaException;
use estudo\Jobs\Job;
use estudo\Services\CarrinhoService;
use estudo\Services\FaturaService;
use estudo\Services\ProdutoService;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class FaturaJob extends Job
{
    use InteractsWithQueue, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(CarrinhoService $carrinhoService, FaturaService $faturaService)
    {
        try {
            $produtos = $carrinhoService->all();
            $totalFatura = 0;
            foreach ($produtos as $item) {
                $totalFatura += $item->precoProduto * $item->qtdProduto;
            }

            if($totalFatura > 100)
                throw new FaturaException('O valor do carrinho ultrapassa o valor máximo de 100 reais.');

            $faturaService->create(['totalFatura' => $totalFatura, 'produtos' => $produtos]);

            session()->clear();

        }catch (\Exception $e){
            throw $e;
        }

    }
}
