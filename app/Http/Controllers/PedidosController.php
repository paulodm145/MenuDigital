<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Image;


/** Models a serem utilizados */
use App\Produtos;

class PedidosController extends Controller
{
    /** métodos index - apresenta a lista de produtos para escolha */
   //Listar os Produtos Ativos
public function index(){
   $produtos = Produtos::where('statusProduto', 1)->orderBy('nomeProduto')->get();

   return view('produtos.index', array(
                                       'produtos' => $produtos,
                                       'buscar' => null,
                                       ));

    }
}
