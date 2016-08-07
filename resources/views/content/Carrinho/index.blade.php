@extends('../layout/index')

@include('content.Externo.css')

@section('content')

    @foreach($produtos as $produto)

    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">{!! $produto->nomeProduto !!} </div>
                    <div class="panel-body">
                        <img src="http://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
                    </div>
                    <div class="panel-footer">
                        <span style="float: left;"> R$ {{ $produto->precoProduto }} </span>
                        <span style="float: right;"> Quantidade {{ $produto->qtdProduto }} </span>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

        <br/><br/>
        {!! Form::open(array('url' => route('carrinho.create'), 'method' => 'POST', 'id' => 'formCarrinho', 'class' => 'form')) !!}
            <div  class="form-group">
                {!! Form::label('nomePessoa', 'Nome:') !!}
                {!! Form::text('nomePessoa', null, [ 'class' => "w3-input"]) !!}
            </div>
            <div  class="form-group">
                {!! Form::label('emailPessoa', 'Email:') !!}
                {!! Form::text('emailPessoa', null, [ 'class' => "w3-input"]) !!}
            </div>
            <div  class="form-group">
                {!! Form::submit('Concluir compra', ['class' => 'btn btn-primary', 'id' => 'btnConcluirCompra']) !!}
            </div>
        {!! Form::close() !!}
    <div>

    </div>
@endsection