@extends('layouts.app')

@section('titulo', 'Libros')

@section('contenido')

    <div class="tarjeta">
        <div class="tarjeta__cabecera">
            <div>
                <h1>Libros</h1>
                <p>
                    {{ $libros->count() }} registro(s)
                    @if ($buscar !== '')
                        para la búsqueda &laquo;{{ $buscar }}&raquo;
                    @else
                        en total
                    @endif
                </p>
            </div>

            <a href="{{ route('libros.create') }}" class="btn btn--primario">+ Agregar libro</a>
        </div>

        <div class="tarjeta__cuerpo">
            @include('partials.buscador', [
                'ruta' => route('libros.index'),
                'buscar' => $buscar,
                'placeholder' => 'Buscar por título, tipo o género...',
            ])
        </div>

        <div class="tabla-contenedor">
            <table class="tabla">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Imagen</th>
                        <th>Título</th>
                        <th>Tipo</th>
                        <th>Autor</th>
                        <th>Editor</th>
                        <th>Traductor</th>
                        <th>Género</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($libros as $libro)
                        <tr>
                            <td class="tabla__id">{{ $libro->ID_libro }}</td>

                            <td>
                                <x-imagen
                                    :ruta="$libro->img_libros"
                                    :alt="'Libro '.$libro->Titulo"
                                    class="miniatura--libro"
                                />
                            </td>

                            <td class="tabla__principal">{{ $libro->Titulo }}</td>
                            <td>{{ $libro->Tipo ?: '—' }}</td>

                            <td>
                                @if ($libro->autor)
                                    {{ $libro->autor->Nombre }} {{ $libro->autor->Apellidos }}
                                @else
                                    <span class="etiqueta etiqueta--gris">Sin asignar</span>
                                @endif
                            </td>

                            <td>
                                @if ($libro->editor)
                                    {{ $libro->editor->Nombre }} {{ $libro->editor->Apellidos }}
                                @else
                                    <span class="etiqueta etiqueta--gris">Sin asignar</span>
                                @endif
                            </td>

                            <td>
                                @if ($libro->traductor)
                                    {{ $libro->traductor->Nombre }} {{ $libro->traductor->Apellidos }}
                                @else
                                    <span class="etiqueta etiqueta--gris">Sin asignar</span>
                                @endif
                            </td>

                            <td>{{ $libro->genero ?: '—' }}</td>

                            <td>
                                <div class="acciones-fila">
                                    <a href="{{ route('libros.edit', $libro) }}" class="btn btn--aviso btn--sm">
                                        Editar
                                    </a>

                                    <form
                                        action="{{ route('libros.destroy', $libro) }}"
                                        method="POST"
                                        class="en-linea"
                                        data-confirm="¿Está seguro de eliminar el libro {{ $libro->Titulo }}? Esta acción no se puede deshacer."
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn--peligro btn--sm">Eliminar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="tabla__vacio">
                                No se encontraron libros
                                @if ($buscar !== '')
                                    con el criterio &laquo;{{ $buscar }}&raquo;
                                @endif
                                .
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="grupo-botones" style="margin-top: 20px;">
        <a href="{{ route('home') }}" class="btn btn--claro">&larr; Volver al inicio</a>
    </div>

@endsection
