<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Models\Editor;
use App\Models\Libro;
use App\Models\Traductor;
use App\Support\Imagen;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    /** Carpeta pública donde se guardan las imágenes de este módulo. */
    private const CARPETA = 'libros';

    /** Reglas de validación compartidas por store() y update(). */
    private function reglas(): array
    {
        return [
            'Titulo' => 'required|string|max:45',
            'Tipo' => 'nullable|string|max:45',
            'genero' => 'nullable|string|max:50',
            // Se valida que los IDs seleccionados existan realmente en la base de datos.
            'ID_autor' => 'required|integer|exists:autores,ID_autores',
            'ID_editor' => 'nullable|integer|exists:editores,ID_editores',
            'ID_traductor' => 'nullable|integer|exists:traductores,ID_traductores',
            'img_libros' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ];
    }

    /** Datos para los <select> del formulario (nombres completos, no IDs escritos). */
    private function opciones(): array
    {
        return [
            'autores' => Autor::orderBy('Nombre')->orderBy('Apellidos')->get(),
            'editores' => Editor::orderBy('Nombre')->orderBy('Apellidos')->get(),
            'traductores' => Traductor::orderBy('Nombre')->orderBy('Apellidos')->get(),
        ];
    }

    /** Listado con búsqueda por título, tipo y género, mostrando los nombres reales. */
    public function index(Request $request)
    {
        $buscar = trim((string) $request->input('buscar'));

        $libros = Libro::with(['autor', 'editor', 'traductor'])
            ->when($buscar !== '', function ($query) use ($buscar) {
                $query->where(function ($sub) use ($buscar) {
                    $sub->where('Titulo', 'like', "%{$buscar}%")
                        ->orWhere('Tipo', 'like', "%{$buscar}%")
                        ->orWhere('genero', 'like', "%{$buscar}%");
                });
            })
            ->orderBy('ID_libro')
            ->get();

        return view('libros.index', compact('libros', 'buscar'));
    }

    /** Formulario para agregar un libro (con selects de autor, editor y traductor). */
    public function create()
    {
        return view('libros.create', $this->opciones());
    }

    /** Guarda el libro nuevo (incluida la imagen subida desde el equipo). */
    public function store(Request $request)
    {
        $datos = $request->validate($this->reglas());

        $datos['img_libros'] = Imagen::guardar($request->file('img_libros'), self::CARPETA);

        Libro::create($datos);

        return redirect()
            ->route('libros.index')
            ->with('success', 'Libro agregado correctamente.');
    }

    /** Formulario para editar un libro. */
    public function edit(Libro $libro)
    {
        return view('libros.edit', array_merge(['libro' => $libro], $this->opciones()));
    }

    /** Actualiza el libro, reemplazando la imagen anterior si se sube otra. */
    public function update(Request $request, Libro $libro)
    {
        $datos = $request->validate($this->reglas());

        if ($request->boolean('quitar_imagen') && ! $request->hasFile('img_libros')) {
            Imagen::eliminar($libro->img_libros);
            $datos['img_libros'] = null;
        } else {
            $datos['img_libros'] = Imagen::reemplazar(
                $request->file('img_libros'),
                self::CARPETA,
                $libro->img_libros
            );
        }

        $libro->update($datos);

        return redirect()
            ->route('libros.index')
            ->with('success', 'Libro actualizado correctamente.');
    }

    /** Elimina el libro (y su imagen). */
    public function destroy(Libro $libro)
    {
        Imagen::eliminar($libro->img_libros);
        $libro->delete();

        return redirect()
            ->route('libros.index')
            ->with('success', 'Libro eliminado correctamente.');
    }
}
