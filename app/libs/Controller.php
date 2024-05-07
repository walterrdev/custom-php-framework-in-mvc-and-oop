<?php
/**
 * Controlador principal
 * 
 * Carga los modelos y vistas.
 */
class Controller{
    // Cargar modelo
    public function model($modelo)
    {
        // Cargar archivo del modelo
        require_once('../app/models/' . $modelo . '.php');

        // Instanciar y returnar objeto del modelo
        return new $modelo();
    }

    // Cargar vista
    public function view($vista, $datos = [])
    {
        // Validar si el archivo de la vista existe
        if (file_exists('../app/views/' . $vista . '.php')) {
            // Cargar archivo de la vista
            require_once('../app/views/' . $vista . '.php');
        } else {
            // Mostrar mensaje si el archivo no existe
            die('La vista no existe.');
        }
    }
}