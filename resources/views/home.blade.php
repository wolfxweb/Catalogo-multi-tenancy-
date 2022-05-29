@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                @nivelUsuarioLogado('cliente')
                  @include('pages.adm.cliente.home')
                @endnivelUsuarioLogado
                @nivelUsuarioLogado('admin')
                      @include('pages.adm.loja.home')
                @endnivelUsuarioLogado
                @nivelUsuarioLogado('master')
                 @include('pages.adm.adm.home')
                @endnivelUsuarioLogado
            </div>
        </div>
    </div>
</div>
@endsection
