@if (session('success'))
    <div class="alerta alerta--exito" role="status">
        <span class="alerta__icono">&#10004;</span>
        <span>{{ session('success') }}</span>
    </div>
@endif

@if (session('error'))
    <div class="alerta alerta--error" role="alert">
        <span class="alerta__icono">&#10006;</span>
        <span>{{ session('error') }}</span>
    </div>
@endif

@if ($errors->any())
    <div class="alerta alerta--error" role="alert">
        <span class="alerta__icono">&#10006;</span>
        <span>
            <strong>Revisa el formulario, hay {{ $errors->count() }} error(es):</strong>
            <ul class="alerta__lista">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </span>
    </div>
@endif
