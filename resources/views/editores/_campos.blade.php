{{-- Campos del formulario de editores.
     Variable: $editor (null al crear, el modelo al editar) --}}

<div class="formulario">

    <div class="campo">
        <label for="Nombre">Nombre <span class="obligatorio">*</span></label>
        <input
            type="text"
            id="Nombre"
            name="Nombre"
            value="{{ old('Nombre', $editor?->Nombre) }}"
            maxlength="50"
            class="@error('Nombre') tiene-error @enderror"
            required
        >
        @error('Nombre')
            <span class="campo__error">{{ $message }}</span>
        @enderror
    </div>

    <div class="campo">
        <label for="Apellidos">Apellidos <span class="obligatorio">*</span></label>
        <input
            type="text"
            id="Apellidos"
            name="Apellidos"
            value="{{ old('Apellidos', $editor?->Apellidos) }}"
            maxlength="50"
            class="@error('Apellidos') tiene-error @enderror"
            required
        >
        @error('Apellidos')
            <span class="campo__error">{{ $message }}</span>
        @enderror
    </div>

    <div class="campo">
        <label for="nombre_editorial">Nombre de la editorial</label>
        <input
            type="text"
            id="nombre_editorial"
            name="nombre_editorial"
            value="{{ old('nombre_editorial', $editor?->nombre_editorial) }}"
            maxlength="70"
            class="@error('nombre_editorial') tiene-error @enderror"
        >
        @error('nombre_editorial')
            <span class="campo__error">{{ $message }}</span>
        @enderror
    </div>

    <div class="campo">
        <label for="pais">País</label>
        <input
            type="text"
            id="pais"
            name="pais"
            value="{{ old('pais', $editor?->pais) }}"
            maxlength="100"
            class="@error('pais') tiene-error @enderror"
        >
        @error('pais')
            <span class="campo__error">{{ $message }}</span>
        @enderror
    </div>

    <x-campo-imagen nombre="img_editores" :valor="$editor?->img_editores" etiqueta="Imagen del editor" />

</div>
