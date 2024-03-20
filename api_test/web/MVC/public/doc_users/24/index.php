<!DOCTYPE html>
<html>
<head>
    <title>Subir y Listar Archivos</title>
    
</head>
<body>
    <?php
    include("funciones.php");
    ?>
    <div class="container">
        <h2>Subir Archivos</h2>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <input type="file" name="archivo" />
            <br>
            <label for="directorio_destino">Selecciona un directorio destino:</label>
            <select name="directorio_destino" id="directorio_destino">
                <?php
                $carpeta_destino = 'archivos/';
                $archivos = scandir($carpeta_destino);
                foreach ($archivos as $archivo) {
                    if ($archivo != '.' && $archivo != '..') {
                        $rutaCompleta = $carpeta_destino . $archivo;
                        if (is_dir($rutaCompleta)) {
                            // Modificación: Enlace a una nueva página con el título del directorio
                            echo "<option value='$archivo'>$archivo</option>";
                        }
                    }
                }
                ?>
            </select>
            <input type="submit" value="SubirArchivo" class="button" />
        </form>



    <h2>Archivos en la Carpeta</h2>
        <ul>
            <?php           
            listarArchivosYDirectorios($carpeta_destino, 1);
            ?>
        </ul>

        <div class="button-container">
            <button onclick="location.reload()" class="button">Recargar Lista</button>
        </div>
    </div>
    
</body>
</html>
