@extends('layouts.app')

@section('titulo', 'Editar traductor')

@section('contenido')

    <div class="tarjeta">
        <div class="tarjeta__cabecera">
            <div>
                <h1>Editar traductor</h1>
                <p>Actualizando el registro #{{ $traductor->ID_traductores }}. Los campos marcados con <span class="obligatorio">*</span> son obligatorios.</p>
            </div>

            <a href="{{ route('traductores.index') }}" class="btn btn--claro">&larr; Volver a traductores</a>
        </div>

        <div class="tarjeta__cuerpo">
            <form action="{{ route('traductores.update', $traductor) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                @include('traductores._campos', ['traductor' => $traductor])

                <div class="pie-formulario">
                    <button type="submit" class="btn btn--primario">Guardar cambios</button>
                    <a href="{{ route('traductores.index') }}" class="btn btn--claro">Cancelar</a>
                </div>
            </form>
        </div>
    </div>

@endsection
