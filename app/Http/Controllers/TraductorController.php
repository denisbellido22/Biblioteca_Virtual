<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\Traductor;
use App\Support\Imagen;
use Illuminate\Http\Request;

class TraductorController extends Controller
{
    /** Carpeta pública donde se guardan las imágenes de este módulo. */
    private const CARPETA = 'traductores';

    /** Reglas de validación compartidas por store() y update(). */
    private function reglas(): array
    {
        return [
            'Nombre' => 'required|string|max:50',
            'Apellidos' => 'required|string|max:50',
            'idioma_nativo' => 'nullable|string|max:30',
            'idiomas_traduccion' => 'nullable|string|max:50',
            // En la base de datos la columna certificaciones es INT.
            'certificaciones' => 'nullable|integer|min:0|max:2147483647',
            'img_traductores' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ];
    }

    /** Listado con búsqueda por nombre, apellido e idioma. */
    public function index(Request $request)
    {
        $buscar = trim((string) $request->input('buscar'));

        $traductores = Traductor::query()
            ->when($buscar !== '', function ($query) use ($buscar) {
                $query->where(function ($sub) use ($buscar) {
                    $sub->where('Nombre', 'like', "%{$buscar}%")
                        ->orWhere('Apellidos', 'like', "%{$buscar}%")
                        ->orWhere('idioma_nativo', 'like', "%{$buscar}%")
                        ->orWhere('idiomas_traduccion', 'like', "%{$buscar}%");
                });
            })
            ->orderBy('ID_traductores')
            ->get();

        return view('traductores.index', compact('traductores', 'buscar'));
    }

    /** Formulario para agregar un traductor. */
    public function create()
    {
        return view('traductores.create');
    }

    /** Guarda el traductor nuevo (incluida la imagen subida desde el equipo). */
    public function store(Request $request)
    {
        $datos = $request->validate($this->reglas());

        $datos['img_traductores'] = Imagen::guardar($request->file('img_traductores'), self::CARPETA);

        Traductor::create($datos);

        return redirect()
            ->route('traductores.index')
            ->with('success', 'Traductor agregado correctamente.');
    }

    /** Formulario para editar un traductor. */
    public function edit(Traductor $traductor)
    {
        return view('traductores.edit', compact('traductor'));
    }

    /** Actualiza el traductor, reemplazando la imagen anterior si se sube otra. */
    public function update(Request $request, Traductor $traductor)
    {
        $datos = $request->validate($this->reglas());

        if ($request->boolean('quitar_imagen') && ! $request->hasFile('img_traductores')) {
            Imagen::eliminar($traductor->img_traductores);
            $datos['img_traductores'] = null;
        } else {
            $datos['img_traductores'] = Imagen::reemplazar(
                $request->file('img_traductores'),
                self::CARPETA,
                $traductor->img_traductores
            );
        }

        $traductor->update($datos);

        return redirect()
            ->route('traductores.index')
            ->with('success', 'Traductor actualizado correctamente.');
    }

    /** Elimina el traductor (y su imagen) siempre que no tenga libros asociados. */
    public function destroy(Traductor $traductor)
    {
        $libros = Libro::where('ID_traductor', $traductor->ID_traductores)->count();

        if ($libros > 0) {
            return redirect()
                ->route('traductores.index')
                ->with('error', "No se puede eliminar \"{$traductor->Nombre} {$traductor->Apellidos}\" porque tiene {$libros} libro(s) asociado(s). Elimina o reasigna primero esos libros.");
        }

        Imagen::eliminar($traductor->img_traductores);
        $traductor->delete();

        return redirect()
            ->route('traductores.index')
            ->with('success', 'Traductor eliminado correctamente.');
    }
}
