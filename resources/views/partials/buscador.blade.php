<form action="{{ $ruta }}" method="GET" class="buscador" role="search">
    <input
        type="text"
        name="buscar"
        class="buscador__campo"
        value="{{ $buscar ?? '' }}"
        placeholder="{{ $placeholder ?? 'Buscar...' }}"
        aria-label="Buscar"
    >

    <button type="submit" class="btn btn--primario">Buscar</button>

    @if (! empty($buscar))
        <a href="{{ $ruta }}" class="btn btn--claro">Limpiar</a>
    @endif
</form>
