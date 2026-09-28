<?php

/*
|--------------------------------------------------------------------------
| Mensajes de validación en español
|--------------------------------------------------------------------------
|
| Solo se traducen las reglas que usa la Biblioteca Virtual. Las reglas que
| no aparezcan aquí usan el mensaje por defecto de Laravel (APP_FALLBACK_LOCALE).
|
*/

return [

    'accepted' => 'El campo :attribute debe ser aceptado.',
    'after' => 'El campo :attribute debe ser una fecha posterior a :date.',
    'before' => 'El campo :attribute debe ser una fecha anterior a :date.',
    'boolean' => 'El campo :attribute debe ser verdadero o falso.',
    'confirmed' => 'La confirmación de :attribute no coincide.',
    'date' => 'El campo :attribute no es una fecha válida.',
    'different' => 'Los campos :attribute y :other deben ser diferentes.',
    'email' => 'El campo :attribute debe ser una dirección de correo válida.',
    'file' => 'El campo :attribute debe ser un archivo.',
    'filled' => 'El campo :attribute debe tener un valor.',
    'image' => 'El campo :attribute debe ser una imagen (JPG, JPEG, PNG o WEBP).',
    'in' => 'El valor seleccionado en :attribute no es válido.',
    'integer' => 'El campo :attribute debe ser un número entero.',
    'max' => [
        'array' => 'El campo :attribute no debe tener más de :max elementos.',
        'file' => 'El archivo :attribute no debe pesar más de :max kilobytes.',
        'numeric' => 'El campo :attribute no debe ser mayor que :max.',
        'string' => 'El campo :attribute no debe tener más de :max caracteres.',
    ],
    'mimes' => 'El campo :attribute debe ser un archivo de tipo: :values.',
    'mimetypes' => 'El campo :attribute debe ser un archivo de tipo: :values.',
    'min' => [
        'array' => 'El campo :attribute debe tener al menos :min elementos.',
        'file' => 'El archivo :attribute debe pesar al menos :min kilobytes.',
        'numeric' => 'El campo :attribute debe ser al menos :min.',
        'string' => 'El campo :attribute debe tener al menos :min caracteres.',
    ],
    'numeric' => 'El campo :attribute debe ser un número.',
    'regex' => 'El formato del campo :attribute no es válido.',
    'required' => 'El campo :attribute es obligatorio.',
    'required_if' => 'El campo :attribute es obligatorio cuando :other es :value.',
    'same' => 'Los campos :attribute y :other deben coincidir.',
    'size' => [
        'array' => 'El campo :attribute debe contener :size elementos.',
        'file' => 'El archivo :attribute debe pesar :size kilobytes.',
        'numeric' => 'El campo :attribute debe ser :size.',
        'string' => 'El campo :attribute debe tener :size caracteres.',
    ],
    'string' => 'El campo :attribute debe ser texto.',
    'unique' => 'El valor del campo :attribute ya está registrado.',

    'digits' => 'El campo :attribute debe tener :digits dígitos.',
    'digits_between' => 'El campo :attribute debe tener entre :min y :max dígitos.',
    'exists' => 'El valor seleccionado en :attribute no existe en el sistema.',

    /*
    |--------------------------------------------------------------------------
    | Mensajes personalizados por atributo
    |--------------------------------------------------------------------------
    */

    'custom' => [
        'img_autores' => [
            'image' => 'La foto del autor debe ser una imagen (JPG, JPEG, PNG o WEBP).',
            'mimes' => 'La foto del autor debe ser JPG, JPEG, PNG o WEBP.',
            'max' => 'La foto del autor no debe pesar más de 2 MB.',
        ],
        'img_editores' => [
            'image' => 'La imagen del editor debe ser una imagen (JPG, JPEG, PNG o WEBP).',
            'mimes' => 'La imagen del editor debe ser JPG, JPEG, PNG o WEBP.',
            'max' => 'La imagen del editor no debe pesar más de 2 MB.',
        ],
        'img_traductores' => [
            'image' => 'La imagen del traductor debe ser una imagen (JPG, JPEG, PNG o WEBP).',
            'mimes' => 'La imagen del traductor debe ser JPG, JPEG, PNG o WEBP.',
            'max' => 'La imagen del traductor no debe pesar más de 2 MB.',
        ],
        'img_libros' => [
            'image' => 'La portada del libro debe ser una imagen (JPG, JPEG, PNG o WEBP).',
            'mimes' => 'La portada del libro debe ser JPG, JPEG, PNG o WEBP.',
            'max' => 'La portada del libro no debe pesar más de 2 MB.',
        ],
        'ID_autor' => [
            'exists' => 'El autor seleccionado no existe.',
            'required' => 'Debes seleccionar un autor para el libro.',
        ],
        'ID_editor' => [
            'exists' => 'El editor seleccionado no existe.',
        ],
        'ID_traductor' => [
            'exists' => 'El traductor seleccionado no existe.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Nombres legibles de los campos
    |--------------------------------------------------------------------------
    */

    'attributes' => [
        'Nombre' => 'nombre',
        'Apellidos' => 'apellidos',
        'telefono' => 'teléfono',
        'correo' => 'correo',
        'nombre_editorial' => 'nombre de la editorial',
        'pais' => 'país',
        'idioma_nativo' => 'idioma nativo',
        'idiomas_traduccion' => 'idiomas de traducción',
        'certificaciones' => 'certificaciones',
        'Titulo' => 'título',
        'Tipo' => 'tipo',
        'genero' => 'género',
        'ID_autor' => 'autor',
        'ID_editor' => 'editor',
        'ID_traductor' => 'traductor',
        'img_autores' => 'foto del autor',
        'img_editores' => 'imagen del editor',
        'img_traductores' => 'imagen del traductor',
        'img_libros' => 'portada del libro',
        'buscar' => 'búsqueda',
    ],

];
