/* ==========================================================================
   Biblioteca Virtual - comportamiento del lado del cliente
   1. Confirma antes de eliminar cualquier registro.
   2. Muestra una vista previa de la imagen elegida con <input type="file">.
   ========================================================================== */

document.addEventListener('DOMContentLoaded', function () {
    confirmarEliminacion();
    previsualizarImagen();
});

/**
 * Los formularios que tienen el atributo data-confirm piden confirmación
 * antes de enviarse. Se usa en los botones de eliminar.
 */
function confirmarEliminacion() {
    document.querySelectorAll('form[data-confirm]').forEach(function (formulario) {
        formulario.addEventListener('submit', function (evento) {
            var mensaje = formulario.getAttribute('data-confirm') || '¿Está seguro de eliminar este registro?';

            if (!window.confirm(mensaje)) {
                evento.preventDefault();
            }
        });
    });
}

/**
 * Al elegir un archivo en el input de imagen se muestra una vista previa
 * sin tener que subirlo primero al servidor.
 */
function previsualizarImagen() {
    document.querySelectorAll('input[type="file"][data-vista-previa]').forEach(function (input) {
        var contenedor = document.getElementById(input.getAttribute('data-vista-previa'));

        if (!contenedor) {
            return;
        }

        var imagen = contenedor.querySelector('img');

        input.addEventListener('change', function () {
            var archivo = input.files && input.files[0];

            if (!archivo) {
                contenedor.classList.remove('visible');

                return;
            }

            // Solo se previsualizan archivos de imagen.
            if (!archivo.type.startsWith('image/')) {
                contenedor.classList.remove('visible');
                window.alert('El archivo seleccionado no es una imagen válida. Usa JPG, JPEG, PNG o WEBP.');

                return;
            }

            if (imagen) {
                imagen.src = URL.createObjectURL(archivo);
                contenedor.classList.add('visible');
            }
        });
    });
}
