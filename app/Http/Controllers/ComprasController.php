<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compras;
use App\Models\Articulos;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ComprasController extends Controller
{
    public function store($articulo_id)
    {
        Compras::create([
            'user_id' => Auth::id(),
            'articulo_id' => $articulo_id,
        ]);

        // Agregar el mensaje de éxito a la sesión
        session()->flash('feedback.message', 'Compra completada');
        session()->flash('feedback.type', 'success');

        // Volver a la misma vista
        return back();
    }
}
