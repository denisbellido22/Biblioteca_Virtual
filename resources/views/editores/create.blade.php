@extends('layouts.app')

@section('titulo', 'Agregar editor')

@section('contenido')

    <div class="tarjeta">
        <div class="tarjeta__cabecera">
            <div>
                <h1>Agregar editor</h1>
                <p>Completa los datos del editor. Los campos marcados con <span class="obligatorio">*</span> son obligatorios.</p>
            </div>

            <a href="{{ route('editores.index') }}" class="btn btn--claro">&larr; Volver a editores</a>
        </div>

        <div class="tarjeta__cuerpo">
            <form action="{{ route('editores.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                @include('editores._campos', ['editor' => null])

                <div class="pie-formulario">
                    <button type="submit" class="btn btn--primario">Guardar editor</button>
                    <a href="{{ route('editores.index') }}" class="btn btn--claro">Cancelar</a>
                </div>
            </form>
        </div>
    </div>

@endsection
