@extends('layout.menuapp')
@section('title', 'Lista de Produtos')
@section('content')

<span id="linha">
@foreach($produtos as $produto)
<div class="row" >



<div class="col-12"  style="border-bottom: dashed 1px #ccc;padding-top:15px;  padding-bottom: 15px" >

    <div class="row">

    <div class="col-3" style="max-width:100px;">
        <img src="http://localhost:8000/storage/img/default.png" width="75px" height="75px" alt="..." class="img-thumbnail">
    </div>

    <div class="col-6">
       <strong>{{$produto->nomeProduto}}</strong><br>
       <p class="text-muted">{{$produto->descricaoProduto}}</p>
    </div>

    <div class="col-2">
        <input type="number" step="1" class="form-control qty" id="qtd{{$produto->idProduto}}" name="qtd[]" placeholder="0,00" required>

    </div>

    <div class="col-1">

        <button class="btn btn-success btnadd" onclick="clickbtn( 'qtd{{$produto->idProduto}}', '{{$produto->idProduto}}' )"  id="btn_plus_{{$produto->idProduto}}"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
    </div>

    </div>


</div>


</div><!-- end div row -->
</span>
@endforeach

<button id="listartbl">listar itens</button>

<div id="tblListar">

</div>


@endsection
