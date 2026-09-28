@extends('layouts.app')

@section('titulo', 'Agregar libro')

@section('contenido')

    <div class="tarjeta">
        <div class="tarjeta__cabecera">
            <div>
                <h1>Agregar libro</h1>
                <p>Selecciona el autor, el editor y el traductor desde las listas. Los campos marcados con <span class="obligatorio">*</span> son obligatorios.</p>
            </div>

            <a href="{{ route('libros.index') }}" class="btn btn--claro">&larr; Volver a libros</a>
        </div>

        <div class="tarjeta__cuerpo">
            <form action="{{ route('libros.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                @include('libros._campos', [
                    'libro' => null,
                    'autores' => $autores,
                    'editores' => $editores,
                    'traductores' => $traductores,
                ])

                <div class="pie-formulario">
                    <button type="submit" class="btn btn--primario">Guardar libro</button>
                    <a href="{{ route('libros.index') }}" class="btn btn--claro">Cancelar</a>
                </div>
            </form>
        </div>
    </div>

@endsection
