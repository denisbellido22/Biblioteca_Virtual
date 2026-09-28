{{-- Campo para subir una imagen desde el equipo con el explorador de archivos.
     Variables: $nombre (name del input), $valor (ruta guardada en la BD), $etiqueta --}}
@props(['nombre', 'valor' => null, 'etiqueta' => 'Imagen'])

@php
    $url = \App\Support\Imagen::url($valor);
    $idPrevia = 'previa-'.$nombre;
@endphp

<div class="campo campo--ancho">
    <label for="{{ $nombre }}">{{ $etiqueta }}</label>

    @if ($url)
        <div class="imagen-actual">
            <div class="imagen-actual__vista">
                <img src="{{ $url }}" alt="Imagen actual del registro">
                <span class="imagen-actual__texto">Imagen actual</span>
            </div>

            <div>
                <p class="campo__ayuda">
                    Puedes seleccionar otra imagen para reemplazarla (la anterior se elimina automáticamente).
                </p>

                <label class="casilla">
                    <input type="checkbox" name="quitar_imagen" value="1" @checked(old('quitar_imagen'))>
                    <span>Quitar la imagen actual</span>
                </label>
            </div>
        </div>
    @else
        <p class="campo__ayuda">Este registro todavía no tiene imagen.</p>
    @endif

    <div class="selector-archivo">
        <input
            type="file"
            id="{{ $nombre }}"
            name="{{ $nombre }}"
            accept="image/jpeg,image/png,image/webp,.jpg,.jpeg,.png,.webp"
            data-vista-previa="{{ $idPrevia }}"
        >

        <div class="vista-previa" id="{{ $idPrevia }}">
            <img alt="Vista previa de la imagen seleccionada">
            <span class="campo__ayuda">Vista previa</span>
        </div>
    </div>

    <span class="campo__ayuda">
        Selecciona la imagen desde tu equipo. Formatos permitidos: JPG, JPEG, PNG y WEBP. Tamaño máximo: 2 MB.
    </span>

    @error($nombre)
        <span class="campo__error">{{ $message }}</span>
    @enderror
</div>
