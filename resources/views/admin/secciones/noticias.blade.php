@extends('admin.index')

@section('admin-section')
<div class="container mt-4">
    <h3 class="mt-4">Listado de Noticias</h3>

    <div class="modal-footer d-flex justify-content-center mt-4">
        <a href="{{ route('admin.noticias.create') }}" class="btn btn-success mb-3">Agregar Noticia</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered mt-2 equal-width-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Contenido</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($noticias as $noticia)
                    <tr>
                        <td>{{ $noticia->id }}</td>
                        <td>{{ $noticia->titulo }}</td>
                        <td>{{ Str::limit($noticia->contenido, 100) }}</td>
                        <td>
                            @if ($noticia->imagen)
                                <img src="{{ asset('images/' . $noticia->imagen) }}" alt="Imagen" width="100">
                            @else
                                Sin imagen
                            @endif
                        </td>
                        <td>
                            <div class="d-flex justify-content-center gap-3">
                                <a href="{{ route('admin.noticias.edit', $noticia) }}" class="btn btn-warning">Editar</a>

                                <form action="{{ route('admin.noticias.destroy', $noticia) }}" method="POST" onsubmit="return confirm('¿Estás seguro que querés eliminar esta noticia?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Eliminar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
