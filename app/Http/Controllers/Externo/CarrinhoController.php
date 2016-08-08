<?php

namespace estudo\Http\Controllers\Externo;

use estudo\Services\CarrinhoService;
use Illuminate\Http\Request;

use estudo\Http\Requests;
use estudo\Http\Controllers\Controller;

class CarrinhoController extends Controller
{

    protected $carrinhoService;

    function __construct(CarrinhoService $carrinhoService)
    {
        $this->carrinhoService = $carrinhoService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('content.Carrinho.index');
    }

    public function store(Request $request){
        try{
            if($fatura = $this->carrinhoService->geraResumo($request->all())){
                return view('content.Carrinho.index')->with(['total' => $fatura['total'], 'produtos' => $fatura['produtos']]);
            }
        }catch (\Exception $e) {
            return redirect()->back()->withErrors(['erro' => $e->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            if($this->carrinhoService->salvaSession($request->all(), $id)){
                //dd(session()->all());
                return redirect()->back()->with('success', 'Produto atualizado no carrinho');
            }
        }catch (\Exception $e) {
            return redirect()->back()->withErrors(['erro' => $e->getMessage()]);
        }
    }

}
