<?php
    //**Desarrollo*/
        ini_set("display_errors", 1);
        ini_set("display_startup_errors", 1);
        error_reporting(E_ALL);
    //**Desarrollo*/

    //Ruta de la aplicación
    define("RUTA_APP", dirname(dirname(__FILE__)));

    //Ruta url
    define("RUTA_URL", "https://192.168.4.245");
    //define("RUTA_URL", "/MVC");

    define("NOMBRE_SITIO", "MVC");

    //Configuración de la BD
    define("DB_HOST", "localhost");
    define("DB_USUARIO", "root");
    define("DB_PASSWORD", "toor");
    define("DB_NOMBRE", "crud_mvc");
    
    //Configuración del tamaño de página en la paginación
    define("TAM_PAGINA", 2);