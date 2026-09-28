{{-- Campos del formulario de autores.
     Variable: $autor (null al crear, el modelo al editar) --}}

<div class="formulario">

    <div class="campo">
        <label for="Nombre">Nombre <span class="obligatorio">*</span></label>
        <input
            type="text"
            id="Nombre"
            name="Nombre"
            value="{{ old('Nombre', $autor?->Nombre) }}"
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
            value="{{ old('Apellidos', $autor?->Apellidos) }}"
            maxlength="50"
            class="@error('Apellidos') tiene-error @enderror"
            required
        >
        @error('Apellidos')
            <span class="campo__error">{{ $message }}</span>
        @enderror
    </div>

    <div class="campo">
        <label for="telefono">Teléfono <span class="obligatorio">*</span></label>
        <input
            type="tel"
            id="telefono"
            name="telefono"
            value="{{ old('telefono', $autor?->telefono) }}"
            inputmode="numeric"
            maxlength="14"
            class="@error('telefono') tiene-error @enderror"
            required
        >
        <span class="campo__ayuda">Solo números, entre 7 y 14 dígitos.</span>
        @error('telefono')
            <span class="campo__error">{{ $message }}</span>
        @enderror
    </div>

    <div class="campo">
        <label for="correo">Correo <span class="obligatorio">*</span></label>
        <input
            type="email"
            id="correo"
            name="correo"
            value="{{ old('correo', $autor?->correo) }}"
            maxlength="30"
            class="@error('correo') tiene-error @enderror"
            required
        >
        @error('correo')
            <span class="campo__error">{{ $message }}</span>
        @enderror
    </div>

    <x-campo-imagen nombre="img_autores" :valor="$autor?->img_autores" etiqueta="Foto del autor" />

</div>
