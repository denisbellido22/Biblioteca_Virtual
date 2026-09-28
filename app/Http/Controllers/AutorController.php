<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Models\Libro;
use App\Support\Imagen;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    /** Carpeta pública donde se guardan las imágenes de este módulo. */
    private const CARPETA = 'autores';

    /** Reglas de validación compartidas por store() y update(). */
    private function reglas(): array
    {
        return [
            'Nombre' => 'required|string|max:50',
            'Apellidos' => 'required|string|max:50',
            'telefono' => 'required|numeric|digits_between:7,14',
            'correo' => 'required|email|max:30',
            'img_autores' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ];
    }

    /** Listado con búsqueda por nombre y apellido. */
    public function index(Request $request)
    {
        $buscar = trim((string) $request->input('buscar'));

        $autores = Autor::query()
            ->when($buscar !== '', function ($query) use ($buscar) {
                $query->where(function ($sub) use ($buscar) {
                    $sub->where('Nombre', 'like', "%{$buscar}%")
                        ->orWhere('Apellidos', 'like', "%{$buscar}%");
                });
            })
            ->orderBy('ID_autores')
            ->get();

        return view('autores.index', compact('autores', 'buscar'));
    }

    /** Formulario para agregar un autor. */
    public function create()
    {
        return view('autores.create');
    }

    /** Guarda el autor nuevo (incluida la imagen subida desde el equipo). */
    public function store(Request $request)
    {
        $datos = $request->validate($this->reglas());

        $datos['img_autores'] = Imagen::guardar($request->file('img_autores'), self::CARPETA);

        Autor::create($datos);

        return redirect()
            ->route('autores.index')
            ->with('success', 'Autor agregado correctamente.');
    }

    /** Formulario para editar un autor. */
    public function edit(Autor $autor)
    {
        return view('autores.edit', compact('autor'));
    }

    /** Actualiza el autor, reemplazando la imagen anterior si se sube otra. */
    public function update(Request $request, Autor $autor)
    {
        $datos = $request->validate($this->reglas());

        if ($request->boolean('quitar_imagen') && ! $request->hasFile('img_autores')) {
            Imagen::eliminar($autor->img_autores);
            $datos['img_autores'] = null;
        } else {
            $datos['img_autores'] = Imagen::reemplazar(
                $request->file('img_autores'),
                self::CARPETA,
                $autor->img_autores
            );
        }

        $autor->update($datos);

        return redirect()
            ->route('autores.index')
            ->with('success', 'Autor actualizado correctamente.');
    }

    /** Elimina el autor (y su imagen) siempre que no tenga libros asociados. */
    public function destroy(Autor $autor)
    {
        $libros = Libro::where('ID_autor', $autor->ID_autores)->count();

        if ($libros > 0) {
            return redirect()
                ->route('autores.index')
                ->with('error', "No se puede eliminar \"{$autor->Nombre} {$autor->Apellidos}\" porque tiene {$libros} libro(s) asociado(s). Elimina o reasigna primero esos libros.");
        }

        Imagen::eliminar($autor->img_autores);
        $autor->delete();

        return redirect()
            ->route('autores.index')
            ->with('success', 'Autor eliminado correctamente.');
    }
}
