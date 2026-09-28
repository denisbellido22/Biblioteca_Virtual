{{-- Campos del formulario de libros.
     Variables: $libro (null al crear), $autores, $editores, $traductores --}}

<div class="formulario">

    <div class="campo">
        <label for="Titulo">Título <span class="obligatorio">*</span></label>
        <input
            type="text"
            id="Titulo"
            name="Titulo"
            value="{{ old('Titulo', $libro?->Titulo) }}"
            maxlength="45"
            class="@error('Titulo') tiene-error @enderror"
            required
        >
        @error('Titulo')
            <span class="campo__error">{{ $message }}</span>
        @enderror
    </div>

    <div class="campo">
        <label for="Tipo">Tipo</label>
        <input
            type="text"
            id="Tipo"
            name="Tipo"
            value="{{ old('Tipo', $libro?->Tipo) }}"
            maxlength="45"
            placeholder="Novela, ensayo, cuento..."
            class="@error('Tipo') tiene-error @enderror"
        >
        @error('Tipo')
            <span class="campo__error">{{ $message }}</span>
        @enderror
    </div>

    <div class="campo">
        <label for="genero">Género</label>
        <input
            type="text"
            id="genero"
            name="genero"
            value="{{ old('genero', $libro?->genero) }}"
            maxlength="50"
            placeholder="Drama, ciencia ficción, historia..."
            class="@error('genero') tiene-error @enderror"
        >
        @error('genero')
            <span class="campo__error">{{ $message }}</span>
        @enderror
    </div>

    {{-- Relaciones: se muestran los nombres completos y se guarda el ID real. --}}
    <div class="campo">
        <label for="ID_autor">Autor <span class="obligatorio">*</span></label>
        <select id="ID_autor" name="ID_autor" class="@error('ID_autor') tiene-error @enderror" required>
            <option value="">— Seleccionar autor —</option>
            @foreach ($autores as $autor)
                <option value="{{ $autor->ID_autores }}" @selected((string) old('ID_autor', $libro?->ID_autor) === (string) $autor->ID_autores)>
                    {{ $autor->Nombre }} {{ $autor->Apellidos }}
                </option>
            @endforeach
        </select>
        @error('ID_autor')
            <span class="campo__error">{{ $message }}</span>
        @enderror

        @if ($autores->isEmpty())
            <span class="campo__ayuda">
                Todavía no hay autores registrados. <a href="{{ route('autores.create') }}">Agrega un autor primero</a>.
            </span>
        @endif
    </div>

    <div class="campo">
        <label for="ID_editor">Editor</label>
        <select id="ID_editor" name="ID_editor" class="@error('ID_editor') tiene-error @enderror">
            <option value="">— Seleccionar editor —</option>
            @foreach ($editores as $editor)
                <option value="{{ $editor->ID_editores }}" @selected((string) old('ID_editor', $libro?->ID_editor) === (string) $editor->ID_editores)>
                    {{ $editor->Nombre }} {{ $editor->Apellidos }}@if ($editor->nombre_editorial) ({{ $editor->nombre_editorial }})@endif
                </option>
            @endforeach
        </select>
        @error('ID_editor')
            <span class="campo__error">{{ $message }}</span>
        @enderror

        @if ($editores->isEmpty())
            <span class="campo__ayuda">
                Todavía no hay editores registrados. <a href="{{ route('editores.create') }}">Agrega un editor</a>.
            </span>
        @endif
    </div>

    <div class="campo">
        <label for="ID_traductor">Traductor</label>
        <select id="ID_traductor" name="ID_traductor" class="@error('ID_traductor') tiene-error @enderror">
            <option value="">— Sin traductor —</option>
            @foreach ($traductores as $traductor)
                <option value="{{ $traductor->ID_traductores }}" @selected((string) old('ID_traductor', $libro?->ID_traductor) === (string) $traductor->ID_traductores)>
                    {{ $traductor->Nombre }} {{ $traductor->Apellidos }}@if ($traductor->idioma_nativo) ({{ $traductor->idioma_nativo }})@endif
                </option>
            @endforeach
        </select>
        @error('ID_traductor')
            <span class="campo__error">{{ $message }}</span>
        @enderror

        @if ($traductores->isEmpty())
            <span class="campo__ayuda">
                Todavía no hay traductores registrados. <a href="{{ route('traductores.create') }}">Agrega un traductor</a>.
            </span>
        @endif
    </div>

    <x-campo-imagen nombre="img_libros" :valor="$libro?->img_libros" etiqueta="Portada del libro" />

</div>
