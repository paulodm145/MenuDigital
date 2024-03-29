@extends('layout.app')
@section('title', 'Editar um Produto')
@section('content')
<h2 class="mb-3">Editar Produto: <span class="text-info">Cód: {{ $produto->idProduto }} - {{$produto->nomeProduto}} </span></h2>
<hr>
@if($message = Session::get('success'))
    <div class="alert alert-info" role="alert">
       {{$message}}
    </div>

@endif
@if( count($errors) > 0 )
<div class="alert alert-danger" role="alert">
       <ul>
       @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
       @endforeach
       </ul>
    </div>
@endif
<a href="{{url('/produtos')}}" class="btn btn-info">  <i class="fa fa-arrow-circle-left"></i> Voltar</a>
<hr>
<form method="POST" enctype="multipart/form-data"  action="{{action('ProdutosController@update', $id)}}" >
    @csrf

    <input type="hidden" name="_method" value="PATCH">

        <div class="form-row">
	 	<div class="form-group mb-3 col-12">
		    <label for="nomeproduto">Nome Produto:</label>
		    <input type="text"
                    required="required"
                    class="form-control"
                    id="titulo"
                    name="nomeproduto"
                    value="{{$produto->nomeProduto}}"
                    placeholder="Digite o Nome do Produto..."
                    required>
	 	</div>
        </div>

        <div class="form-row">
        <div class="form-group col-6">
          <label for="tipoproduto">Tipo Produto: </label>

          <select class="form-control" name="tipoproduto" id="">


            <option value = "Comida" @if($produto->tipoProduto == "Comida"){{ 'selected' }} @endif >Comida</option>

            <option value="Bebida" @if($produto->tipoProduto == "Bebida"){{ 'selected' }} @endif >Bebida</option>
          </select>


        </div>



        <div class="form-group col-6">
          <label for="statusproduto">Status do Produto: </label>
          <select class="form-control" name="statusproduto" id="">
            <option value = "1"  @if($produto->statusProduto == "1"){{ 'selected' }} @endif > Ativo</option>
            <option value= "0"    @if($produto->statusProduto == "0"){{ 'selected' }} @endif > Cancelado</option>
          </select>
        </div>
        </div>


        <div class="form-row">
        <div class="form-group col-12">
          <label for="imagem">Descrição:</label>
          <textarea name="descricaoproduto" class="form-control" id="descricaoproduto" cols="20" rows="5">
            {{$produto->descricaoProduto}}
          </textarea>
        </div>
        </div>

        <div class="form-row">
        <div class="form-group col-12">
          <label for="imagem">Imagem:</label>
          <input type="file" class="form-control-file" name="imagem" id="" placeholder="" aria-describedby="fileHelpId">
        </div>
        </div>

        <div class="form-row">
        <div class="form-group col-12">

            <img src="{{ url('/storage/img/'.$produto->imagemProduto) }}"
                 width="150px"
                 height="150px"
                 alt="..."
                 class="img-thumbnail"
            >

        </div>
        </div>

        <div class="form-row">
        <div class="form-group col-8">
	 	<button type="submit" class="btn btn-info"><i class="fa fa-edit"></i> Atualizar Produto</button>
         </div>
        </div>


	</form>

@endsection
