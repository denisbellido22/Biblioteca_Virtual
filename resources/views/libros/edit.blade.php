@extends('layouts.app')

@section('titulo', 'Editar libro')

@section('contenido')

    <div class="tarjeta">
        <div class="tarjeta__cabecera">
            <div>
                <h1>Editar libro</h1>
                <p>Actualizando el registro #{{ $libro->ID_libro }}. Los campos marcados con <span class="obligatorio">*</span> son obligatorios.</p>
            </div>

            <a href="{{ route('libros.index') }}" class="btn btn--claro">&larr; Volver a libros</a>
        </div>

        <div class="tarjeta__cuerpo">
            <form action="{{ route('libros.update', $libro) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                @include('libros._campos', [
                    'libro' => $libro,
                    'autores' => $autores,
                    'editores' => $editores,
                    'traductores' => $traductores,
                ])

                <div class="pie-formulario">
                    <button type="submit" class="btn btn--primario">Guardar cambios</button>
                    <a href="{{ route('libros.index') }}" class="btn btn--claro">Cancelar</a>
                </div>
            </form>
        </div>
    </div>

@endsection
