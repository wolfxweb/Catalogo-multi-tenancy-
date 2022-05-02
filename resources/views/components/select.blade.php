

<select class="form-select form-select-lg " name="{{$name}}" aria-label=".form-select-lg example">
    @foreach ($itens as $iten)
      <option value="{{$iten->id}}"
        @if ($categoriaSelecionada)
            @if ($categoriaSelecionada == $iten->id )
              selected
            @endif
        @endif
      >{{ $iten->nome}}</option>
    @endforeach
</select>
