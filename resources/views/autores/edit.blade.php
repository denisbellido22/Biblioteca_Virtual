@extends('layouts.app')

@section('titulo', 'Editar autor')

@section('contenido')

    <div class="tarjeta">
        <div class="tarjeta__cabecera">
            <div>
                <h1>Editar autor</h1>
                <p>Actualizando el registro #{{ $autor->ID_autores }}. Los campos marcados con <span class="obligatorio">*</span> son obligatorios.</p>
            </div>

            <a href="{{ route('autores.index') }}" class="btn btn--claro">&larr; Volver a autores</a>
        </div>

        <div class="tarjeta__cuerpo">
            <form action="{{ route('autores.update', $autor) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                @include('autores._campos', ['autor' => $autor])

                <div class="pie-formulario">
                    <button type="submit" class="btn btn--primario">Guardar cambios</button>
                    <a href="{{ route('autores.index') }}" class="btn btn--claro">Cancelar</a>
                </div>
            </form>
        </div>
    </div>

@endsection
