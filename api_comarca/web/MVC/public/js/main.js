//Marcar como active el botón pulsado (ya hay un active por defecto)
let boton_marcado = document.getElementsByClassName("botones_activos");
let botones = boton_marcado.getElementsByClassName("boton_activo");
for (let i = 0; i < botones.length; i++) {
    botones[i].addEventListener("click", function() {
        let actual = document.getElementsByClassName("active");
        actual[0].className = actual[0].className.replace("active", "");
        this.className += "active";
    });
}