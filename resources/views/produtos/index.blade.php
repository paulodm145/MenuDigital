@extends('layout.app')
@section('title', 'Lista de Produtos')
@section('content')



<div class="row">

    <div class="col-md-12">
        <H2>CADASTRO DE PRODUTOS</H2><hr>
    </div>

    <div class="col-md-12">
        <a href="{{url('produtos/create/')}}" class="btn btn-success"> <i class="fa fa-plus-circle"></i> Novo Produto</a>
    </div>



    <div class="col-md-12">
    <div class="row mt-3"></div>
       <table class="table table-bordered">
           <thead>
               <tr>
                   <th>Opções</th>
                   <th>Produto</th>
                   <th>Nome Produto</th>
                   <th>Tipo Produto</th>
               </tr>
           </thead>
           <tbody>

           @foreach ($produtos as $produto)
               <tr>
                   <td scope="row">

                    <a href="{{url('produtos/'.$produto->idProduto.'/edit')}}" class="btn btn-success"> <i class="fa fa-edit"></i> </a>
                    <a href="{{url('produtos/'.$produto->id.'/edit')}}" class="btn btn-warning"> <i class="fa fa-ban"></i> </a>
                    <a href="{{url('produtos/'.$produto->id.'/edit')}}" class="btn btn-danger"> <i class="fa fa-trash"></i> </a>


                   </td>
                   <td><img src="{{ url('/storage/img/'.$produto->imagemProduto) }}" width="150px" height="150px" alt="..." class="img-thumbnail"></td>
                   <td>{{$produto->nomeProduto}}</td>

                   <td>
                    @if($produto->statusProduto = 1)
                       <p class="btn btn-success">Ativo</p>
                    @else
                       <p class="btn btn-danger">Cancelado</p>
                    @endif
                   </td>
               </tr>
            @endforeach

           </tbody>
       </table>
    </div>



</div><!-- end div row -->

@endsection
