# DIRECTORIO MODELOS:
    Los ficheros, empiezan con mayúscula el nombre que le asignas y continua con Modelo (EjemploModelo), así identificamos el fichero del directorio modelos;
    Estos van a ejecutar consultas y acciones con la base de datos que devolveran consultas o variables con info al controlador.

### EJEMPLO:
    <?php
    class UsuarioModelo {
        private $db;

        public function __construct() {
            $this->db = new Base;
        }
    }