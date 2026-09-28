@extends('layouts.app')

@section('titulo', 'Autores')

@section('contenido')

    <div class="tarjeta">
        <div class="tarjeta__cabecera">
            <div>
                <h1>Autores</h1>
                <p>
                    {{ $autores->count() }} registro(s)
                    @if ($buscar !== '')
                        para la búsqueda &laquo;{{ $buscar }}&raquo;
                    @else
                        en total
                    @endif
                </p>
            </div>

            <a href="{{ route('autores.create') }}" class="btn btn--primario">+ Agregar autor</a>
        </div>

        <div class="tarjeta__cuerpo">
            @include('partials.buscador', [
                'ruta' => route('autores.index'),
                'buscar' => $buscar,
                'placeholder' => 'Buscar por nombre o apellido...',
            ])
        </div>

        <div class="tabla-contenedor">
            <table class="tabla">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($autores as $autor)
                        <tr>
                            <td class="tabla__id">{{ $autor->ID_autores }}</td>

                            <td>
                                <x-imagen :ruta="$autor->img_autores" :alt="'Autor '.$autor->Nombre" />
                            </td>

                            <td class="tabla__principal">{{ $autor->Nombre }}</td>
                            <td>{{ $autor->Apellidos }}</td>
                            <td>{{ $autor->telefono }}</td>
                            <td>{{ $autor->correo }}</td>

                            <td>
                                <div class="acciones-fila">
                                    <a href="{{ route('autores.edit', $autor) }}" class="btn btn--aviso btn--sm">
                                        Editar
                                    </a>

                                    <form
                                        action="{{ route('autores.destroy', $autor) }}"
                                        method="POST"
                                        class="en-linea"
                                        data-confirm="¿Está seguro de eliminar el autor {{ $autor->Nombre }} {{ $autor->Apellidos }}? Esta acción no se puede deshacer."
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
                            <td colspan="7" class="tabla__vacio">
                                No se encontraron autores
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
