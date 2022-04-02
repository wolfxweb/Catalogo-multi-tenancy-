@extends('layouts.app')
@section('content')
    @component('components.container')
        @component('components.card', [
            'titulo' => $titulo,
            'classCard' => $classCard,
            'color' => $color,
            ])
            {{$slot}}
        @endcomponent
    @endcomponent
 @endsection
