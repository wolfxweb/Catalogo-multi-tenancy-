@extends('layouts.app')

@section('content')

@component('components.container')
@php

@endphp
<div class="row">
    @component('components.card',['titulo'=>"Cadastro Tenant","classCard"=>"col-sm-12","color"=>"bg-primary text-white"])
     @php   $rota =route('tenant.store');  @endphp
     @include('pages.tenant.template-parts.form-cadastro',['tenant'=>'','bntTitulo'=>'Cadastro','rota'=>$rota])
    @endcomponent
</div>
@endcomponent
@endsection
