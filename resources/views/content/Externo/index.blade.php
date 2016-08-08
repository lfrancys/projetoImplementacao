@extends('../layout/index')

@section('content')

    <div class="meio">
        <div class="row">
            <div class="col-sm-4 col-md-4 col-lg-2 nav-stacked">
            @foreach($categorias as $categoria)
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="javascrip: void(0);">{!! $categoria->nomeCategoria !!} </a></li>
                </ul>
            @endforeach
            </div>

            <div class="col-sm-8 col-md-8 col-lg-7">
            @foreach($produtos as $produto)
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">{!! $produto->nomeProduto !!} </div>
                        <div class="panel-body"><img src="http://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
                        <div class="panel-footer">
                            <span style="float: left;"> R$ {{ $produto->precoProduto }} </span>
                        {!! Form::open(array('url' => route('carrinho.update', $produto->id), 'method' => 'POST', 'id' => 'formLogin', 'class' => 'form')) !!}

                            {!! Form::hidden('_method', 'PUT') !!}
                            {!! Form::hidden('qtd', '1') !!}
                            {!! Form::submit('Comprar', [ 'class' => 'btn btn-primary', 'style' => 'float:right','name' => "carrinho[$produto->id]"]) !!}

                        {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            @endforeach
                <div class="text-center">
                    {!! $produtos->render() !!}
                </div>
            </div>
            <div class="col-sm-4 col-md-4 col-lg-3">
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
                    {!! Form::submit('Entrar', ['class' => 'btn btn-primary pull-right', 'id' => 'btnEntrar']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection