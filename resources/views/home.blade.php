@extends('layouts.app')

@section('titulo', 'Inicio')

@section('contenido')

    <section class="portada">
        <h1>Biblioteca Virtual</h1>
        <p>
            Sistema de gestión de autores, editores, traductores y libros.
            Administra los registros, sus imágenes y las relaciones entre ellos.
        </p>
    </section>

    <section class="estadisticas">
        <a href="{{ route('autores.index') }}" class="estadistica">
            <span class="estadistica__etiqueta">Total de autores</span>
            <span class="estadistica__valor">{{ $totalAutores }}</span>
        </a>

        <a href="{{ route('editores.index') }}" class="estadistica">
            <span class="estadistica__etiqueta">Total de editores</span>
            <span class="estadistica__valor">{{ $totalEditores }}</span>
        </a>

        <a href="{{ route('traductores.index') }}" class="estadistica">
            <span class="estadistica__etiqueta">Total de traductores</span>
            <span class="estadistica__valor">{{ $totalTraductores }}</span>
        </a>

        <a href="{{ route('libros.index') }}" class="estadistica">
            <span class="estadistica__etiqueta">Total de libros</span>
            <span class="estadistica__valor">{{ $totalLibros }}</span>
        </a>
    </section>

    <h2>Módulos del sistema</h2>

    <section class="accesos">
        <a href="{{ route('autores.index') }}" class="acceso">
            <span class="acceso__icono">&#9997;</span>
            <h3>Autores</h3>
            <p>Registra autores con sus datos de contacto, foto y libros asociados.</p>
        </a>

        <a href="{{ route('editores.index') }}" class="acceso">
            <span class="acceso__icono">&#127970;</span>
            <h3>Editores</h3>
            <p>Administra editoriales, países y los datos de cada editor.</p>
        </a>

        <a href="{{ route('traductores.index') }}" class="acceso">
            <span class="acceso__icono">&#127760;</span>
            <h3>Traductores</h3>
            <p>Controla idiomas nativos, idiomas de traducción y certificaciones.</p>
        </a>

        <a href="{{ route('libros.index') }}" class="acceso">
            <span class="acceso__icono">&#128214;</span>
            <h3>Libros</h3>
            <p>Relaciona cada libro con su autor, editor y traductor mediante listas.</p>
        </a>
    </section>

    <div class="grupo-botones" style="margin-top: 26px;">
        <a href="{{ route('libros.create') }}" class="btn btn--primario">+ Agregar libro</a>
        <a href="{{ route('autores.create') }}" class="btn btn--claro">+ Agregar autor</a>
        <a href="{{ route('editores.create') }}" class="btn btn--claro">+ Agregar editor</a>
        <a href="{{ route('traductores.create') }}" class="btn btn--claro">+ Agregar traductor</a>
    </div>

@endsection
