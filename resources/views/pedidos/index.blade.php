@extends('layout.menuapp')
@section('title', 'Lista de Produtos')
@section('content')

<div class="row" id="listapedido"></div>


<span id="conteudo">


<div class="row">
    <div class="col-12">
        <button class="btn btn-success" id="listartbl">Listar Pedido</button>
    </div>
</div>


<div class="row">
    <div class="col-12" style="margin-top:10px">
       <input class="form-control" placeholder="Encontrar um produto" type="text" id="busca" />
    </div>
</div>

<div class="row ProdutosListados" >
</div>

@foreach($produtos as $produto)

<div class="row produtodetalhe" >

<div class="col-12"  style="border-bottom: dashed 1px #ccc;padding-top:15px;  padding-bottom: 15px" >

    <div class="row">

    <div class="col-2" style="max-width:100px;">
        <img src="{{ url('').'/storage/img/'.$produto->imagemProduto }}" width="75px" height="75px" alt="..." class="img-thumbnail">
    </div>

    <div class="col-6">
       <strong>{{$produto->nomeProduto}}</strong><br>
       <p class="text-muted">{{$produto->descricaoProduto}}</p>
    </div>


    <div class="col-2">
        <input type="number" step="1" class="form-control qty" id="qtd{{$produto->idProduto}}" name="qtd[]" placeholder="0,00" required>

    </div>

    <div class="col-2">
        <button class="btn btn-success" onclick="clickbtn( 'qtd{{$produto->idProduto}}', '{{$produto->idProduto}}', '{{$produto->nomeProduto}}','{{ url('').'/storage/img/'.$produto->imagemProduto }}' , '{{$produto->descricaoProduto}}')"  id="btn_plus_{{$produto->idProduto}}"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
        <button class="btn btn-danger" name="menos_{{$produto->idProduto}}" onclick="remover( '{{$produto->idProduto}}' )"  id="btn_minus_{{$produto->idProduto}}"><i class="fa fa-minus-circle" aria-hidden="true"></i></button>
    </div>

    </div>


</div>


</div><!-- end div row -->

@endforeach
</span>





@endsection
