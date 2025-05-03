<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;
use App\Models\Talles;
use App\Models\Categorias;
use App\Models\User;
use App\Models\Mensaje;
use App\Models\Noticia;

class AdminController extends Controller
{
    public function index()
    {
        $allArticulos = Articulo::with(['talles', 'categorias'])->get();
        $talles = Talles::all();
        $categorias = Categorias::all();
        $usuarios = User::all();
        $mensajes = Mensaje::orderBy('fecha_envio', 'desc')->get();
        $noticias = Noticia::all();

        return view('admin.index', [
            'articulos' => $allArticulos,
            'talles' => $talles,
            'categorias' => $categorias,
            'usuarios' => $usuarios,
            'mensajes' => $mensajes,
            'noticias' => $noticias,
        ]);
    }

    public function mostrarSeccion($seccion)
    {
        $articulos = Articulo::with(['talles', 'categorias'])->get();
        $talles = Talles::all();
        $categorias = Categorias::all();
        $usuarios = User::all();
        $mensajes = Mensaje::orderBy('fecha_envio', 'desc')->get();
        $noticias = Noticia::all();
        
    

        return view("admin.secciones.$seccion", compact('articulos', 'talles', 'categorias', 'usuarios', 'mensajes','noticias' ));
    }
}
