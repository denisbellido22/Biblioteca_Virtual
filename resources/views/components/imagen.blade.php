@props(['ruta' => null, 'alt' => 'Imagen'])

@php
    $url = \App\Support\Imagen::url($ruta);
@endphp

@if ($url)
    <img src="{{ $url }}" alt="{{ $alt }}" {{ $attributes->merge(['class' => 'miniatura']) }} loading="lazy">
@else
    <span class="sin-imagen" title="Este registro no tiene imagen">Sin imagen</span>
@endif
