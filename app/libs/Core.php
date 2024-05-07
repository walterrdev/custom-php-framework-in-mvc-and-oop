<?php
/**
 * Mapeador de url ingresadas en el navegador
 * 
 * El orden sería: 
 * 1. Controlador
 * 2. Método
 * 3. Parámetro
 * 
 * Ej: post/edit/3
 */

class Core
{
    /**
     * Propiedades de la clase Core
     */
    protected $currentController = 'pages';
    protected $currentMethod = 'index';
    protected $currentParameter = [];

    /**
     * Constructor
     * 
     * Método especial que se carga automáticamente al instanciar la clase.
     */
    public function __construct()
    {
        // Obtener url
        $url = $this->getUrl();

        /**
         * Controller
         */
        // Buscar controlador dentro de la carpeta controllers
        if ($url) {            
            if (file_exists('../app/controllers/' . ucwords($url[0] . '.php'))) {
                // Asignarlo como controlador actual
                $this->currentController = ucwords($url[0]);
                
                // Liberar controlador actual
                unset($url[0]);
            }
        }

        // Requerir archivo del controlador actual
        require_once('../app/controllers/' . $this->currentController . '.php');

        // Instanciar objeto del controlador actual
        echo "<br>currentController: " . $this->currentController . "<br>";
        $this->currentController = new $this->currentController;

        /**
         * Method
         */
        // Validar si en la url se pasó método
        if (isset($url[1])) {
            // Validar si el método existe dentro la clase
            if (method_exists($this->currentController, $url[1])) {
                // Asignar método al actual
                $this->currentMethod = $url[1];
                
                // Liberar controlador actual
                unset($url[1]);
            }
        }

        echo "currentMethod: " . $this->currentMethod . "<br>";

        /**
         * Parámetro
         * 
         */
        // Obtener parámetro desde variable URL sino asignar arreglo vacío
        $this->currentParameter = $url ? array_values($url) : [];

        // Obtener parámetros ingresados a la URL del navegador
        call_user_func_array([$this->currentController, $this->currentMethod], $this->currentParameter);
    }

    /**
     * Obtiene la url desde la barra de direcciones del navegador.
     */
    public function getUrl()
    {
        if (isset($_GET['url'])) {
            // Obtener url sin espacio en blanco al final
            $url = rtrim($_GET['url'], '/');

            // Validar si la URL es válida
            $url = filter_var($url, FILTER_SANITIZE_URL);

            // Separar datos URL
            $url = explode('/', $url);

            return $url;
        }
    }
}
