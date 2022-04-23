<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use App\Tenant\ManagerTenant;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
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
        $tenant = app(ManagerTenant::class);
        $tenantNome = $tenant->tenant();
        $file = $request->file('img');
        $fileNome = date('YmdHi')."-". $file->getClientOriginalName();

        $newImg = $file->move(public_path('public/image/'.$tenantNome->nome),$fileNome);
        $newProduto['img'] =$newImg->getLinkTarget();

      }
        $request->validate([
            'nome'=>['required','min:3'],
            'descricao'=>['required','min:3'],
            'preco'=>['required'],
            'categoria_id'=>['required']
        ]);

        Produto::create($newProduto);

        $produtos = Produto::paginate(10);
        return view('pages.produto.home', compact('produtos'));

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

        $request->validate([
            'nome'=>['required','min:3'],
            'descricao'=>['required','min:3'],
            'preco'=>['required'],
            'categoria_id'=>['required']
        ]);
        $produto->update($request->all());
        $produtos = Produto::paginate(10);
        return view('pages.produto.home', compact('produtos'));
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
}
