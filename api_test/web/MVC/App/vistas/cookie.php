<?php if (isset($datos['usuarioSesion']) && !empty($datos['usuarioSesion'])) {
     require_once RUTA_APP. "/vistas/inc/header_logueado.php" ;
}else{
    require_once RUTA_APP. "/vistas/inc/header_no_logueado.php" ;
}
?>
<div class="px-3 px-md-5">
        <div class="row">
            <div class="col-12 mt-2">
                <h2>Política de Cookies</h2>
                <h4>Fecha de entrada en vigor: 11/03/2024</h4>
                <p>Agradecemos que hayas visitado nuestro sitio web. Tu privacidad es importante para nosotros, y nos comprometemos a protegerla. Esta Política de Privacidad explica cómo recopilamos, utilizamos y protegemos la información personal que obtenemos a través de cookies y tecnologías similares en este sitio.</p>
                <h4>1. Cookies y Tecnologías Similares</h4>
                <p>Utilizamos cookies y otras tecnologías similares para mejorar tu experiencia de navegación y comprender mejor cómo interactúas con nuestro sitio. Las cookies son pequeños archivos de datos que se almacenan en tu dispositivo cuando visitas nuestro sitio web. Estas tecnologías nos permiten recopilar información, como el tipo de navegador, el tiempo de permanencia en el sitio y las páginas visitadas.</p>
                <h4>2. Tipos de Cookies</h4>
                <p>Utilizamos cookies esenciales y funcionales. Las cookies esenciales son necesarias para el funcionamiento básico del sitio, mientras que las cookies funcionales mejoran la experiencia del usuario.</p> 
                <h4>3. Información Personal</h4>
                <p>No recopilamos información personal a través de cookies sin tu consentimiento explícito. Si decides proporcionar información personal mediante formularios en el sitio, tratamos esa información de acuerdo con nuestra Política de Privacidad principal.</p>
                <h4>4. Enlaces a Terceros</h4>
                <p>Nuestro sitio puede contener enlaces a sitios web de terceros. No nos hacemos responsables de las prácticas de privacidad de estos sitios y te recomendamos revisar sus políticas de privacidad.</p>
                <h4>5. Cambios en la Política</h4>
                <p>Nos reservamos el derecho de modificar esta Política de Privacidad y Cookies en cualquier momento. La versión actualizada estará disponible en nuestro sitio web con la fecha de entrada en vigor.</p>
                <h4>6. Contacto</h4>
                <p>Si tienes preguntas o inquietudes sobre nuestra política de privacidad o el uso de cookies, contáctanos a través de reto1adapta@gmail.com.</p>
                <p>Gracias por confiar en nosotros.</p>
            </div>
        </div>
</div>

<?php require_once RUTA_APP. "/vistas/inc/footer.php" ?>  