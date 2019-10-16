@extends('layout.app')
@section('title', 'Adicionar um Produto')
@section('content')
<h1 class="mb-3">Adicionar um novo Produto</h1>
@if($message = Session::get('success'))
    <div class="alert alert-success" role="alert">
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
<a href="{{url('/produtos')}}" class="btn btn-success">  <i class="fa fa-arrow-circle-left"></i> Voltar</a>
<hr>
<form method="POST" enctype="multipart/form-data"  action="{{url('produtos')}}">
    @csrf

        <div class="form-row">
	 	<div class="form-group mb-3 col-12">
		    <label for="nomeproduto">Nome Produto:</label>
		    <input type="text" required="required" class="form-control" id="titulo" name="nomeproduto" placeholder="Digite o Nome do Produto..." required>
	 	</div>
        </div>

        <div class="form-row">
        <div class="form-group col-6">
          <label for="tipoproduto">Tipo Produto: </label>
          <select class="form-control" name="tipoproduto" id="">
            <option value = "Comida">Comida</option>
            <option value="Bebida">Bebida</option>
          </select>
        </div>



        <div class="form-group col-6">
          <label for="statusproduto">Status do Produto: </label>
          <select class="form-control" name="statusproduto" id="">
            <option value = "1">Ativo</option>
            <option value="0">Cancelado</option>
          </select>
        </div>
        </div>

        <div class="form-row">
        <div class="form-group col-12">
          <label for="imagem">Imagem:</label>
          <input type="file" class="form-control-file" name="imagem" id="" placeholder="" aria-describedby="fileHelpId">
        </div>
        </div>

        <div class="form-row">
        <div class="form-group col-8">
	 	<button type="submit" class="btn btn-success">Cadastrar Produto</button>
         </div>
        </div>
	</form>

@endsection
