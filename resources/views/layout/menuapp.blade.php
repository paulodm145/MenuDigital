<!doctype html>
<html lang="en">
  <head>
    <title>Faça Seu Pedido - @yield('title')</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href=" {{ URL::to('css/bootstrap.min.css') }}" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

  </head>
  <body style="min-height: 75rem; padding-top: 4.5rem;">

  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-success">
      <a class="navbar-brand" href="#">Cardápio Interativo</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#" id="nomeCliente">Início <span class="sr-only">(current)</span></a>
          </li>

        </ul>




      </div>
    </nav>

      <div class="container" >
          @yield('content')
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
  src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>

$(function(){
    tbItems = [];
    localStorage.setItem("tbItemPedido", []);
    var txtNome = localStorage.getItem("nomeCliente");
    $("#nomeCliente").text( `Olá!, ${txtNome} Selecione os itens do seu Pedido.` );
});



function remover(idProd){

    var listalocal = localStorage.getItem( 'tbItemPedido' );
    list = JSON.parse(listalocal);

    var indice = list.indexOf(list.filter(function(obj) {
                                        return obj.Codigo == parseInt(idProd);
                                        })[0]);
    list.splice( indice, 1 );
    localStorage.setItem("tbItemPedido", JSON.stringify(list));
    $('#qtd'+idProd).val('');
    alert(' Produto Excluído com SUCESSO !!! ');



}


function clickbtn(idNumber, idProd, nomeProduto, imagemProduto, descricaoProduto){

    const qty = $('#'+idNumber).val();
    var codigo = idProd;

    const tamanho = localStorage.getItem( 'tbItemPedido' ).length;
    /** Adiciona normalmente se o array estiver vazio */
    if(tamanho == 0){
        $('#'+idNumber).val(1);
        var ItemPed = {
                        Codigo   : parseInt(idProd),
                        Quantidade : 1,
                        NomeProduto: nomeProduto,
                        ImagemProduto: imagemProduto,
                        DescricaoProduto: descricaoProduto
                        };
        tbItems.push(ItemPed);
        localStorage.setItem("tbItemPedido", JSON.stringify(tbItems));
        alert('Produto Adicionado !');

    }else{
        /** Recebo os dados Armazenados */
        TabelaPedido = localStorage.getItem( 'tbItemPedido' );

        /** Transforma em um objeto de dados */
        meu_array = JSON.parse(TabelaPedido);
        var indice = meu_array.indexOf(meu_array.filter(function(obj) {
                                        return obj.Codigo == parseInt(codigo);
                                        })[0]);
         /**Maior ou igual a zero encontra o produto */
        if(indice >= 0){
            /** Remove o Indice */
            meu_array.splice( indice, 1 );

            var quantidadeprod = parseInt(qty)+1;

            $('#'+idNumber).val( quantidadeprod );
            /** MOnta o novo Item */
            var ItemPed = {
                        Codigo   : parseInt(idProd),
                        Quantidade : quantidadeprod,
                        NomeProduto: nomeProduto,
                        ImagemProduto: imagemProduto,
                        DescricaoProduto: descricaoProduto
                        };
            /** Atualiza o Array */
            meu_array.push(ItemPed);
            /**Lança no LocalStorage */

            localStorage.setItem("tbItemPedido", JSON.stringify(meu_array));


        }else {

            var listaLocal = localStorage.getItem( 'tbItemPedido' );

            listaLocalArray = JSON.parse(listaLocal);
            $('#'+idNumber).val(1);
            var AddPedido = {
                        Codigo   : parseInt(idProd),
                        Quantidade : 1,
                        NomeProduto: nomeProduto,
                        ImagemProduto: imagemProduto,
                        DescricaoProduto: descricaoProduto
                        };

            listaLocalArray.push(AddPedido);
            localStorage.setItem("tbItemPedido", JSON.stringify(listaLocalArray));

        }
    }
}



