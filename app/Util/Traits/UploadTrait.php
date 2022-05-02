<?php

namespace App\Util\Traits;


trait  TraitUpload{


    public function uploadImagenProduto($request){

     //   dd($request);

        $tenant = app(ManagerTenant::class);
        $tenantNome = $tenant->tenant();
        $file = $request;
        $fileNome = date('YmdHi')."-". $file->getClientOriginalName();
        $file->move(public_path('public/image/'.$tenantNome->nome),$fileNome);
        $produto = $tenantNome->nome.'/'.$fileNome;
        return $produto;
    }

}
