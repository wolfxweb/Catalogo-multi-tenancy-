<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $tenants = Tenant::paginate(10);
        return view('pages.tenant.home',compact('tenants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.tenant.cadastro');
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
            'sub_dominio'=>['required','unique:tenants','min:3'],
            'nome'=>['required','unique:tenants','min:3']
        ]);
        $tenant = Tenant::create($request->all());
        return view('pages.tenant.cadastro-sucesso',[
            'url'=>'http://'.$tenant->sub_dominio.'.localhost:8000',
            'nome'=>$tenant->nome,
            'tenant_id'=>$tenant->id
        ]);

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
        //UTILIZANDO MODAL
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $tenantUpdate = $request->all();
       unset($tenantUpdate['_token']);
       unset($tenantUpdate['_method']);
       $tenantAtual = Tenant::find($id);

       if( $tenantUpdate['sub_dominio'] == $tenantAtual->sub_dominio && $tenantUpdate['nome'] == $tenantAtual->nome ){
           Tenant::where('id',$id)->update($tenantUpdate);
       }
       if( $tenantUpdate['sub_dominio'] != $tenantAtual->sub_dominio && $tenantUpdate['nome'] == $tenantAtual->nome ){
            $request->validate([
                'sub_dominio'=>['required','unique:tenants','min:3'],
            ]);
            Tenant::where('id',$id)->update($tenantUpdate);
        }
        if( $tenantUpdate['sub_dominio'] == $tenantAtual->sub_dominio && $tenantUpdate['nome'] != $tenantAtual->nome ){
            $request->validate([
                'nome'=>['required','unique:tenants','min:3'],
            ]);
            Tenant::where('id',$id)->update($tenantUpdate);
        }

        $tenants = Tenant::paginate(10);
        return view('pages.tenant.home',compact('tenants'));

        //dd($tenantUpdate);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
 
        /**outra validações
         * não pode deletar se tiver produtos ou categorias.
         */

        $tenant = Tenant::find($id);
        if(isset($tenant)){
            $tenant->delete();
        }
        $tenants = Tenant::paginate(10);
        return view('pages.tenant.home',compact('tenants'));
    }
}
