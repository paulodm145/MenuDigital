<!doctype html>
<html lang="en">
  <head>
    <title>Faça Seu Pedido - @yield('title')</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
            <a class="nav-link" href="#">Início <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Pedidos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Produtos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
          </li>
        </ul>


      </div>
    </nav>

      <div class="container" >
          @yield('content')
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script>

$(function(){

    tbItems = [];
    console.log("Tamanho Inicial: "+tbItems.length);
    localStorage.setItem("tbItemPedido", []);

});





function clickbtn(idNumber, idProd){

    const qty = $('#'+idNumber).val();
    var codigo = idProd;

    const tamanho = localStorage.getItem( 'tbItemPedido' ).length;
    /** Adiciona normalmente se o array estiver vazio */
    if(tamanho == 0){

        var ItemPed = {
                        Codigo   : parseInt(idProd),
                        Quantidade : parseInt(qty)
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

            /** MOnta o novo Item */
            var ItemPed = {
                        Codigo   : parseInt(idProd),
                        Quantidade : parseInt(qty)
                        };
            /** Atualiza o Array */
            meu_array.push(ItemPed);

            /**Lança no LocalStorage */
            localStorage.clear(); /**Remove os valores Anteriores e atualiza com o novo valor */

            localStorage.setItem("tbItemPedido", JSON.stringify(meu_array));
            alert('Produto Adicionado !');

        }else {

            var ItemPed = {
                        Codigo   : parseInt(idProd),
                        Quantidade : parseInt(qty)

                        };

            tbItems.push(ItemPed);
            localStorage.setItem("tbItemPedido", JSON.stringify(tbItems));
            alert('Produto Adicionado !');

        }
    }
}



$("#listartbl").on('click', () => {

 /** ************************************* */

       bola = JSON.parse(localStorage.getItem( 'tbItemPedido' ) );





/** *************************************** */
});


  </script>

  </body>
</html>
