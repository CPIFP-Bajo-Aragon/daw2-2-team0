<?php
// UsuarioModelo.php

class UsuarioModelo {
    private $db;

    public function __construct() {
        $this->db = new Base;
    }

    public function actualizarPassword($usuario_id, $nueva_password) {
        $this->db->query("UPDATE usuarios SET contrasena = :nueva_password WHERE id = :usuario_id");
        $this->db->bind(':nueva_password', $nueva_password);
        $this->db->bind(':usuario_id', $usuario_id);
        return $this->db->execute();
    }
}
