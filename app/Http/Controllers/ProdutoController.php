<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use App\Tenant\ManagerTenant;
use App\Traits\Upload;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdutoController extends Controller
{

    use Upload;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $produtos = Produto::paginate(10);
        return view('pages.produto.home', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categorias = Categoria::all();
        return view('pages.produto.cadastro', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $newProduto = $request->all();

      if($request->hasFile('img')){
        $request->validate([
            'img'=>['mimes:jpeg,png'],
        ]);
        $newProduto['img'] =  $this->uploadImagem($request->file('img'));
      }
       $request->validate([
            'nome'=>['required','min:3'],
            'descricao'=>['required','min:3'],
            'preco'=>['required'],
            'categoria_id'=>['required']
        ]);

        Produto::create($newProduto);
        return redirect()->route('produto.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {


        $categorias = Categoria::all();
        return view('pages.produto.edit',['categorias'=>$categorias , 'produto'=> $produto]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , Produto $produto)
    {



        $produtoUpdate = $request->all();

        $request->validate([
            'nome'=>['required','min:3'],
            'descricao'=>['required','min:3'],
            'preco'=>['required'],
            'categoria_id'=>['required']
        ]);



        if($request->hasFile('img')){
            $request->validate([
                'img'=>['mimes:jpeg,png'],
            ]);
            $produtoUpdate['img'] = $this->uploadImagem($request->file('img'));

        }

        $produto->update($produtoUpdate);
        return redirect()->route('produto.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public  function search(Request $request){

        if($request['search']){
            $produtos = Produto::where('nome','like',$request['search'])->paginate(10);
        }else{
            $produtos = Produto::paginate(10);
        }
     ///   dd($produtos);
        return view('index', compact('produtos'));
       //
    }
}
