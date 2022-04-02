<form action="{{$rota}}" method="POST">
    @csrf
    @if ($tenant)
     @method('PUT')
    @endif
    <div class="m-2">
        @include('components.input',['name'=>'sub_dominio','tilulo'=>'Sub Dominio', 'type'=>'text','value'=>$tenant? $tenant->sub_dominio:''])
        @include('components.input',['name'=>'nome','tilulo'=>'Nome', 'type'=>'text','value'=>$tenant? $tenant->nome:''])
        @include('components.chech',['titulo'=>'Ativo','value'=>'1','checked'=>$tenant? $tenant->status:'1','name'=>'status','id'=>'inlineRadio1'])
        @include('components.chech',['titulo'=>'Inativo','value'=>'0','checked'=>$tenant? $tenant->status:'1','name'=>'status','id'=>'inlineRadio2'])
        <hr class="mt-2">
        <button type="submit" class="btn btn-primary">{{$bntTitulo}}</button>
    </div>
</form>