$("#listartbl").on('click', () => {
 /** ************************************* */
      var listaPedido = localStorage.getItem("tbItemPedido");

      if (listaPedido === "") {
        alert('Adicione um Produto ao Pedido');
      }else{


            var listatbl = JSON.parse(listaPedido);

            var headertbl = `<div class='col-12'>

            <p class='text-success'> <strong>Items do seu Pedido</strong> </p>
            <button class='btn btn-success' id="btnenviar" >Enviar Pedido</button>
            <button class='btn btn-danger' id="pedirmais" >Pedir Mais...</button>

                                <table style='width=100%; margin-top:15px' class="table table-striped table-inverse table-responsive">
                                    <thead class="thead-inverse">
                                        <tr>
                                            <th>Imagem</th>
                                            <th>Produto</th>
                                            <th>Quantidade</th>
                                        </tr>
                                        </thead>
                                        <tbody> `;

                var total = listatbl.length;
                var i;
                var nitems = 0;
                var txt="";

                for(i=0; i<total; i++){

                    nitems = listatbl[i].Quantidade+ nitems;
                        txt += `<tr>

                                    <td scope="row"><img src="${listatbl[i].ImagemProduto}" width="75px" height="75px" alt="..." class="img-thumbnail"></td>
                                    <td><strong> ${listatbl[i].NomeProduto} </strong> <p class="text-mutted">${listatbl[i].DescricaoProduto}</p></td>
                                    <td> ${listatbl[i].Quantidade} </td>
                                </tr> `;

                        }
                    var footertbl = `</tbody></table></div><p class='btn btn-danger'>Items Pedidos: ${nitems}<p>`;

                    $('#conteudo').slideUp('slow');
                    $('#listapedido').html(headertbl+txt+footertbl).show('slow');


                }
/** *************************************** */
$("#pedirmais").on('click', function () {
    $('#conteudo').slideUp('slow').show();
    $('#listapedido').html('').hide('slow');
});

$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });

$("#btnenviar").on('click', function (e) {
    //location.href="{{ url('') }}/"

    e.preventDefault();

    var nomeCliente = localStorage.getItem('nomeCliente');
    var lp = JSON.parse(localStorage.getItem('tbItemPedido'));

    var dados = {nomeCliente:nomeCliente,
                  itemdoPedido: lp
                };
/** ---------------------- ENVIAR O PEDIDO --------------- */
$.ajax({
            type: 'POST',
            dataType:'json',
            url: "{{url('')}}/api/pedidos/store",
            data: dados,
                success: function(r) {

                    if(r.Mensagem == 1){
                        alert('Pedido ENVIADO com Sucesso !','','OK');
                        location.href="{{ url('') }}/ ";
                     }else{
                        alert('Você já Votou!');
                        location.href="{{ url('') }}/pedidos "
                    }

                },
            error: function(e) {
            alert('Error: ' + e.message);
            }
        });
		return false;


/** ------------------------------------------------------ */
});
/**------------------ */
});




/** Buscar Json de produtos e lança no localStorage */
$(document).ready(function(){
	// api/produtos/lista
    $.getJSON("{{url('')}}/api/produtos/lista",
        function (data) {
            localStorage.setItem("ListaGeraldeProdutos", JSON.stringify(data));
        }
    );
 });

