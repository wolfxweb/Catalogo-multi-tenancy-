<?php

namespace App\Tenant;

use App\Models\Tenant;

class ManagerTenant {

   public  function subDominio(){
       //verifica a url da aplicação e retorna o sub dominio
       $urlTenant = explode('.',request()->getHost());
       return $urlTenant[0];
   }

   public function tenant(){
       //verifca na base dados se o sub dominio existe
       $subDominio = $this->subDominio();
       $tenant  = Tenant::Where('sub_dominio',$subDominio)->first();
       return   $tenant;
   }

   public function tenantId(){
       $tenant = $this->tenant();
       return $tenant->id;
  }

}
