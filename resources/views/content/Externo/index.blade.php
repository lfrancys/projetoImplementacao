@extends('../layout/index')

@section('content')

    @foreach($produtos as $produto)

    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">{!! $produto->nomeProduto !!} </div>
                    <div class="panel-body"><img src="http://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
                    <div class="panel-footer">
                        <span style="float: left;"> R$ {{ $produto->precoProduto }} </span>
                    {!! Form::open(array('url' => route('carrinho.update', $produto->id), 'method' => 'POST', 'id' => 'formLogin', 'class' => 'form')) !!}

                        {!! Form::hidden('_method', 'PUT') !!}
                        {!! Form::hidden('qtd', '1') !!}
                        {!! Form::submit('Adicionar ao carrinho', [ 'class' => 'btn btn-primary', 'style' => 'float:right','name' => "carrinho[$produto->id]"]) !!}

                    {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    </div><br>
@endsection