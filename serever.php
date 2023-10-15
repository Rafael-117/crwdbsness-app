<?php

// Establece el entorno de Laravel en función de variables de entorno o en producción
$env = getenv('APP_ENV') ?: 'production';

// Si estás en desarrollo, habilita el modo de depuración de Laravel
if ($env == 'local' || $env == 'development') {
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');
}

// Carga el archivo de inicio de Laravel
require $laravelPath . '/index.php';
