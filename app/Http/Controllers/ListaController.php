<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

/** Models a serem utilizados */
use App\Produtos;

class ListaController extends Controller
{

    public function index(Request $request){

    /** Lista somente produtos Ativos ordenados por nome */
   $produtos = Produtos::where('statusProduto', 1)->orderBy('nomeProduto')->get();

         return response()->json($produtos);

    }

    public function show($id){
        /**Filtra pelo id do produto */
        $produtos = Produtos::where('nomeProduto', 'LIKE', '%'.$id.'%')
                            ->orwhere('descricaoProduto', 'LIKE', '%'.$id.'%')
                            ->get();
        return response()->json($produtos);
    }

}
