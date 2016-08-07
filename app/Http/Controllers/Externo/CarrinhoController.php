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

    }

    public function create(){

        return view('index');

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
                return redirect()->back()->with('success', 'Produto adicionado ao carrinho');
            }
        }catch (\Exception $e) {
            return redirect()->back()->withErrors(['erro' => $e->getMessage()]);
        }
    }

}
