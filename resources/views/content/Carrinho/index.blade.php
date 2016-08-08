@extends('../layout/index')

@section('content')

    <div class="meio">
        <div class="row">
            @if(isset($total))
            <div class="col-sm-12 col-md-12 col-lg-12">
                <p class="bg-info">
                    Total da compra: <b>R$ {{ $total }}</b>
                </p>
            </div>
            @endif

            <br/><br/>
            <div class="col-sm-12 col-md-12 col-lg-12">
                @foreach($produtos as $produto)
                    <div class="col-sm-4 col-md-4 col-lg-4">
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
                @endforeach
            </div>
            <br/><br/>
            <div class="col-sm-12 col-md-12 col-lg-12 form-group">

                {!! Form::open(array('url' => route('meu-carrinho.store'), 'method' => 'POST', 'id' => 'formFinalizaCompra', 'class' => 'form')) !!}

                <div  class="form-group">
                    {!! Form::submit('Finalizar compra', ['class' => 'btn btn-primary', 'id' => 'btnFinalizarCompra']) !!}
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection