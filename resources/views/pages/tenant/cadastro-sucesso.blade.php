@extends('layouts.app')

@section('content')

@component('components.container')
<div class="row">
    @component('components.card',['titulo'=>"Cadastro realizando com sucesso","classCard"=>"col-sm-12","color"=>"bg-danger text-white"])
    <h3>Seja bem vindo</h3>
    <p>O endereço do seu catálogo é <a href="{{$url}}" target="_blank">{{$url}}</a> , o nome é  {{$nome}}</p>
    <a href="{{$url}}" target="_blank" class="btn btn-primary " >Acesse sua página</a>
    @endcomponent
</div>
@endcomponent
@endsection
