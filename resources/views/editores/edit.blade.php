@extends('layouts.app')

@section('titulo', 'Editar editor')

@section('contenido')

    <div class="tarjeta">
        <div class="tarjeta__cabecera">
            <div>
                <h1>Editar editor</h1>
                <p>Actualizando el registro #{{ $editor->ID_editores }}. Los campos marcados con <span class="obligatorio">*</span> son obligatorios.</p>
            </div>

            <a href="{{ route('editores.index') }}" class="btn btn--claro">&larr; Volver a editores</a>
        </div>

        <div class="tarjeta__cuerpo">
            <form action="{{ route('editores.update', $editor) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                @include('editores._campos', ['editor' => $editor])

                <div class="pie-formulario">
                    <button type="submit" class="btn btn--primario">Guardar cambios</button>
                    <a href="{{ route('editores.index') }}" class="btn btn--claro">Cancelar</a>
                </div>
            </form>
        </div>
    </div>

@endsection
