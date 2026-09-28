{{-- Campos del formulario de traductores.
     Variable: $traductor (null al crear, el modelo al editar) --}}

<div class="formulario">

    <div class="campo">
        <label for="Nombre">Nombre <span class="obligatorio">*</span></label>
        <input
            type="text"
            id="Nombre"
            name="Nombre"
            value="{{ old('Nombre', $traductor?->Nombre) }}"
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
            value="{{ old('Apellidos', $traductor?->Apellidos) }}"
            maxlength="50"
            class="@error('Apellidos') tiene-error @enderror"
            required
        >
        @error('Apellidos')
            <span class="campo__error">{{ $message }}</span>
        @enderror
    </div>

    <div class="campo">
        <label for="idioma_nativo">Idioma nativo</label>
        <input
            type="text"
            id="idioma_nativo"
            name="idioma_nativo"
            value="{{ old('idioma_nativo', $traductor?->idioma_nativo) }}"
            maxlength="30"
            class="@error('idioma_nativo') tiene-error @enderror"
        >
        @error('idioma_nativo')
            <span class="campo__error">{{ $message }}</span>
        @enderror
    </div>

    <div class="campo">
        <label for="idiomas_traduccion">Idiomas de traducción</label>
        <input
            type="text"
            id="idiomas_traduccion"
            name="idiomas_traduccion"
            value="{{ old('idiomas_traduccion', $traductor?->idiomas_traduccion) }}"
            maxlength="50"
            class="@error('idiomas_traduccion') tiene-error @enderror"
        >
        <span class="campo__ayuda">Puedes separar varios idiomas con comas.</span>
        @error('idiomas_traduccion')
            <span class="campo__error">{{ $message }}</span>
        @enderror
    </div>

    <div class="campo">
        <label for="certificaciones">Certificaciones</label>
        <input
            type="number"
            id="certificaciones"
            name="certificaciones"
            value="{{ old('certificaciones', $traductor?->certificaciones) }}"
            min="0"
            step="1"
            class="@error('certificaciones') tiene-error @enderror"
        >
        <span class="campo__ayuda">Número de certificaciones del traductor.</span>
        @error('certificaciones')
            <span class="campo__error">{{ $message }}</span>
        @enderror
    </div>

    <x-campo-imagen nombre="img_traductores" :valor="$traductor?->img_traductores" etiqueta="Imagen del traductor" />

</div>
