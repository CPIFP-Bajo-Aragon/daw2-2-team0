<!-- formulario_cambio_pass.php -->
<form action="/usuario/cambiar_password" method="post">
    <label for="nueva_password">Nueva contraseña:</label>
    <input type="password" id="nueva_password" name="nueva_password" required>
    <br>
    <label for="confirmar_password">Confirmar nueva contraseña:</label>
    <input type="password" id="confirmar_password" name="confirmar_password" required>
    <br>
    <button type="submit">Cambiar contraseña</button>
</form>
