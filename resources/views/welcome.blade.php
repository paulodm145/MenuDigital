<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            @import url('https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap');
*{
  margin: 0;
  padding: 0;
  outline: 0;
  box-sizing: border-box;
}

html, body, #root{
  min-height: 100%;
}

body {
  background: #000 url('{{ URL::to('img/rolls_sushi_meat_fish_seafood_71683_1440x900.jpg') }}') no-repeat;
  background-size:cover;
  -webkit-font-smoothing: antialiased !important;

}

body, input, button{
  font-family: 'Roboto', Arial, Helvetica, sans-serif;
  font-size: 14px;
}

.container{
  margin: 80px auto 0;
  max-width: 450px;
  width: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
}

.content{
  width:100%;
  background: #fff;
  margin-top: 50px;
  border-radius: 4px;
  padding: 30px;
}

.content > p {
  font-size: 22px;
  line-height: 30px;
  margin-bottom: 30px;
  text-align: center;

}

.content .formulario {
  display: flex;
  flex-direction: column;
}

.content .formulario label{
  font-size: 14px;
  color:#000;
  font-weight: bold;
  margin-bottom: 8px;
}

.content .formulario label span{
  font-weight: normal;
  color: #999;
  font-size: 12px;
}

.content .formulario input {
  margin-bottom: 20px;
  border: 1px solid #ddd;
  border-radius: 2px;
  height: 45px;
  padding: 0 15px;
  font-size: 16px;
}

.content button.btn{
  border: 0;
  border-radius:2px;
  width: 100%;
  height: 42px;
  padding: 0 20px;
  font-size: 16px;
  font-weight: bold;
  background: #28a745;
  color: #fff;
  cursor: pointer;
}

.content button.btn:hover {
  background: #1c8f0d;
}

.content_alert{
  width:100%;
  background:lightgreen;
  margin-top: 15px;
  margin-bottom: 15px;
  border-radius: 5px;
  padding: 15px;
}

.content_alert > p {
  font-size: 18px;
  line-height: 15px;
  text-align: center;

}

#centro{
    text-align:center;
}

        </style>
    </head>
    <body>
    <div class="container">
        <img src="{{ URL::to('img/default.png') }}" alt='HORTISUCO' />

        @if($message = Session::get('success'))

                <div class="content_alert">
                     <p> {{$message}}</p>
                </div>

        @endif

        <div class="content">

        <p>
        <span id="centro"><strong>Menu Digital</strong></span>
      <br>Informe seu <strong>NOME</strong> e faça seu Pedido
      </p>

       <div class="formulario">
          <label for="nome">Informe seu nome:</label>
          <input
                id="nome"
                type="text"
          />

      <button class="btn" id="btnNome">INICIAR Pedido</button>

      </div>


        </div>
    </div>
    <script
  src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script>
  $(document).ready(function () {

      $("#btnNome").on('click', function () {
        var nome = $('#nome').val();
        localStorage.setItem("nomeCliente", nome );

        location.href="{{ url('') }}/pedidos "
      });

  });
  </script>
    </body>


</html>
