
<div class="mt-3 mb-3">
    @include('components.chech',['titulo'=>'Ativo','value'=>'1','checked'=>$checked == '1'? $checked:'1','name'=>'status','id'=>'inlineRadio1'])
    @include('components.chech',['titulo'=>'Inativo','value'=>'0','checked'=>$checked == '0'? $checked:'1','name'=>'status','id'=>'inlineRadio2'])
</div>

