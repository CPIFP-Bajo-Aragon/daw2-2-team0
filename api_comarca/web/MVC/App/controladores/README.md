# DIRECTORIO CONTROLADORES:
    Ficheros, empiezan con mayúscula, así identificamos el fichero controlador;
    Estos van a llamar al modelo para ejecutar acciones en la base de datos o podrán llamarla a una vista que 
    se encuentra en la direccion indicada para así mostrar por pantalla esa vista;

##    EJEMPLO:

    <?php
    class Ejemplo extends Controlador {


        public function __construct() {

        }

        public function index() {
            
        }

    }