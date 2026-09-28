<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Models\Editor;
use App\Models\Libro;
use App\Models\Traductor;

class HomeController extends Controller
{
    /**
     * Página principal: muestra los accesos a cada módulo y el total de
     * registros obtenidos realmente desde la base de datos.
     */
    public function index()
    {
        return view('home', [
            'totalAutores' => Autor::count(),
            'totalEditores' => Editor::count(),
            'totalTraductores' => Traductor::count(),
            'totalLibros' => Libro::count(),
        ]);
    }
}
