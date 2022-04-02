<form action="{{$rota}}" method="POST">
    @csrf
    @if ($categoria)
     @method('PUT')
    @endif
    <div class="m-2">
        {{$rota}}
        @method('PUT')
        @include('components.input', [
            'name' => 'nome',
            'tilulo' => 'Nome Categoria',
            'type' => 'text',
            'value' => $categoria? $categoria->nome:''
        ])
        <hr class="mt-2">
        <button type="submit" class="btn btn-primary">{{$bntTitulo}}</button>
    </div>
</form>
