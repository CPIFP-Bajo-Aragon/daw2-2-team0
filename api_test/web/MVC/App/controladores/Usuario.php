<?php

class Usuario extends Controlador {

    // Otras funciones del controlador...

    public function cambiarPassword() {
        // Verificar si el usuario está autenticado y obtener su ID
        if (!Sesion::sesionIniciada()) {
            // Redirigir al usuario a iniciar sesión si no lo está
            redireccionar('/login');
        }

        // Verificar si se ha enviado el formulario
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Obtener los datos del formulario
            $password_actual = $_POST['password_actual'];
            $nueva_password = $_POST['nueva_password'];
            $confirmar_password = $_POST['confirmar_password'];

            // Validar que las contraseñas coincidan
            if ($nueva_password !== $confirmar_password) {
                // Mostrar un mensaje de error al usuario
                Flash::mensaje('error', 'Las contraseñas no coinciden');
                redireccionar('/usuario/cambiar_password'); // Redirigir al formulario de cambio de contraseña
            }

            // Verificar que la contraseña actual del usuario sea correcta
            $usuarioModelo = $this->modelo('UsuarioModelo');
            $usuario = $usuarioModelo->obtenerUsuarioPorId($_SESSION['usuario_id']); // Suponiendo que guardas el ID del usuario en la sesión
            if (!$usuario || !password_verify($password_actual, $usuario->contrasena)) {
                // Mostrar un mensaje de error al usuario
                Flash::mensaje('error', 'La contraseña actual es incorrecta');
                redireccionar('/usuario/cambiar_password'); // Redirigir al formulario de cambio de contraseña
            }

            // Hash de la nueva contraseña
            $nueva_password_hash = password_hash($nueva_password, PASSWORD_DEFAULT);

            // Actualizar la contraseña en la base de datos
            $usuarioModelo->actualizarPassword($_SESSION['usuario_id'], $nueva_password_hash);

            // Mostrar un mensaje de éxito al usuario
            Flash::mensaje('exito', '¡La contraseña se ha cambiado correctamente!');
            redireccionar('/perfil'); // Redirigir al perfil del usuario u otra página
        } else {
            // Si no se envió el formulario, mostrar el formulario para cambiar la contraseña
            $this->vista('usuarios/formulario_cambio_pass');
        }
    }
}