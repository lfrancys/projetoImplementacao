<?php

namespace estudo\Http\Controllers\Externo;

use estudo\Services\CategoriaService;
use estudo\Services\ProdutoService;
use Illuminate\Http\Request;

use estudo\Http\Requests;
use estudo\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    protected $produtoService;
    protected $categoriaService;

    function __construct(ProdutoService $produtoService, CategoriaService $categoriaService)
    {
        $this->produtoService = $produtoService;
        $this->categoriaService = $categoriaService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Auth::guest())
            return redirect()->route('sistema.dashboard.index');

        $produtosDestaque = $this->produtoService->listaProdutosDestaque();
        $categorias = $this->categoriaService->all();

        return view('content.Externo.index')->with(['produtos' => $produtosDestaque, 'categorias' => $categorias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
