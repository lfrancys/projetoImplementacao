@extends('../layout/index')

@include('content.Sistema.js')

@section('content')
    @parent
    <div> Bem-vindo, {{Auth::user()->nomePessoa}} </div>
    <br/><br/><br/>

    <h3 class="text-center">
        Faturas
    </h3>
    <br/><br/>
    <table id="tableFaturas" class="display table" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Código</th>
                <th>Valor</th>
            </tr>
        </thead>
    </table>
@endsection

