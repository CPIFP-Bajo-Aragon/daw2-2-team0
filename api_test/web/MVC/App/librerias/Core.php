<?php
    //Acceso a URL

    /** 
     * mapear la url ingresada en el navegador
     * 1 - controlador
     * 2 - método
     * 3 - parámetros
     * Ejemplo: /articulo/actualizar/4
    */

    class Core {
        protected $controladorActual = "Inicio";
        protected $metodoActual = "index";
        protected $parametros = [];

        public function __construct() {
            $url = $this->getUrl();
            
            if (isset($url[0])) {
                //Buscamos en controladores si el controlador existe
                if (file_exists("../App/controladores/". ucwords($url[0]). ".php")) {
                    //echo "Existe";
                    //Si existe, se configura como controlador por defecto
                    $this->controladorActual = ucwords($url[0]);
                    //Eliminamos la primera posición de $url
                    unset($url[0]);
                } else {
                    //echo "No existe";
                }
            }
            require_once "../App/controladores/". $this->controladorActual. ".php";
            $this->controladorActual = new $this->controladorActual;

            //Obtenemos la segunda parte de la url: el método
            if (isset($url[1])) {
                if(method_exists($this->controladorActual, $url[1])) {
                    $this->metodoActual = $url[1];
                    unset($url[1]);
                }
            }

            //Obtenemos los parámetros
            $this->parametros = $url ? array_values($url) : [];

            //Llamamos al método del controlador
            call_user_func_array([$this->controladorActual, $this->metodoActual], $this->parametros);

        }

        //Transformamos la url en un array
        private function getUrl() {
            if (isset($_SERVER['REQUEST_URI'])) {
                $url = $_SERVER['REQUEST_URI'];
                $url = filter_var($url, FILTER_SANITIZE_URL);   //Elimina carácteres extraños
                $url = rtrim($url, "/");    //Limpiamos url por la derecha del /
                $url = ltrim($url, "/");    //Limpiamos url por la izquierda del / (para implementarlo en nginx)
                $url_array = explode("/", $url);
                //print_r($url_array);
                return $url_array;
            }
        }
    }