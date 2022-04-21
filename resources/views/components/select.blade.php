<select class="form-select form-select-lg mb-3" name="{{$name}}" aria-label=".form-select-lg example">
    @foreach ($itens as $iten)
      <option value="{{$iten->id}}" selected>{{ $iten->nome}}</option>
    @endforeach
</select>
