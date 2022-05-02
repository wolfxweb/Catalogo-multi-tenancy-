<?php

namespace  App\Traits;

use App\Tenant\ManagerTenant;

trait  Upload{

    public function uploadImagem($request){
        $tenant = app(ManagerTenant::class);
        $tenantNome = $tenant->tenant();
        $file = $request;
        $fileNome = date('YmdHi')."-". $file->getClientOriginalName();
        $file->move(public_path('public/image/'.$tenantNome->nome),$fileNome);
        $urlImg = $tenantNome->nome.'/'.$fileNome;
        return $urlImg;
    }

}
