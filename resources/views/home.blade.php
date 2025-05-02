@extends('layout.app')

@section('title', 'Inicio')

@section('carrousel')
    @include('components.carousel')
@endsection

@section('content')
    @include('components.about')
    @include('components.valores')
    @include('components.productos-home')
    @include('components.river-id')
    @include('components.noticias')
@endsection
