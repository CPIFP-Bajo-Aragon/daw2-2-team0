<footer class="container-fluid bg-secondary fixed-bottom">
    <div>
        <a class="link-dark" href="#"><p>Política de cookies</p></a>
    </div>
</footer>
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js "></script>
    <script src="<?php echo RUTA_URL?>/js/main.js"></script>
    <script>
            (() => {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
        form.addEventListener('keyup', event => {
        if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
        }

        form.classList.add('was-validated')
        }, false)
    })
    })()
    </script>
</body>
</html>
