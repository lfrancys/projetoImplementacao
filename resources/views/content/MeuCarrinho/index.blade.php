@extends('../layout/index')


@section('content')

    <div class="meio">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Nome</th>
                            <th>Preco</th>
                            <th>Qtd</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    @foreach($produtos as $produto)
                        <tr>
                            <td width="200"><img src="http://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></td>
                            <td>{!! $produto->nomeProduto !!}</td>
                            <td>{!! $produto->precoProduto !!}</td>
                            <td>{!! $produto->qtdProduto !!}</td>
                            <td width="250">
                                {!! Form::open(array('url' => route('carrinho.update', $produto->id), 'method' => 'POST', 'id' => 'form', 'class' => 'form')) !!}
                                {!! Form::hidden('_method', 'PUT') !!}

                                <button class="btn btn-primary" name="qtdProduto" value="{!! $produto->qtdProduto + 1 !!}" style="float:center">+</button>
                                <button class="btn btn-primary" name="qtdProduto" value="{!! $produto->qtdProduto - 1 !!}" style="float:center">-</button>
                                <button class="btn btn-primary" name="qtdProduto" value="0" style="float:center">Remover</button>

                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </table>



                <br/><br/>
            </div>

            <div class="col-sm-12 col-md-12 col-lg-12">
                {!! Form::open(array('url' => route('carrinho.store'), 'method' => 'POST', 'id' => 'formCarrinho', 'class' => 'form')) !!}
                    <div class="form-group">
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
            </div>
        </div>
    </div>
@endsection