@extends('layouts.app')

@section('titulo', 'Agregar autor')

@section('contenido')

    <div class="tarjeta">
        <div class="tarjeta__cabecera">
            <div>
                <h1>Agregar autor</h1>
                <p>Completa los datos del autor. Los campos marcados con <span class="obligatorio">*</span> son obligatorios.</p>
            </div>

            <a href="{{ route('autores.index') }}" class="btn btn--claro">&larr; Volver a autores</a>
        </div>

        <div class="tarjeta__cuerpo">
            <form action="{{ route('autores.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                @include('autores._campos', ['autor' => null])

                <div class="pie-formulario">
                    <button type="submit" class="btn btn--primario">Guardar autor</button>
                    <a href="{{ route('autores.index') }}" class="btn btn--claro">Cancelar</a>
                </div>
            </form>
        </div>
    </div>

@endsection
