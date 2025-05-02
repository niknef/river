<?php

namespace App\Http\Controllers;
use App\Models\Noticia;
use App\Models\Articulos;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $noticias = Noticia::latest()->take(3)->get();
        $productosDestacados = Articulos::inRandomOrder()->take(3)->get();
        return view('home', compact('noticias', 'productosDestacados'));
    }

    /* public function __invoke() {
        return view('welcome');
    } */
}
