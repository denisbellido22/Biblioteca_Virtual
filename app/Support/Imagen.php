<?php

namespace App\Support;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

/**
 * Manejo de las imágenes que se suben desde el equipo del usuario.
 *
 * Los archivos se guardan físicamente en  public/uploads/{carpeta}/  y en la
 * base de datos solamente se almacena la ruta relativa, por ejemplo:
 * "uploads/autores/AbC123.jpg".  Gracias a eso se pueden mostrar en Blade con
 * asset($ruta) sin necesidad de ejecutar "php artisan storage:link".
 */
class Imagen
{
    /** Carpeta raíz (dentro de /public) donde se guardan todas las imágenes. */
    public const CARPETA_BASE = 'uploads';

    /**
     * Guarda la imagen en el disco y devuelve la ruta relativa que se almacena
     * en la base de datos. Devuelve null si no se recibió ningún archivo.
     */
    public static function guardar(?UploadedFile $archivo, string $carpeta): ?string
    {
        if (! $archivo) {
            return null;
        }

        $destino = public_path(self::CARPETA_BASE.'/'.$carpeta);

        if (! is_dir($destino)) {
            mkdir($destino, 0755, true);
        }

        $nombre = Str::random(24).'.'.strtolower($archivo->getClientOriginalExtension());

        $archivo->move($destino, $nombre);

        return self::CARPETA_BASE.'/'.$carpeta.'/'.$nombre;
    }

    /**
     * Reemplaza la imagen anterior por la nueva.
     * Si no se subió un archivo nuevo, conserva la imagen que ya estaba.
     */
    public static function reemplazar(?UploadedFile $archivo, string $carpeta, ?string $anterior): ?string
    {
        if (! $archivo) {
            return $anterior;
        }

        $nueva = self::guardar($archivo, $carpeta);

        self::eliminar($anterior);

        return $nueva;
    }

    /**
     * Elimina el archivo físico de la imagen anterior.
     * Solo borra rutas que estén dentro de la carpeta "uploads" para no
     * tocar archivos ajenos al proyecto.
     */
    public static function eliminar(?string $ruta): void
    {
        $ruta = trim(str_replace('\\', '/', (string) $ruta));

        if ($ruta === '' || Str::startsWith($ruta, ['http://', 'https://', '//'])) {
            return;
        }

        $ruta = ltrim($ruta, '/');

        if (! Str::startsWith($ruta, self::CARPETA_BASE.'/')) {
            return;
        }

        $absoluta = public_path($ruta);

        if (is_file($absoluta)) {
            @unlink($absoluta);
        }
    }

    /**
     * Devuelve la URL lista para usar en <img src="...">.
     * Devuelve null cuando el registro no tiene imagen.
     */
    public static function url(?string $ruta): ?string
    {
        $ruta = trim((string) $ruta);

        if ($ruta === '') {
            return null;
        }

        // Si la base de datos ya guarda una URL completa, se respeta tal cual.
        if (Str::startsWith($ruta, ['http://', 'https://', '//'])) {
            return $ruta;
        }

        return asset(ltrim($ruta, '/'));
    }
}
