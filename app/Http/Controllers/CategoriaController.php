<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use COM;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::paginate(10);

       return view('pages.categoria.home', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'nome'=>['required','min:3']
        ]);

        Categoria::create($request->all());
        $categorias = Categoria::paginate(10);
        return view('pages.categoria.home',compact('categorias'));
      // dd($categoria);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id )
    {

        $request->validate([
            'nome'=>['required','min:3']
        ]);
        $categoria = Categoria::find($id);
        if($categoria){
            $categoria->update( $request->all());
        }
        $categorias = Categoria::paginate(10);
        return view('pages.categoria.home', compact('categorias'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $categoria = Categoria::find($id);
        if(isset($categoria)){
            $categoria->delete();
        }
      $categorias = Categoria::paginate(10);
      return view('pages.categoria.home', compact('categorias'));
    }
}
