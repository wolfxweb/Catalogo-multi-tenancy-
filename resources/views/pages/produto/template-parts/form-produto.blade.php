<form action="{{ route($rota)}}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="m-2 ">

        @foreach ( $inputsText as   $input)
            @include('components.input', [
                'name' => $input['name'],
                'tilulo' => $input['tilulo'],
                'type' =>  $input['type'],
                'value' => $input['value']? $input['value']:''
            ])
         @endforeach
         @include('components.select',['itens'=>$categorias,'name'=>'categoria_id'])
         @include('components.upload')
         @include('components.radio-ativo-inativo',['checked'=>'1'])



        <hr class="mt-2">
        <button type="submit" class="btn btn-primary">{{$bntTitulo}}</button>
    </div>
</form>
