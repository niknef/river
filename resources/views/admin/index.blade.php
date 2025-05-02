@extends('layout.app')
@section('title', 'Panel de Administrador')

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">Panel de Administrador</h2>

    @if (request()->routeIs('admin.index'))
        {{-- Vista de botones grandes estilo tarjetas --}}
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <a href="{{ route('admin.section', ['seccion' => 'articulos']) }}" class="btn btn-primary w-100 p-4 text-white fs-5">🛒 Artículos</a>
            </div>
            <div class="col">
                <a href="{{ route('admin.section', ['seccion' => 'talles']) }}" class="btn btn-secondary w-100 p-4 text-white fs-5">📏 Talles</a>
            </div>
            <div class="col">
                <a href="{{ route('admin.section', ['seccion' => 'categorias']) }}" class="btn btn-info w-100 p-4 text-white fs-5">📂 Categorías</a>
            </div>
            <div class="col">
                <a href="{{ route('admin.section', ['seccion' => 'usuarios']) }}" class="btn btn-warning w-100 p-4 text-white fs-5">👤 Usuarios</a>
            </div>
            <div class="col">
                <a href="{{ route('admin.section', ['seccion' => 'mensajes']) }}" class="btn btn-danger w-100 p-4 text-white fs-5">✉️ Mensajes</a>
            </div>
            <div class="col">
                <a href="{{ route('admin.section', ['seccion' => 'noticias']) }}" class="btn btn-dark w-100 p-4 text-white fs-5">📰 Noticias</a>
            </div>
        </div>
    @else
        {{-- Si hay una sección activa, mostrar los botones normales --}}
        <div class="d-flex justify-content-center gap-2 my-4">
            <a href="{{ route('admin.section', ['seccion' => 'articulos']) }}" class="btn btn-primary">Artículos</a>
            <a href="{{ route('admin.section', ['seccion' => 'talles']) }}" class="btn btn-secondary">Talles</a>
            <a href="{{ route('admin.section', ['seccion' => 'categorias']) }}" class="btn btn-info">Categorías</a>
            <a href="{{ route('admin.section', ['seccion' => 'usuarios']) }}" class="btn btn-warning">Usuarios</a>
            <a href="{{ route('admin.section', ['seccion' => 'mensajes']) }}" class="btn btn-danger">Mensajes</a>
            <a href="{{ route('admin.section', ['seccion' => 'noticias']) }}" class="btn btn-dark">Noticias</a>
        </div>
    @endif

    @yield('admin-section')
</div>
@endsection
