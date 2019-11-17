<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Image;

/** Models a serem utilizados */
use App\Produtos;
use App\Pedidos;
use App\itenspedido;

class PedidosController extends Controller
{
    /** métodos index - apresenta a lista de produtos para escolha */
   //Listar os Produtos Ativos
public function index(){

   /** Lista somente produtos Ativos ordenados por nome */
   $produtos = Produtos::where('statusProduto', 1)->orderBy('nomeProduto')->get();

   /*** Definir View correpondente **/
   return view('pedidos.index', array(
                                       'produtos' => $produtos,
                                       'buscar' => null,
                                       )
                );

    }

    /**Abre um novo Pedido */
    public function store(Request $request){


        $recebeJson = $request->all();

        $a = array();
        $i = 0;
        $a = array();


        $pedido = new Pedidos();
        $pedido->statusPedido = 1;
        $pedido->nomeCliente = $recebeJson["nomeCliente"];

        if( $pedido->save() ){

             /**busco o id do ultimo pedido */
            $z = $pedido->orderBy('idPedido', 'desc')->first();
            $ultimo =  response()->json($z->idPedido);

          /*  DB::table('users')->insert([
                ['email' => 'taylor@example.com', 'votes' => 0],
                ['email' => 'dayle@example.com', 'votes' => 0]
            ]);*/

            $a = array();
            foreach( $recebeJson["itemdoPedido"] as $v ){
               $array_salvar = array(
                                 "codPedido" => $z->idPedido,
                                 "codProduto" => $v["Codigo"],
                                 "quantidade" =>  $v["Quantidade"],
                                 "created_at" => date("Y-m-d h:i:s"),
                                 "updated_at" => date("Y-m-d h:i:s")
                                );

               array_push($a, $array_salvar);
                }

                if( DB::table('itenspedidos')->insert($a) ) {
                     return response()->json(["Mensagem" => '1'], 200);
                }else{
                    return response()->json(["Mensagem" => '0'], 200);
                }

         }






    }

}

