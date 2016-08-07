<?php

namespace estudo\Http\Controllers\Externo;

use Illuminate\Http\Request;

use estudo\Http\Requests;
use estudo\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index(){
        if(!Auth::guest())
            return redirect()->route('sistema.dashboard.index');

        return view('content.Autenticacao.login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\LoginRequest $request)
    {

        if(\Auth::attempt(['emailPessoa' => $request->emailPessoa, 'password' => $request->senhaPessoa])){
            if(!Auth::user()->statusPessoa)
                return redirect()->back()->withErrors(['usuarioInvalido' => 'Usuário inativo no sistema!']);

            return redirect()->route('sistema.dashboard.index');
        }

        return redirect()->back()->withErrors(['erro' => 'Email e senha não conferem']);

    }

    public function destroy(){
        \Auth::logout();
        return redirect()->route('autenticacao.login.index')->with(['success' => 'Você saiu do sistema']);
    }


}
