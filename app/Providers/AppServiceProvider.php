<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Toda la interfaz y los mensajes de validación de la Biblioteca Virtual
        // están en español. Para usar otro idioma basta con definir APP_LOCALE
        // en el archivo .env y respetarlo en config/app.php.
        app()->setLocale('es');
    }
}
