@extends('layouts.app')

@section('titulo', 'Editores')

@section('contenido')

    <div class="tarjeta">
        <div class="tarjeta__cabecera">
            <div>
                <h1>Editores</h1>
                <p>
                    {{ $editores->count() }} registro(s)
                    @if ($buscar !== '')
                        para la búsqueda &laquo;{{ $buscar }}&raquo;
                    @else
                        en total
                    @endif
                </p>
            </div>

            <a href="{{ route('editores.create') }}" class="btn btn--primario">+ Agregar editor</a>
        </div>

        <div class="tarjeta__cuerpo">
            @include('partials.buscador', [
                'ruta' => route('editores.index'),
                'buscar' => $buscar,
                'placeholder' => 'Buscar por nombre, apellido, editorial o país...',
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
                        <th>Editorial</th>
                        <th>País</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($editores as $editor)
                        <tr>
                            <td class="tabla__id">{{ $editor->ID_editores }}</td>

                            <td>
                                <x-imagen :ruta="$editor->img_editores" :alt="'Editor '.$editor->Nombre" />
                            </td>

                            <td class="tabla__principal">{{ $editor->Nombre }}</td>
                            <td>{{ $editor->Apellidos }}</td>
                            <td>{{ $editor->nombre_editorial ?: '—' }}</td>
                            <td>{{ $editor->pais ?: '—' }}</td>

                            <td>
                                <div class="acciones-fila">
                                    <a href="{{ route('editores.edit', $editor) }}" class="btn btn--aviso btn--sm">
                                        Editar
                                    </a>

                                    <form
                                        action="{{ route('editores.destroy', $editor) }}"
                                        method="POST"
                                        class="en-linea"
                                        data-confirm="¿Está seguro de eliminar el editor {{ $editor->Nombre }} {{ $editor->Apellidos }}? Esta acción no se puede deshacer."
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
                                No se encontraron editores
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
