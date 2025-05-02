<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulos;
use App\Models\Talles;
use App\Models\Categorias;



class ArticulosController extends Controller
{
    /* public function index() {
        $allArticulos = Articulos::with(['talles', 'categorias'])->get();
        $talles = Talles::all();
        $categorias = Categorias::all();
        return view('articulos.index',[
            'articulos' => $allArticulos,
            'talles' => $talles,
            'categorias' => $categorias
        ]); 

    }*/

    public function index(Request $request)
    {
        $query = Articulos::with(['talles', 'categorias']);

        // Filtro por categoría
        if ($request->filled('categoria')) {
            $query->whereHas('categorias', function ($q) use ($request) {
                $q->where('categoria', $request->categoria);
            });
        }

        // Filtro por talle
        if ($request->filled('talle')) {
            $query->whereHas('talles', function ($q) use ($request) {
                $q->where('talle', $request->talle);
            });
        }

        // Filtro por precio máximo
        if ($request->filled('precio')) {
            $query->where('precio', '<=', $request->precio);
        }

        $filteredArticulos = $query->get();
        $talles = Talles::all();
        $categorias = Categorias::all();

        return view('articulos.index', [
            'articulos' => $filteredArticulos,
            'talles' => $talles,
            'categorias' => $categorias,
    ]);
}

    public function detalle($id) {
        $articulo = Articulos::findOrFail($id);
        return view('articulos.detalle', compact('articulo'));
    }

    public function store(Request $request) {
        $input = $request->all();
        $articulo = new Articulos();
        $articulo->nombre = $input['nombre'];
        $articulo->descripcion = $input['descripcion'];
        $articulo->precio = $input['precio'];
        $articulo->talle_id = $input['talle_id'];
        // Manejo de imágenes
        if ($request->hasFile('imagen')) {
            $filename = time() . '_img.' . $request->imagen->extension();
            $request->imagen->move(public_path('images/productos/'), $filename);
            $articulo->imagen = $filename;
        } else {
            $articulo->imagen = $input['imagen'] ?? null;
        }
        
        if ($request->hasFile('imagen_hover')) {
            $filenameHover = time() . '_hover.' . $request->imagen_hover->extension();
            $request->imagen_hover->move(public_path('images/productos/'), $filenameHover);
            $articulo->imagen_hover = $filenameHover;
        } else {
            $articulo->imagen_hover = $input['imagen_hover'] ?? null;
        }

        $articulo->fecha_creacion = $input['fecha_creacion'];
        $articulo->categoria_id = $input['categoria_id'];
        $articulo->cantidad = $input['cantidad'];
 
        $articulo->save();

        return redirect()
            ->route('admin.section', ['seccion' => 'articulos'])
            ->with('feedback.message', 'Producto agregado correctamente.')
            ->with('feedback.type', 'success');
    }

    public function destroy($id) {
        $articulo = Articulos::findOrFail($id);
        $articulo->delete();
        if ($articulo->imagen && file_exists(public_path('images/productos/' . $articulo->imagen))) {
            unlink(public_path('images/productos/' . $articulo->imagen));
        }
        if ($articulo->imagen_hover && file_exists(public_path('images/productos/' . $articulo->imagen_hover))) {
            unlink(public_path('images/productos/' . $articulo->imagen_hover));
        }
        return redirect()
            ->route('admin.section', ['seccion' => 'articulos'])
            ->with('feedback.message', 'Articulo eliminado correctamente')
            ->with('feedback.type', 'success');
    }

    public function update(Request $request, $id)
    {
        $articulo = Articulos::findOrFail($id);

        // Asignación manual de campos
        $articulo->nombre = $request->input('nombre');
        $articulo->descripcion = $request->input('descripcion');
        $articulo->precio = $request->input('precio');
        $articulo->talle_id = $request->input('talle_id');
        $articulo->categoria_id = $request->input('categoria_id');
        $articulo->cantidad = $request->input('cantidad');
        $articulo->fecha_creacion = $request->input('fecha_creacion');

        // Imagen principal
        if ($request->hasFile('imagen')) {
            if ($articulo->imagen && file_exists(public_path('images/productos/' . $articulo->imagen))) {
                unlink(public_path('images/productos/' . $articulo->imagen));
            }

            $filename = time() . '_img.' . $request->imagen->extension();
            $request->imagen->move(public_path('images/productos/'), $filename);
            $articulo->imagen = $filename;
        }

        // Imagen hover
        if ($request->hasFile('imagen_hover')) {
            if ($articulo->imagen_hover && file_exists(public_path('images/productos/' . $articulo->imagen_hover))) {
                unlink(public_path('images/productos/' . $articulo->imagen_hover));
            }

            $filenameHover = time() . '_hover.' . $request->imagen_hover->extension();
            $request->imagen_hover->move(public_path('images/productos/'), $filenameHover);
            $articulo->imagen_hover = $filenameHover;
        }

        $articulo->save();

        return redirect()
            ->route('admin.section', ['seccion' => 'articulos'])
            ->with('feedback.message', 'Producto actualizado correctamente.')
            ->with('feedback.type', 'success');
    }

}