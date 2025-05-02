@extends('admin.index')

@section('admin-section')
<div class="container mt-4">
    <h3 class="mt-4">Listado de Usuarios</h3>
    <div class="table-responsive">
        <table class="table table-bordered mt-2 equal-width-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->id }}</td>
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->role }}</td>
                    <td>
                        <div class="d-flex justify-content-center gap-3">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verComprasModal{{ $usuario->id }}">
                                Ver Compras
                            </button>
                        </div>
                    </td>
                </tr>   
                @include('partials.compras.ver-modal', ['usuario' => $usuario])  
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection