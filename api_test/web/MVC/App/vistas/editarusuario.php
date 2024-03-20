<?php if (isset($datos['usuarioSesion']) && !empty($datos['usuarioSesion'])) {
     require_once RUTA_APP. "/vistas/inc/header_logueado.php" ;
}else{
    require_once RUTA_APP. "/vistas/inc/header_no_logueado.php" ;
}
?>
    <form action="<?php RUTA_URL ?>/validarusuario/editarusuario" method="POST" class="needs-validation" id="registro_formulario">
    <input type="hidden" name="id" value="<?php echo $datos['usuario']->id_usuario?>">
        <div class="d-flex align-items-center mt-3 mb-3">
            <div class="container-fluid col-10 col-xl-8 p-5 text-center border rounded border-dark">
                <h1>Editar usuario</h1>
                <div class="row form-row mt-5">
                    <!---EMAIL USUARIO -->
                    <div class="form-group col-md-4 d-flex align-items-start flex-column">
                    
                        <label for="email_user">Email:</label>
                        <input type="email" class="form-control" id="email_user" placeholder="ejemplo@gmail.com" name="email_user" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" value="<?php echo $datos['usuario']->correo_usuario?>" required>
                        
                    </div>
                    <!---FECHA USUARIO -->
                    <div class="form-group col-md-4 d-flex align-items-start flex-column">
                        <label for="fecha_user">Fecha nacimiento:</label>
                        <input type="date" class="form-control" id="fecha_user" name="fecha_user" value="<?php echo $datos['usuario']->fecha_nacimiento_usuario?>" required>   
                    </div>
                </div>

                <div class="row form-row mt-5 mb-3">
                    <!---NOMBRE USUARIO -->
                    <div class="form-group col-md-3 d-flex align-items-start flex-column">
                    
                        <label for="nombre_user">Nombre:</label>
                        <input type="text" class="form-control" id="nombre_user" placeholder="Nombre" name="nombre_user" pattern="[A-Za-z]+" value="<?php echo $datos['usuario']->nombre_usuario?>" required>
                        
                    </div>
                    <!---APELLIDO USUARIO -->
                    <div class="form-group col-md-3 d-flex align-items-start flex-column">
                    
                        <label for="apellido_user">Apellido:</label>
                        <input type="text" class="form-control" id="apellido_user" placeholder="Apellido" name="apellido_user" pattern="[A-Za-z]+" value="<?php echo $datos['usuario']->apellidos_usuario?>" required>
                        
                    </div>
                    <!---DNI USUARIO -->
                    <div class="form-group col-md-3 d-flex align-items-start flex-column">
                    
                        <label for="dni_user">DNI:</label>
                        <input type="text" class="form-control" id="dni_user" placeholder="DNI" name="dni_user" pattern="[0-9]{8}[A-Z]" value="<?php echo $datos['usuario']->nif?>" required>
                        
                    </div>
                    <!---TELEFONO USUARIO -->
                    <div class="form-group col-md-3 d-flex align-items-start flex-column">
                    
                        <label for="telefono_user">Telefono:</label>
                        <input type="text" class="form-control" id="telefono_user" placeholder="Telefono" name="telefono_user" pattern="[0-9]{9}" value="<?php echo $datos['usuario']->telefono_usuario?>" required>
                        
                    </div>
                </div>
                
                <div>
                    <button class="btn btn-dark mt-3 mb-3" type="submit">Actualizar</button>
                </div>
                
            </div>
        </div>
    </form>
<?php require_once RUTA_APP. "/vistas/inc/footer.php" ?>  