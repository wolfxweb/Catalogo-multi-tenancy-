<select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
    @foreach ($itens as $iten)
      <option value="$iten->id" selected>{{ $iten->nome}}</option>
    @endforeach
</select>
