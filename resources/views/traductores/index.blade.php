@extends('layouts.app')

@section('titulo', 'Traductores')

@section('contenido')

    <div class="tarjeta">
        <div class="tarjeta__cabecera">
            <div>
                <h1>Traductores</h1>
                <p>
                    {{ $traductores->count() }} registro(s)
                    @if ($buscar !== '')
                        para la búsqueda &laquo;{{ $buscar }}&raquo;
                    @else
                        en total
                    @endif
                </p>
            </div>

            <a href="{{ route('traductores.create') }}" class="btn btn--primario">+ Agregar traductor</a>
        </div>

        <div class="tarjeta__cuerpo">
            @include('partials.buscador', [
                'ruta' => route('traductores.index'),
                'buscar' => $buscar,
                'placeholder' => 'Buscar por nombre, apellido o idioma...',
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
                        <th>Idioma nativo</th>
                        <th>Idiomas de traducción</th>
                        <th>Certificaciones</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($traductores as $traductor)
                        <tr>
                            <td class="tabla__id">{{ $traductor->ID_traductores }}</td>

                            <td>
                                <x-imagen :ruta="$traductor->img_traductores" :alt="'Traductor '.$traductor->Nombre" />
                            </td>

                            <td class="tabla__principal">{{ $traductor->Nombre }}</td>
                            <td>{{ $traductor->Apellidos }}</td>
                            <td>{{ $traductor->idioma_nativo ?: '—' }}</td>
                            <td>{{ $traductor->idiomas_traduccion ?: '—' }}</td>
                            <td>
                                @if ($traductor->certificaciones !== null)
                                    <span class="etiqueta">{{ $traductor->certificaciones }}</span>
                                @else
                                    <span class="etiqueta etiqueta--gris">Sin dato</span>
                                @endif
                            </td>

                            <td>
                                <div class="acciones-fila">
                                    <a href="{{ route('traductores.edit', $traductor) }}" class="btn btn--aviso btn--sm">
                                        Editar
                                    </a>

                                    <form
                                        action="{{ route('traductores.destroy', $traductor) }}"
                                        method="POST"
                                        class="en-linea"
                                        data-confirm="¿Está seguro de eliminar el traductor {{ $traductor->Nombre }} {{ $traductor->Apellidos }}? Esta acción no se puede deshacer."
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
                            <td colspan="8" class="tabla__vacio">
                                No se encontraron traductores
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
