<?php
/**
 * Cargar archivos
 *  
 */
// Cargar configuraciones
require_once("config/app-config.php");

// Carga automática y optimizada de archivos - Autoload PHP
spl_autoload_register(function($className)
{
    // Incluir archivo
    require_once('libs/' . $className . '.php');
});
