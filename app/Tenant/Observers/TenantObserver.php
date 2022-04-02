<?php


namespace App\Tenant\Observers;

use App\Tenant\ManagerTenant;
use Illuminate\Database\Eloquent\Model;

class TenantObserver{

    public function creating(Model $model){

        $tenant = app(ManagerTenant::class)->tenantId();
        $model->setAttribute('tenant_id',$tenant);


    }
}
