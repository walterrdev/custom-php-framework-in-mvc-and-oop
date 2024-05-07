<?php
/**
 * Constantes
 * 
 * Se definen todas las contantes que usará la aplicación.
 */
// Generales
define('__PATH_APP__', dirname(dirname(__FILE__)));     // Ruta de la raíz de la aplicación
define('__URL_APP__', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME']); // Ruta pública de la aplicación
define('__NAME_APP__', '');                             // Nombre de la aplicación

// Datos de conexión a la base de datos, los mismos que usas para ingresar a PhpMyAdmin.
define('DB_HOST', '');                 // Dirección del servidor de la base de datos. Ej: localhost
define('DB_USER', '');                 // Nombre de usuario.
define('DB_PASSWORD', '');             // Contraseña.
define('DB_NAME', '');                 // Nombre de la base de datos.
