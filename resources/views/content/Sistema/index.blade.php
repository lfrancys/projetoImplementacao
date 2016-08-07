@extends('../layout/index')



@section('content')
    <div> Bem-vindo, {{Auth::user()->nomePessoa}} </div>
@endsection