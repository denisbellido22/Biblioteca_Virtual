<?php

namespace App\Http\Controllers;

use App\Models\Editor;
use App\Models\Libro;
use App\Support\Imagen;
use Illuminate\Http\Request;

class EditorController extends Controller
{
    /** Carpeta pública donde se guardan las imágenes de este módulo. */
    private const CARPETA = 'editores';

    /** Reglas de validación compartidas por store() y update(). */
    private function reglas(): array
    {
        return [
            'Nombre' => 'required|string|max:50',
            'Apellidos' => 'required|string|max:50',
            'nombre_editorial' => 'nullable|string|max:70',
            'pais' => 'nullable|string|max:100',
            'img_editores' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ];
    }

    /** Listado con búsqueda por nombre, apellido, editorial y país. */
    public function index(Request $request)
    {
        $buscar = trim((string) $request->input('buscar'));

        $editores = Editor::query()
            ->when($buscar !== '', function ($query) use ($buscar) {
                $query->where(function ($sub) use ($buscar) {
                    $sub->where('Nombre', 'like', "%{$buscar}%")
                        ->orWhere('Apellidos', 'like', "%{$buscar}%")
                        ->orWhere('nombre_editorial', 'like', "%{$buscar}%")
                        ->orWhere('pais', 'like', "%{$buscar}%");
                });
            })
            ->orderBy('ID_editores')
            ->get();

        return view('editores.index', compact('editores', 'buscar'));
    }

    /** Formulario para agregar un editor. */
    public function create()
    {
        return view('editores.create');
    }

    /** Guarda el editor nuevo (incluida la imagen subida desde el equipo). */
    public function store(Request $request)
    {
        $datos = $request->validate($this->reglas());

        $datos['img_editores'] = Imagen::guardar($request->file('img_editores'), self::CARPETA);

        Editor::create($datos);

        return redirect()
            ->route('editores.index')
            ->with('success', 'Editor agregado correctamente.');
    }

    /** Formulario para editar un editor. */
    public function edit(Editor $editor)
    {
        return view('editores.edit', compact('editor'));
    }

    /** Actualiza el editor, reemplazando la imagen anterior si se sube otra. */
    public function update(Request $request, Editor $editor)
    {
        $datos = $request->validate($this->reglas());

        if ($request->boolean('quitar_imagen') && ! $request->hasFile('img_editores')) {
            Imagen::eliminar($editor->img_editores);
            $datos['img_editores'] = null;
        } else {
            $datos['img_editores'] = Imagen::reemplazar(
                $request->file('img_editores'),
                self::CARPETA,
                $editor->img_editores
            );
        }

        $editor->update($datos);

        return redirect()
            ->route('editores.index')
            ->with('success', 'Editor actualizado correctamente.');
    }

    /** Elimina el editor (y su imagen) siempre que no tenga libros asociados. */
    public function destroy(Editor $editor)
    {
        $libros = Libro::where('ID_editor', $editor->ID_editores)->count();

        if ($libros > 0) {
            return redirect()
                ->route('editores.index')
                ->with('error', "No se puede eliminar \"{$editor->Nombre} {$editor->Apellidos}\" porque tiene {$libros} libro(s) asociado(s). Elimina o reasigna primero esos libros.");
        }

        Imagen::eliminar($editor->img_editores);
        $editor->delete();

        return redirect()
            ->route('editores.index')
            ->with('success', 'Editor eliminado correctamente.');
    }
}