/**buscar registro no json acumulado no local */
 $(document).ready(function() {
    $("#busca").keyup(function(){

        var LocalTabelaPedido = localStorage.getItem( 'ListaGeraldeProdutos' );


        var tblPedido = JSON.parse(LocalTabelaPedido);
        var pesquisa = $(this).val();
       // var dados = pesquisa;
/** ----------------------------------------------------------------------------------- */

$.getJSON("{{url('')}}/api/produtos/"+pesquisa,
    function (data) {
        var mostraTxt = '';

        var verifica =  localStorage.getItem( 'tbItemPedido' ).length;

        if( verifica == 0 )
        {

            tamanhoProd = 0;
        }else{
                const ProdutosdoPedido = localStorage.getItem( 'tbItemPedido' );
                var Prod = JSON.parse(ProdutosdoPedido);
                var tamanhoProd = Prod.length;
                console.log('diferente de zero')
            }

         /** transformando em Json */



            $(".ProdutosListados").html('');
            $(".produtodetalhe").html('');

if( tamanhoProd > 0 ){


        /** Início do FOR */
        for(var z = 0; z < data.length; z++){

            /** Converter o Valor a ser procurado em Inteiro */
            var numero = parseInt(data[z].idProduto);

            var indice = Prod.indexOf(Prod.filter(function(obj) {
                                        return obj.Codigo == numero;
                                        })[0]);


            if(indice >= 0)
                { var quanLista = Prod[indice]['Quantidade']; }
            else{ var quanLista = '0';}


           mostraTxt += `
            <div class="row produtodetalhe" >
                <div class="col-12 "  style="border-bottom: dashed 1px #ccc;padding-top:15px;  padding-bottom: 15px; widht:100%" >
                    <div class="row">
                        <div class="col-2 ">
                            <img src="{{url('')}}/storage/img/${data[z].imagemProduto}" width="75px" height="75px" alt="..." class="img-thumbnail">
                        </div>
                        <div class="col-6 ">
                            <strong>${data[z].nomeProduto}</strong><br>
                            <p class="text-muted">${data[z].descricaoProduto}</p>
                        </div>
                        <div class="col-2 ">
                            <input type="number" value='${quanLista}' step="1" value='0' class="form-control qty" id="qtd${data[z].idProduto}" name="qtd[]" placeholder="0,00" required>
                        </div>
                        <div class="col-2 ">
                            <button class="btn btn-success" onclick="clickbtn( 'qtd${data[z].idProduto}', '${data[z].idProduto}', '${data[z].nomeProduto}','{{ url('').'/storage/img/'}}${data[z].imagemProduto}' , '${data[z].descricaoProduto}')"  id="btn_plus_${data[z].idProduto}"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                            <button class="btn btn-danger" name="menos_${data[z].idProduto}" onclick="remover( '${data[z].idProduto}' )"  id="btn_minus_${data[z].idProduto}"><i class="fa fa-minus-circle" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </div>
            </div><!-- end div row -->`;
            } /** Final do FOR */
}else{

/** --------------------------------------------------------------------------- */
for(var z = 0; z < data.length; z++){

var quaLista = 0;


mostraTxt += `
<div class="row produtodetalhe" >
    <div class="col-12 "  style="border-bottom: dashed 1px #ccc;padding-top:15px;  padding-bottom: 15px; widht:100%" >
        <div class="row">
            <div class="col-2">
                <img src="{{url('')}}/storage/img/${data[z].imagemProduto}" width="75px" height="75px" alt="..." class="img-thumbnail">
            </div>
            <div class="col-6">
                <strong>${data[z].nomeProduto}</strong><br>
                <p class="text-muted">${data[z].descricaoProduto}</p>
            </div>
            <div class="col-2 ">
                <input type="number" value='${quanLista}' step="1" value='0' class="form-control qty" id="qtd${data[z].idProduto}" name="qtd[]" placeholder="0,00" required>
            </div>
            <div class="col-2 ">
                <button class="btn btn-success" onclick="clickbtn( 'qtd${data[z].idProduto}', '${data[z].idProduto}', '${data[z].nomeProduto}','{{ url('').'/storage/img/'}}${data[z].imagemProduto}' , '${data[z].descricaoProduto}')"  id="btn_plus_${data[z].idProduto}"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                <button class="btn btn-danger" name="menos_${data[z].idProduto}" onclick="remover( '${data[z].idProduto}' )"  id="btn_minus_${data[z].idProduto}"><i class="fa fa-minus-circle" aria-hidden="true"></i></button>
            </div>
        </div>
    </div>
</div><!-- end div row -->`;
}


/** --------------------------------------------------------------------------- */
}

        $(".ProdutosListados").html(mostraTxt);
    }


);
/** ----------------------------------------------------------------------------------- */

    })
});


</script>

  </body>
</html>
