@extends('layouts.app')

@section('titulo', 'Agregar traductor')

@section('contenido')

    <div class="tarjeta">
        <div class="tarjeta__cabecera">
            <div>
                <h1>Agregar traductor</h1>
                <p>Completa los datos del traductor. Los campos marcados con <span class="obligatorio">*</span> son obligatorios.</p>
            </div>

            <a href="{{ route('traductores.index') }}" class="btn btn--claro">&larr; Volver a traductores</a>
        </div>

        <div class="tarjeta__cuerpo">
            <form action="{{ route('traductores.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                @include('traductores._campos', ['traductor' => null])

                <div class="pie-formulario">
                    <button type="submit" class="btn btn--primario">Guardar traductor</button>
                    <a href="{{ route('traductores.index') }}" class="btn btn--claro">Cancelar</a>
                </div>
            </form>
        </div>
    </div>

@endsection
