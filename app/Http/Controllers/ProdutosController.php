<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Image;

use App\Produtos; /** Model Produtos */


class ProdutosController extends Controller
{
    /** Tela Inicial */
    public function index(){
        //Lista todos os Produtos
        $produtos = Produtos::all();
        return view('produtos.index', array(
                                            'produtos' => $produtos,
                                            'buscar' => null,
                                            ));
    }

    /**Abre o Formulário para a Criação de um novo Produto */
    public function create(){
        return view('produtos.create');
    }

    public function edit($id){

        /**Filtra pelo id do produto */
        $produto = Produtos::find($id);
        return view('produtos.edit',compact('produto', 'id'));


    }

    public function update(){

    }

    public function createThumbnail($path, $width, $height)
        {
            $img = Image::make($path)->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($path);
        }

    /** Com este método salvo o produto no banco de dados */
    public function store(Request $request){

        /**Valida o Upload da imagem */
        if($request->hasFile('imagem')){

            $imagem = $request->file('imagem');

            // Define o valor default para a variável que contém o nome da imagem
            $nameFile = null;

            // Define um aleatório para o arquivo baseado no timestamps atual
            $name = uniqid(date('HisYmd'));

            // Recupera a extensão do arquivo
            $extension = $request->file('imagem')->extension();

            // Define finalmente o nome
            $nameFile = "{$name}.{$extension}";

            // Faz o upload:
            $upload = $request->file('imagem')->storeAs('public/img', $nameFile);
             //create small thumbnail
            $smallthumbnailpath = public_path('storage/img/'. $nameFile);
            $this->createThumbnail($smallthumbnailpath, 150, 150);

            /** ------------------------------------------------------------------- */
        }else{
            $nameFile = "default.png";
        }

        /**salvar no banco de dados */

        $produto = new Produtos();
        $produto->nomeProduto = $request->input('nomeproduto');
        $produto->tipoProduto = $request->input('tipoproduto');
        $produto->statusProduto = $request->input('statusproduto');
        $produto->imagemProduto = $nameFile;

        /** Salva o produto e exibe a mensagem de sucesso */
        if($produto->save()){
            return redirect('produtos/create')
                            ->with('success', 'Produto Cadastrado com Sucesso!');
        }



    }

}
