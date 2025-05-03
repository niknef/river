<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function store(Request $request) {
        $input = $request->all();
        $categoria = new Categoria();
        $categoria->categoria = $input['nombre'];
        $categoria->save();
        return redirect()
            ->route('admin.section', ['seccion' => 'categorias'])
            ->with('feedback.message', 'Categoría creada correctamente')
            ->with('feedback.type', 'success');
    }

    public function destroy($id) {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();
        return redirect()
            ->route('admin.section', ['seccion' => 'categorias'])
            ->with('feedback.message', 'Categoría eliminada correctamente')
            ->with('feedback.type', 'success');
    }

    public function update(Request $request, $id) {
        $categoria = Categoria::findOrFail($id);
        $categoria->categoria = $request->input('nombre');
        $categoria->save();
        return redirect()
            ->route('admin.section', ['seccion' => 'categorias'])
            ->with('feedback.message', 'Categoría actualizada correctamente')
            ->with('feedback.type', 'success');
    }
}
