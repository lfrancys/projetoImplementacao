@extends('../layout/index')



@section('content')
    <div align="center">
        {!! Form::open(array('url' => route('autenticacao.login.store'), 'method' => 'POST', 'id' => 'formLogin', 'class' => 'form')) !!}
        <div  class="form-group">
            {!! Form::label('emailPessoa', 'Email:') !!}
            {!! Form::text('emailPessoa', null, [ 'class' => "w3-input"]) !!}
        </div>
        <div  class="form-group">
            {!! Form::label('senhaPessoa', 'Senha:') !!}
            {!! Form::password('senhaPessoa', null, [ 'class' => "w3-input"]) !!}
        </div>
        <div  class="form-group">
            {!! Form::submit('Entrar', ['class' => 'btn btn-primary', 'id' => 'btnEntrar']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection