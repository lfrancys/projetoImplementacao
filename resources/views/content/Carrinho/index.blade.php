@extends('../layout/index')

@include('content.Externo.css')

@section('content')

    @if(isset($total))
    <div class="bg-primary">
        Total da compra: <b>R$ {{ $total }}</b>
    </div>
    @endif

    <br/><br/>

    @if(isset($produtos))
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
            </div>
        @endforeach
    @endif

    <br/><br/>

    <div  class="form-group">
        {!! Form::open(array('url' => route('meu-carrinho.store'), 'method' => 'POST', 'id' => 'formFinalizaCompra', 'class' => 'form')) !!}

        <div  class="form-group">
            {!! Form::submit('Finalizar compra', ['class' => 'btn btn-primary', 'id' => 'btnFinalizarCompra']) !!}
        </div>

        {!! Form::close() !!}


    </div>
@endsection