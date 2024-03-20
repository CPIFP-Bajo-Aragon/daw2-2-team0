if(document.getElementById('fecha_user')){
    document.getElementById('fecha_user').addEventListener('input', function() {
        var inputDate = new Date(this.value);
        var currentDate = new Date();
    
        if (inputDate > currentDate) {
            this.setCustomValidity('La fecha de nacimiento no puede ser posterior a la fecha actual');
        } else {
            this.setCustomValidity('');
        }
    });
}
//VALIDAR DNI
function validar_dni() {
            
    var numero;
    let letra;
    var expresion_regular_dni = /^[XYZ]?\d{5,8}[A-Z]$/;
    let dni = document.getElementById('dni_user').value;
    dni = dni.toUpperCase();


    if(expresion_regular_dni.test(dni) === true){
    numero = dni.substr(0,dni.length-1);
    numero = numero.replace('X', 0);
    numero = numero.replace('Y', 1);
    numero = numero.replace('Z', 2);
    let = dni.substr(dni.length-1, 1);
    numero = numero % 23;
    letra = 'TRWAGMYFPDXBNJZSQVHLCKET';
    letra = letra.substring(numero, numero+1);
        if (letra != let) {
            alert('Dni erroneo, la letra del NIF no se corresponde');
            return false;
        }else{
            //alert('Dni correcto');
            return true;
        }
    }else{
        alert('Dni erroneo, formato no válido');
        return false;
    }
}
//validar nif
function validar_nif() {
    if(document.getElementById("cif_entidad")){
        var nif = document.getElementById('cif_entidad');

        var letters = ['J', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I'];
        var digits = nif.substr(1, nif.length - 2);
        var letter = nif.substr(0, 1);
        var control = nif.substr(nif.length - 1);
        var sum = 0;
        var i;
        var digit;
    
        if (!letter.match(/[A-Z]/)) {
            return false;
        }
    
        for (i = 0; i < digits.length; ++i) {
            digit = parseInt(digits[i]);
    
            if (isNaN(digit)) {
                return false;
            }
    
            if (i % 2 === 0) {
                digit *= 2;
                if (digit > 9) {
                    digit = parseInt(digit / 10) + (digit % 10);
                }
    
                sum += digit;
            } else {
                sum += digit;
            }
        }
    
        sum %= 10;
        if (sum !== 0) {
            digit = 10 - sum;
        } else {
            digit = sum;
        }
    
        if (letter.match(/[ABEH]/)) {
            return String(digit) === control;
        }
        if (letter.match(/[NPQRSW]/)) {
            return letters[digit] === control;
        }
    
        return String(digit) === control || letters[digit] === control;
    }else{
        return true;
    }
    
}

function añadirformulario(){
    var select = document.getElementById("floatingSelect");
    select.addEventListener("change", function() {
    const contenedor_ampliar = document.getElementById("ampliacion_registro");
    var entidad = document.getElementById("floatingSelect").value;
    if (entidad == 0) {
        let espacio1 = document.getElementById("espacio1");
        let espacio2 = document.getElementById("espacio2");
        if (espacio1 && espacio2) {
            //BORRO EL DIV Y LO QUE CONTIENE PARA CREAR EL DIV QUE VA A CONTENER 3 INPUT VACÍOS
            espacio1.remove();
            espacio2.remove();
        }
    }
    if (entidad == 1) {
        let espacio1 = document.getElementById("espacio1");
        let espacio2 = document.getElementById("espacio2");
        if (espacio1 && espacio2) {
            //BORRO EL DIV Y LO QUE CONTIENE PARA CREAR EL DIV QUE VA A CONTENER 3 INPUT VACÍOS
            espacio1.remove();
            espacio2.remove();
        }   

            //CREO EL DIV QUE VA A CONTENER 3 INPUT VACÍOS
            espacio1 = document.createElement("div");
            espacio1.setAttribute("class","row form-row mt-5 mb-3");
            espacio1.setAttribute("id", "espacio1");

            contenedor_ampliar.appendChild(espacio1);
            //INSERTO EL DIV QUE TIENE EL LABEL CON EL INPUT
            let entidad_div1 = document.createElement("div");
            entidad_div1.setAttribute("class","form-group col-md-4 d-flex align-items-start flex-column");

            espacio1.appendChild(entidad_div1);

            //INSERTO EL LABEL DEL NOMBRE
            let label_nombre = document.createElement("label");
            label_nombre.setAttribute("for","nombre_entidad");
            label_nombre.innerHTML = "Nombre entidad:";

            entidad_div1.appendChild(label_nombre);

            //INSERTO EL INPUT DEL NOMBRE
            let input_nombre = document.createElement("input");
            input_nombre.type = "text";
            input_nombre.setAttribute("class", "form-control");
            input_nombre.setAttribute("id", "nombre_entidad");
            input_nombre.setAttribute("placeholder", "Nombre Entidad");
            input_nombre.setAttribute("name", "nombre_entidad");
            input_nombre.required = true;
            input_nombre.setAttribute("pattern", "[a-zA-Z0-9]*");

            entidad_div1.appendChild(input_nombre);

            //INSERTO EL DIV DEL CIF_ENTIDAD
            let entidad_div2 = document.createElement("div");
            entidad_div2.setAttribute("class","form-group col-md-4 d-flex align-items-start flex-column");
            
            espacio1.appendChild(entidad_div2);

            //INSERTO EL LABEL DEL CIF
            let label_cif = document.createElement("label");
            label_cif.setAttribute("for","cif_entidad");
            label_cif.innerHTML = "CIF:";

            entidad_div2.appendChild(label_cif);

            //INSERTO EL INPUT DEL CIF
            let input_cif = document.createElement("input");
            input_cif.type = "text";                        
            input_cif.setAttribute("class","form-control");
            input_cif.setAttribute("id","cif_entidad");
            input_cif.setAttribute("placeholder","CIF");
            input_cif.setAttribute("name","cif_entidad");
            input_cif.setAttribute("pattern","([ABCDEFGHJKLMNPQRSUVW])(\\d{7})([0-9A-J])");
            input_cif.required = true;                      

            entidad_div2.appendChild(input_cif);


            //INSERTO EL DIV DE LA DIRECCION_ENTIDAD
            let entidad_div3 = document.createElement("div");
            entidad_div3.setAttribute("class","form-group col-md-4 d-flex align-items-start flex-column");
            
            espacio1.appendChild(entidad_div3);

            //INSERTO EL LABEL DE LA DIRECCION
            let label_direccion = document.createElement("label");
            label_direccion.setAttribute("for","direccion_entidad");
            label_direccion.innerHTML = "Direccion:";

            entidad_div3.appendChild(label_direccion);

            //INSERTO EL INPUT DE LA DIRECCION
            let input_direccion = document.createElement("input");
            input_direccion.type = "text";                                               
            input_direccion.setAttribute("class","form-control");       
            input_direccion.setAttribute("id","direccion_entidad");       
            input_direccion.setAttribute("placeholder","Direccion");      
            input_direccion.setAttribute("name","direccion_entidad");     
            input_direccion.setAttribute("pattern", "^[^<>?]*$");
            input_direccion.required = true;                            

            entidad_div3.appendChild(input_direccion);

            //CREO EL 2do DIV QUE VA A CONTENER 2 INPUT VACÍOS
            espacio2 = document.createElement("div");
            espacio2.setAttribute("class","row form-row mt-5 mb-3");
            espacio2.setAttribute("id", "espacio2");

            contenedor_ampliar.appendChild(espacio2);
            //INSERTO EL DIV DEL NUM_TEL_ENTIDAD
            let entidad_div4 = document.createElement("div");
            entidad_div4.setAttribute("class","form-group col-md-4 d-flex align-items-start flex-column");

            espacio2.appendChild(entidad_div4);
            
            //INSERTO EL LABEL DEL NUMERO DE TELEFONO
            let label_num_tel = document.createElement("label");
            label_num_tel.setAttribute("for","numero_telefono_entidad");
            label_num_tel.innerHTML = "Teléfono:";

            entidad_div4.appendChild(label_num_tel);

            //INSERTO EL INPUT DEL NUMERO DE TELEFONO
            let input_num_tel = document.createElement("input");
            input_num_tel.type = "text";                              
            input_num_tel.setAttribute("class","form-control");       
            input_num_tel.setAttribute("id","numero_telefono_entidad");     
            input_num_tel.setAttribute("placeholder","Telefono");    
            input_num_tel.setAttribute("name","numero_telefono_entidad");
            input_num_tel.setAttribute("pattern", "[0-9]{9}");
            input_num_tel.required = true;                                  

            entidad_div4.appendChild(input_num_tel);

            //INSERTO EL DIV DEL CORREO
            let entidad_div5 = document.createElement("div");
            entidad_div5.setAttribute("class","form-group col-md-4 d-flex align-items-start flex-column");

            espacio2.appendChild(entidad_div5);
            
            //INSERTO EL LABEL DEL CORREO
            let label_correo = document.createElement("label");
            label_correo.setAttribute("for","correo_entidad");
            label_correo.innerHTML = "Email (empresa/entidad):";

            entidad_div5.appendChild(label_correo);

            //INSERTO EL INPUT DEL CORREO
            let input_correo = document.createElement("input");
            input_correo.type = "email";
            input_correo.setAttribute("class","form-control");
            input_correo.setAttribute("id","correo_entidad");
            input_correo.setAttribute("placeholder", "Email");
            input_correo.setAttribute("name", "correo_entidad");
            input_correo.setAttribute("pattern", "([a-zA-Z0-9_\\-\\.]+)@([a-zA-Z0-9_\\-\\.]+)\\.([a-zA-Z]{2,5})$");
            input_correo.required = true;

            entidad_div5.appendChild(input_correo);


        
    
    }
    if (entidad == 2) {
        let espacio1 = document.getElementById("espacio1");
        let espacio2 = document.getElementById("espacio2");
        if (espacio1 && espacio2) {
            //BORRO EL DIV Y LO QUE CONTIENE PARA CREAR EL DIV QUE VA A CONTENER 3 INPUT VACÍOS
            espacio1.remove();
            espacio2.remove();
        }   

            //CREO EL DIV QUE VA A CONTENER 3 INPUT VACÍOS
            espacio1 = document.createElement("div");
            espacio1.setAttribute("class","row form-row mt-5 mb-3");
            espacio1.setAttribute("id", "espacio1");

            contenedor_ampliar.appendChild(espacio1);
            //INSERTO EL DIV QUE TIENE EL LABEL CON EL INPUT
            let entidad_div1 = document.createElement("div");
            entidad_div1.setAttribute("class","form-group col-md-4 d-flex align-items-start flex-column");

            espacio1.appendChild(entidad_div1);

            //INSERTO EL LABEL DEL NOMBRE
            let label_nombre = document.createElement("label");
            label_nombre.setAttribute("for","nombre_entidad");
            label_nombre.innerHTML = "Nombre entidad:";

            entidad_div1.appendChild(label_nombre);

            //INSERTO EL INPUT DEL NOMBRE CARGANDO DATOS
            let valor_nombre = document.getElementById("nombre_user").value;
            let input_nombre = document.createElement("input");
            input_nombre.type = "text";
            input_nombre.setAttribute("class", "form-control");
            input_nombre.setAttribute("id", "nombre_entidad");
            input_nombre.setAttribute("placeholder", "Nombre Entidad");
            input_nombre.setAttribute("name", "nombre_entidad");
            input_nombre.setAttribute("value", valor_nombre);
            input_nombre.setAttribute("pattern", "[a-zA-Z0-9]*");
            input_nombre.required = true;

            entidad_div1.appendChild(input_nombre);

            //INSERTO EL DIV DEL CIF_ENTIDAD
            let entidad_div2 = document.createElement("div");
            entidad_div2.setAttribute("class","form-group col-md-4 d-flex align-items-start flex-column");
            
            espacio1.appendChild(entidad_div2);

            //INSERTO EL LABEL DEL CIF
            let label_cif = document.createElement("label");
            label_cif.setAttribute("for","cif_entidad");
            label_cif.innerHTML = "CIF:";

            entidad_div2.appendChild(label_cif);

            //INSERTO EL INPUT DEL CIF CON LOS DATOS CARGADOS
            let valor_cif = document.getElementById("dni_user").value;
            let input_cif = document.createElement("input");
            input_cif.type = "text";                        
            input_cif.setAttribute("class","form-control");
            input_cif.setAttribute("id","cif_entidad");
            input_cif.setAttribute("placeholder","CIF");
            input_cif.setAttribute("name","cif_entidad");
            input_cif.setAttribute("value", valor_cif);
            input_cif.setAttribute("pattern", "[0-9]{8}[A-Z]");
            input_cif.required = true;                      

            entidad_div2.appendChild(input_cif);

            //INSERTO EL DIV DE LA DIRECCION_ENTIDAD
            let entidad_div3 = document.createElement("div");
            entidad_div3.setAttribute("class","form-group col-md-4 d-flex align-items-start flex-column");
            
            espacio1.appendChild(entidad_div3);

            //INSERTO EL LABEL DE LA DIRECCION
            let label_direccion = document.createElement("label");
            label_direccion.setAttribute("for","direccion_entidad");
            label_direccion.innerHTML = "Direccion:";

            entidad_div3.appendChild(label_direccion);

            //INSERTO EL INPUT DE LA DIRECCION
            let input_direccion = document.createElement("input");
            input_direccion.type = "text";                                               
            input_direccion.setAttribute("class","form-control");       
            input_direccion.setAttribute("id","direccion_entidad");       
            input_direccion.setAttribute("placeholder","Direccion");      
            input_direccion.setAttribute("name","direccion_entidad");   
            input_direccion.setAttribute("pattern", "^[^<>?]*$");  
            input_direccion.required = true;                            

            entidad_div3.appendChild(input_direccion);

            //CREO EL 2do DIV QUE VA A CONTENER 2 INPUT VACÍOS
            espacio2 = document.createElement("div");
            espacio2.setAttribute("class","row form-row mt-5 mb-3");
            espacio2.setAttribute("id", "espacio2");

            contenedor_ampliar.appendChild(espacio2);
            //INSERTO EL DIV DEL NUM_TEL_ENTIDAD
            let entidad_div4 = document.createElement("div");
            entidad_div4.setAttribute("class","form-group col-md-4 d-flex align-items-start flex-column");

            espacio2.appendChild(entidad_div4);
            
            //INSERTO EL LABEL DEL NUMERO DE TELEFONO
            let label_num_tel = document.createElement("label");
            label_num_tel.setAttribute("for","numero_telefono_entidad");
            label_num_tel.innerHTML = "Teléfono:";

            entidad_div4.appendChild(label_num_tel);

            //INSERTO EL INPUT DEL NUMERO DE TELEFONO
            let valor_telefono = document.getElementById("telefono_user").value;
            let input_num_tel = document.createElement("input");
            input_num_tel.type = "text";                              
            input_num_tel.setAttribute("class","form-control");       
            input_num_tel.setAttribute("id","numero_telefono_entidad");     
            input_num_tel.setAttribute("placeholder","Telefono");    
            input_num_tel.setAttribute("name","numero_telefono_entidad");   
            input_num_tel.setAttribute("value", valor_telefono);
            input_num_tel.setAttribute("pattern", "[0-9]{9}");
            input_num_tel.required = true;                                  

            entidad_div4.appendChild(input_num_tel);

            //INSERTO EL DIV DEL CORREO
            let entidad_div5 = document.createElement("div");
            entidad_div5.setAttribute("class","form-group col-md-4 d-flex align-items-start flex-column");

            espacio2.appendChild(entidad_div5);
            
            //INSERTO EL LABEL DEL CORREO
            let label_correo = document.createElement("label");
            label_correo.setAttribute("for","correo_entidad");
            label_correo.innerHTML = "Email (empresa/entidad):";

            entidad_div5.appendChild(label_correo);

            //INSERTO EL INPUT DEL CORREO
            let valor_correo = document.getElementById("email_user").value;
            let input_correo = document.createElement("input");
            input_correo.type = "email";
            input_correo.setAttribute("class","form-control");
            input_correo.setAttribute("id","correo_entidad");
            input_correo.setAttribute("placeholder", "Email");
            input_correo.setAttribute("name", "correo_entidad");
            input_correo.setAttribute("value", valor_correo);
            input_correo.setAttribute("pattern", "([a-zA-Z0-9_\\-\\.]+)@([a-zA-Z0-9_\\-\\.]+)\\.([a-zA-Z]{2,5})$");
            input_correo.required = true;

            entidad_div5.appendChild(input_correo);

        
        }
    
    
    });

}

//***************************************************************************

function cambiopass() {
    const input_pass = document.getElementById("pass_user");
    const imagen = document.getElementById("img_mostrarpass");
    if (input_pass.type === "password") {
        input_pass.type = "text";
        imagen.src = "img/visible.png";
    } else {
        input_pass.type = "password";
        imagen.src = "img/ciego.png";
    }
}

/****************************************************************************/
/*FUNCIONES PARA LAS VIVIENDAS*/
    function buscadorViviendas() {
        var input = document.getElementById('buscador');
        var filtro = input.value.toUpperCase();

        var cards = document.querySelectorAll('.card');

        cards.forEach(function(card) {
            var texto = card.textContent || card.innerText;
            if (texto.toUpperCase().indexOf(filtro) > -1) {
                card.style.display = "";
            } else {
                card.style.display = "none";
            }
        });
    }

   function aplicarFiltros() {
        console.log("Aplicando filtros");

        //PARA FILTRAR POR MUNICIPIOS
        var selectedMunicipios = Array.from(document.querySelectorAll('[id^="check"]:checked')).map(checkbox => checkbox.value);
        console.log("Selected Municipios:", selectedMunicipios);

        var properties = document.querySelectorAll('[data-municipio]');
        console.log("Number of properties:", properties.length);

        properties.forEach(function(property) {
            var propertyMunicipio = property.getAttribute('data-municipio');
            console.log("Property Municipio:", propertyMunicipio);
            if (selectedMunicipios.includes('todos') || selectedMunicipios.includes(propertyMunicipio)) {
                property.classList.remove('d-none');
            } else {
                property.classList.add('d-none');
            }
        });

        //PARA FILTRAR POR ESTADO
        var checkboxes = document.querySelectorAll('.btn-check:checked');
        var estadosSeleccionados = Array.from(checkboxes).map(function (checkbox) {
            return checkbox.value;
        });

        var viviendas = document.querySelectorAll('.row[data-estado]');

        viviendas.forEach(function (vivienda) {
            var estadoVivienda = vivienda.getAttribute('data-estado');

            if (estadosSeleccionados.length === 0 || estadosSeleccionados.includes(estadoVivienda)) {
                vivienda.style.display = 'block';
            } else {
                vivienda.style.display = 'none';
            }
        });

        $('#filtroModal').modal('hide');
    }

    //ACTIVAR TODOS LOS MUNICIPIOS CUANDO SE SELECCIONE EL CHECK DE TODOS LOS MUNICIPIOS
    function activarDesactivarTodos() { 
        var checkboxTodos = document.getElementById("checkTodos");
        var checkboxesMunicipios = document.querySelectorAll('[id^="check"]');
        checkboxesMunicipios.forEach(function (checkbox) {
            checkbox.checked = checkboxTodos.checked;
        });
    }
    function filtrarViviendas() {
        console.log("Filtrar viviendas");
    }
/****************************************************************************/
//DRAG AND DROP
function dragOverHandler(ev) {
    console.log('File(s) in drop zone');

    // Prevent default behavior (Prevent file from being opened)
    ev.preventDefault();
    }

    function dropHandler(ev) {
    console.log('File(s) dropped');

    // Prevent default behavior (Prevent file from being opened)
    ev.preventDefault();

    var filesToUpload = [];

    if (ev.dataTransfer.items) {
        // Use DataTransferItemList interface to access the file(s)
        for (var i = 0; i < ev.dataTransfer.items.length; i++) {
        // If dropped items aren't files, reject them
        if (ev.dataTransfer.items[i].kind === 'file') {
            var file = ev.dataTransfer.items[i].getAsFile();
            // console.log('... file[' + i + '].name = ' + file.name);
            if (file['type']!="") {
                filesToUpload.push(file);
            }
            
        }
        }
    } else {
        // Use DataTransfer interface to access the file(s)
        for (var i = 0; i < ev.dataTransfer.files.length; i++) {
            // console.log('... file[' + i + '].name = ' + ev.dataTransfer.files[i].name);
            if (file['type']!="") {
                filesToUpload.push(file);
            }
        }
    }

    fileUpload(filesToUpload);
    // Pass event to removeDragData for cleanup
    removeDragData(ev);
}

function removeDragData(ev) {
    console.log('Removing drag data')

    if (ev.dataTransfer.items) {
        // Use DataTransferItemList interface to remove the drag data
        ev.dataTransfer.items.clear();
    }
}

function fileUpload(filesToUpload){
   
        // Obtener el elemento de entrada por su id
        var input = document.getElementById('input-upload');
        // Crear un objeto de tipo FileList con el archivo que deseas asignar
        var fileList = new DataTransfer();
        for (var i = 0; i < filesToUpload.length; i++) {
            fileList.items.add(filesToUpload[i]);
        }

        input.files = fileList.files;

}

//***********************************************************************************

// Creación de las cards de ofertas
function crear_card_oferta(ofertas) {
    let container = document.getElementById('oferta_card');
    container.innerHTML = '';

    ofertas.forEach(function(oferta) {
        let contenedorCards = document.getElementById('contenedor_cards');

        let containerCard = document.createElement('div');
        containerCard.classList.add('p-2');
        container.appendChild(containerCard);

        let card = document.createElement('div');

        let cardImg = document.createElement('div');

        let cardBody = document.createElement('div');

        if (contenedorCards.clientWidth > 768) {
            card.classList.add('card', 'p-2', 'd-flex', 'flex-row');
            containerCard.appendChild(card);
            
            cardImg.classList.add('card-img', 'd-flex');
            cardImg.style.width = '360px';
            cardImg.style.height = '240px';
            card.appendChild(cardImg);

            cardBody.classList.add('card-body', 'd-flex', 'flex-column', 'justify-content-center', 'w-50');
            card.appendChild(cardBody);
            
        } else {
            card.classList.add('card', 'p-2', 'd-flex');
            containerCard.appendChild(card);
            
            cardImg.classList.add('card-img');
            cardImg.style.height = '360px';

            if (contenedorCards.clientWidth < 480) {
                cardImg.style.height = '240px';
            }
            card.appendChild(cardImg);
    
            cardBody.classList.add('card-body', 'd-flex', 'flex-column', 'justify-content-center');
            card.appendChild(cardBody);
        }

        oferta.locales.forEach(function(local) {
            if (local.imagenes.length >= 1) {
                let img = document.createElement('img');
                img.src = local.imagenes[0].ruta_imagen + local.imagenes[0].nombre_imagen + "." + local.imagenes[0].formato_imagen;
                img.classList.add('rounded');
                img.style.width = '100%';
                img.style.height = '100%';
                img.style.objectFit = 'cover';
                cardImg.appendChild(img);
            } else {
                let imgVacia = document.createElement('img');
                imgVacia.src = '/img/noimage.jpg';
                imgVacia.classList.add('rounded');
                imgVacia.style.width = '100%';
                imgVacia.style.height = '100%';
                imgVacia.style.objectFit = 'cover';
                imgVacia.id = 'imagen_vacia';
                cardImg.appendChild(imgVacia);
            }    
        });

        let precio = document.createElement('h4');
        precio.textContent = oferta.precio_inm + '€';
        cardBody.appendChild(precio);

        let titulo = document.createElement('h5');
        titulo.textContent = oferta.titulo_oferta;
        cardBody.appendChild(titulo);

        let fecha = document.createElement('p');
        let fechaPublicacion = new Date(oferta.fecha_publicacion_oferta);
        let formattedFecha = 'Fecha de publicación: ' + fechaPublicacion.toLocaleDateString('es-ES');
        fecha.textContent = formattedFecha;
        cardBody.appendChild(fecha);

        let detallesBtn = document.createElement('button');
        detallesBtn.classList.add('btn', 'btn-secondary', 'align-self-start', 'mt-4');
        detallesBtn.textContent = 'Detalles';
        detallesBtn.onclick = function() {
            crear_modal_detalles(oferta);
        };
        cardBody.appendChild(detallesBtn);
    });
}


// Creación de las ventanas modales de detalles de ofertas
function crear_modal_detalles(oferta) {
    let container = document.createElement('div');
    container.classList.add('modal');
    container.id = 'modal_detalles'; 

    let contenedorModal = document.createElement('div');
    contenedorModal.classList.add('modal-dialog', 'modal-lg', 'modal-dialog-scrollable');
    container.appendChild(contenedorModal);

    let contenedorDetalles = document.createElement('div');
    contenedorDetalles.classList.add('modal-content');
    contenedorModal.appendChild(contenedorDetalles);

    let modalHeader = document.createElement('div');
    modalHeader.classList.add('modal-header');
    contenedorDetalles.appendChild(modalHeader);

    let buttonHeader = document.createElement('button');
    buttonHeader.classList.add('btn-close');
    buttonHeader.setAttribute('aria-label', 'Close');
    buttonHeader.addEventListener('click', function() {
        let modalElement = document.getElementById('modal_detalles');
        // Destruimos la ventana modal
        modalElement.remove();
    });
    modalHeader.appendChild(buttonHeader);

    let modalBody = document.createElement('div');
    modalBody.classList.add('modal-body', 'm-auto', 'p-auto');
    contenedorDetalles.appendChild(modalBody);

    let contenedorTextos = document.createElement('div');

    let contenedorImagenes = document.createElement('div');
    modalBody.appendChild(contenedorImagenes);

    let imagenVacia = document.getElementById('imagen_vacia');

    let contenedorCards = document.getElementById('contenedor_cards');
    if (contenedorCards.clientWidth > 992) {
        contenedorImagenes.style.width = '760px';
        contenedorImagenes.style.height = '640px';
    } else {
        contenedorImagenes.style.height = '360px';
    }

    oferta.locales.forEach(function(local) {
        if (local.imagenes.length > 1) {
            let carrusel = document.createElement('div');
            carrusel.classList.add('carousel', 'slide');
            carrusel.setAttribute('data-bs-ride', 'carousel');
            carrusel.id = 'carruselDetalles';
            contenedorImagenes.appendChild(carrusel);

            //Indicadores
            let indicadoresCarousel = document.createElement('div');
            indicadoresCarousel.classList.add('carousel-indicators');
            carrusel.appendChild(indicadoresCarousel);

            for (let i = 0; i < local.imagenes.length; i++) {
                let indicador = document.createElement('button');
                indicador.setAttribute('type', 'button');
                indicador.setAttribute('data-bs-target', '#carruselDetalles');
                indicador.setAttribute('data-bs-slide-to', i.toString());
                if (i == 0) {
                    indicador.classList.add('active');
                }
                indicadoresCarousel.appendChild(indicador);
            }

            //Flechas
            let flechasCarousel = document.createElement('div');
            flechasCarousel.classList.add('carousel-arrows');
            carrusel.appendChild(flechasCarousel);

            let flechaI = document.createElement('button');
            flechaI.setAttribute('type', 'button');
            flechaI.setAttribute('data-bs-target', '#carruselDetalles');
            flechaI.setAttribute('data-bs-slide', 'prev');
            flechaI.classList.add('carousel-control-prev');
            flechasCarousel.appendChild(flechaI);

            let prevI = document.createElement('span');
            prevI.classList.add('carousel-control-prev-icon');
            flechaI.appendChild(prevI);

            let flechaD = document.createElement('button');
            flechaD.setAttribute('type', 'button');
            flechaD.setAttribute('data-bs-target', '#carruselDetalles');
            flechaD.setAttribute('data-bs-slide', 'next');
            flechaD.classList.add('carousel-control-next');
            flechasCarousel.appendChild(flechaD);

            let nextD = document.createElement('span');
            nextD.classList.add('carousel-control-next-icon');
            flechaD.appendChild(nextD);

            //Imágenes
            let innerCarousel = document.createElement('div');
            innerCarousel.classList.add('carousel-inner');
            carrusel.appendChild(innerCarousel);

            for (let i = 0; i < local.imagenes.length; i++) {
                let itemCarousel = document.createElement('div');
                itemCarousel.classList.add('carousel-item');
                itemCarousel.id = ('item_carrusel');
                if (i == 0) {
                    itemCarousel.classList.add('active');
                }
                innerCarousel.appendChild(itemCarousel);

                if (contenedorCards.clientWidth > 992) {
                    itemCarousel.style.width = '760px';
                    itemCarousel.style.height = '640px';
                } else {
                    itemCarousel.style.height = '360px';
                }
    
                let imagenCarousel = document.createElement('img');
                imagenCarousel.src = local.imagenes[i].ruta_imagen + local.imagenes[i].nombre_imagen + "." + local.imagenes[i].formato_imagen;
                imagenCarousel.classList.add('rounded');
                imagenCarousel.style.width = '100%';
                imagenCarousel.style.height = '100%';
                imagenCarousel.style.objectFit = 'cover';
                itemCarousel.appendChild(imagenCarousel);
            }

        } else if (local.imagenes.length == 1) {
            local.imagenes.forEach(function(imagen) {
                let imagenDetalles = document.createElement('img');
                imagenDetalles.src = imagen.ruta_imagen + imagen.nombre_imagen + "." + imagen.formato_imagen;
                imagenDetalles.classList.add('rounded');
                imagenDetalles.style.width = '100%';
                imagenDetalles.style.height = '100%';
                imagenDetalles.style.objectFit = 'cover';
                contenedorImagenes.appendChild(imagenDetalles);
            });

        } else if (imagenVacia.getAttribute('src') == '/img/noimage.jpg') {
            let imagenVacia = document.createElement('img');
            imagenVacia.src = '/img/noimage.jpg';
            imagenVacia.classList.add('rounded');
            imagenVacia.style.width = '100%';
            imagenVacia.style.height = '100%';
            imagenVacia.style.objectFit = 'cover';
            contenedorImagenes.appendChild(imagenVacia);
        }

        contenedorTextos.classList.add('datos', 'pt-4');
        modalBody.appendChild(contenedorTextos);

        let precio = document.createElement('h4');
        precio.textContent = local.precio_inmueble + '€';
        contenedorTextos.appendChild(precio);
        
        let nombre = document.createElement('h5');
        nombre.textContent = local.nombre_local;
        contenedorTextos.appendChild(nombre);

        let metros = document.createElement('h6');
        metros.textContent = local.metros_cuadrados_inmueble + ' m2';
        contenedorTextos.appendChild(metros);
        
        let descripcion = document.createElement('p');
        descripcion.textContent = local.descripcion_inmueble;
        contenedorTextos.appendChild(descripcion);

        let direccion = document.createElement('p');
        direccion.textContent = 'Dirección: ' + local.direccion_inmueble;
        contenedorTextos.appendChild(direccion);
        
        let equipamiento = document.createElement('p');
        equipamiento.textContent = 'Equipamiento: ' + local.equipamiento_inmueble;
        contenedorTextos.appendChild(equipamiento);

        let distribucion = document.createElement('p');
        distribucion.textContent = 'Distribución: ' + local.distribucion_inmueble;
        contenedorTextos.appendChild(distribucion);
    });

    let condiciones = document.createElement('p');
    condiciones.textContent = 'Condiciones: ' + oferta.condiciones_oferta;
    contenedorTextos.appendChild(condiciones);

    let modalFooter = document.createElement('div');
    modalFooter.classList.add('modal-footer');
    contenedorDetalles.appendChild(modalFooter);

    let btnContactar = document.createElement("button");
    btnContactar.classList.add("btn", "btn-secondary");
    btnContactar.textContent = "Contactar";
    btnContactar.addEventListener("click", function() {
        if (sessionStorage.getItem('email')) {
            window.location.href = "#";
        } else {
            window.location.href = "/login";
        }
    });
    modalFooter.appendChild(btnContactar);

    document.body.appendChild(container);
    
    // Mostramos la ventana modal
    container.style.display = 'block';
}


// Creación de la barra de búsqueda
function crear_barra_buscar(ofertas) {
    let containerBuscar = document.getElementById('container_buscador');

    let inputBuscar = document.createElement('input');
    inputBuscar.classList.add('form-control');
    inputBuscar.setAttribute('type', 'text');
    inputBuscar.setAttribute('placeholder', 'Buscar');
    inputBuscar.id = 'inputBuscar';
    inputBuscar.addEventListener('input', function() {
        buscar_ofertas(ofertas, inputBuscar);
    });
    containerBuscar.appendChild(inputBuscar);
}


// Acción de buscar ofertas
function buscar_ofertas(ofertas, inputBuscar) {
    let terminoBusqueda = inputBuscar.value.trim().toLowerCase();
    
    let ofertasPaginadas = ofertas.filter(function(oferta) {
        return oferta.titulo_oferta.toLowerCase().includes(terminoBusqueda);
    });
    paginar_ofertas(ofertasPaginadas);
}


// Creación del botón de filtros
function crear_boton_filtros(ofertas) {
    let containerFiltrar = document.getElementById('container_boton_filtrar');

    let buttonFiltrar = document.createElement('button');
    buttonFiltrar.classList.add('btn', 'btn-secondary');
    buttonFiltrar.textContent = 'Filtrar';
    buttonFiltrar.onclick = function() {
        crear_modal_filtros(ofertas);
    }
    containerFiltrar.appendChild(buttonFiltrar);
}


// Creación de la ventana modal de filtros
function crear_modal_filtros(ofertas) {
    let container = document.createElement('div');
    container.classList.add('modal');
    container.id = 'modal_filtrado'; 

    let contenedorModal = document.createElement('div');
    contenedorModal.classList.add('modal-dialog', 'modal-sm', 'modal-dialog-scrollable');
    container.appendChild(contenedorModal);

    let contenedorFiltrado = document.createElement('div');
    contenedorFiltrado.classList.add('modal-content');
    contenedorModal.appendChild(contenedorFiltrado);

    let modalHeader = document.createElement('div');
    modalHeader.classList.add('modal-header');
    contenedorFiltrado.appendChild(modalHeader);

    let buttonHeader = document.createElement('button');
    buttonHeader.classList.add('btn-close');
    buttonHeader.setAttribute('data-bs-dismiss', 'modal');
    modalHeader.appendChild(buttonHeader);

    let filtrado = document.createElement('div');
    filtrado.classList.add('modal-body', 'm-auto', 'p-auto');
    contenedorFiltrado.appendChild(filtrado);

    llenar_filtros(ofertas, filtrado);

    let modalFooter = document.createElement('div');
    modalFooter.classList.add('modal-footer');
    contenedorFiltrado.appendChild(modalFooter);

    let buttonFooterL = document.createElement('button');
    buttonFooterL.classList.add('btn', 'btn-secondary');
    buttonFooterL.textContent = 'Limpiar';
    buttonFooterL.id = 'boton_limpiar'
    buttonFooterL.onclick = function() {
        let checkboxes = document.querySelectorAll('#modal_filtrado input[type="checkbox"]');
        checkboxes.forEach(function(checkbox) {
            checkbox.checked = false;
        });
    };
    modalFooter.appendChild(buttonFooterL);

    let buttonFooterA = document.createElement('button');
    buttonFooterA.classList.add('btn', 'btn-secondary');
    buttonFooterA.textContent = 'Aplicar';
    buttonFooterA.onclick = function() {
        aplicar_filtros(ofertas);
    };
    modalFooter.appendChild(buttonFooterA);

    document.body.appendChild(container);
    
    // Mostramos la ventana modal
    $('#modal_filtrado').modal('show');
}


// Creación de la card de filtros
function crear_card_filtros(ofertas) {
    let container = document.getElementById('filtros_card');

    let containerCard = document.createElement('div');
    containerCard.classList.add('p-2');
    container.appendChild(containerCard);

    let filtrado = document.createElement('div');
    filtrado.classList.add('card', 'p-2', 'd-flex');
    containerCard.appendChild(filtrado);

    llenar_filtros(ofertas, filtrado);

    let divBotones = document.createElement('div');
    divBotones.classList.add('d-flex', 'justify-content-end', 'gap-2', 'mt-4');
    filtrado.appendChild(divBotones);

    let filtrosBtnL = document.createElement('button');
    filtrosBtnL.classList.add('btn', 'btn-secondary');
    filtrosBtnL.textContent = 'Limpiar';
    filtrosBtnL.onclick = function() {
        let checkboxes = document.querySelectorAll('#filtros_card input[type="checkbox"]');
        checkboxes.forEach(function(checkbox) {
            checkbox.checked = false;
        });
    };
    divBotones.appendChild(filtrosBtnL);

    let filtrosBtnA = document.createElement('button');
    filtrosBtnA.classList.add('btn', 'btn-secondary');
    filtrosBtnA.textContent = 'Aplicar';
    filtrosBtnA.onclick = function() {
        aplicar_filtros_card(ofertas);
    };
    divBotones.appendChild(filtrosBtnA);
}


// Acción de poblar la ventana modal y la card de filtros
function llenar_filtros(ofertas, filtrado) {
    let tituloM = document.createElement('h5');
    tituloM.textContent = 'Municipios:';
    filtrado.appendChild(tituloM);

    let nombre_municipio = new Set();

    ofertas.forEach(function(oferta) {
        oferta.locales.forEach(function(local) {
            local.municipios.forEach(function(municipio) {
                if (!nombre_municipio.has(municipio.nombre_municipio)) {
                    let formcheckM = document.createElement('div');
                    formcheckM.classList.add('form-check');
                    filtrado.appendChild(formcheckM);

                    let checkboxM = document.createElement('input');
                    checkboxM.classList.add('checkbox_municipio', 'form-check-input');
                    checkboxM.type = 'checkbox';
                    formcheckM.appendChild(checkboxM);

                    let labelM = document.createElement('label');
                    labelM.classList.add('label_municipio', 'form-check-label');
                    labelM.setAttribute("for", "checkbox_municipio");
                    labelM.textContent = municipio.nombre_municipio;
                    labelM.value = municipio.nombre_municipio;
                    formcheckM.appendChild(labelM);

                    nombre_municipio.add(municipio.nombre_municipio);
                }
            });
        });
    });

    let tituloE = document.createElement('h5');
    tituloE.textContent = 'Estado:';
    filtrado.appendChild(tituloE);

    let nombre_estado = new Set();

    ofertas.forEach(function(oferta) {
        oferta.locales.forEach(function(local) {
            local.estados.forEach(function(estado) {
                if (!nombre_estado.has(estado.estado)) {
                    let formcheckE = document.createElement('div');
                    formcheckE.classList.add('form-check');
                    filtrado.appendChild(formcheckE);

                    let checkboxE = document.createElement('input');
                    checkboxE.classList.add('checkbox_estado', 'form-check-input');
                    checkboxE.type = 'checkbox';
                    formcheckE.appendChild(checkboxE);

                    let labelE = document.createElement('label');
                    labelE.classList.add('label_estado', 'form-check-label');
                    labelE.setAttribute("for", "checkbox_estado");
                    labelE.textContent = estado.estado;
                    labelE.value = estado.estado;
                    formcheckE.appendChild(labelE);

                    nombre_estado.add(estado.estado);
                }
            });
        });
    });
}


// Acción de aplicar los filtros
function aplicar_filtros(ofertas) {
    let checkboxesMunicipio = document.querySelectorAll('#modal_filtrado .checkbox_municipio:checked');
    let checkboxesEstado = document.querySelectorAll('#modal_filtrado .checkbox_estado:checked');

    let municipiosSeleccionados = obtenerValoresSeleccionados(checkboxesMunicipio);
    let estadosSeleccionados = obtenerValoresSeleccionados(checkboxesEstado);

    let ofertasFiltradas = filtrarOfertas(ofertas, municipiosSeleccionados, estadosSeleccionados);

    paginar_ofertas(ofertasFiltradas);

    $('#modal_filtrado').modal('hide');
}


// Acción de obtener los valores seleccionados en los checkboxes
function obtenerValoresSeleccionados(checkboxes) {
    return Array.from(checkboxes).map(function(checkbox) {
        return checkbox.nextElementSibling.textContent.trim();
    });
}


// Acción de filtrar las ofertas
function filtrarOfertas(ofertas, municipiosSeleccionados, estadosSeleccionados) {
    return ofertas.filter(function(oferta) {
    // filter() crea un array nuevo con los elementos que cumplen la condición que establece la función oferta
        return oferta.locales.some(function(local) {
        // some() verifica si al menos un elemento del array locales cumple la condición que establece la función local
            let incluirMunicipio = municipiosSeleccionados.length == 0 ||
                municipiosSeleccionados.includes(local.municipios[0].nombre_municipio);

            let incluirEstado = estadosSeleccionados.length == 0 ||
                local.estados.some(function(estado) {
                    return estadosSeleccionados.includes(estado.estado);
                });

            return incluirMunicipio && incluirEstado;
        });
    });
}


// Acción de aplicar los filtros en la card de filtros
function aplicar_filtros_card(ofertas) {
    let checkboxesMunicipio = document.querySelectorAll('#filtros_card .checkbox_municipio:checked');
    let checkboxesEstado = document.querySelectorAll('#filtros_card .checkbox_estado:checked');

    let municipiosSeleccionados = obtenerValoresSeleccionados(checkboxesMunicipio);
    let estadosSeleccionados = obtenerValoresSeleccionados(checkboxesEstado);

    let ofertasFiltradas = filtrarOfertas(ofertas, municipiosSeleccionados, estadosSeleccionados);

    paginar_ofertas(ofertasFiltradas);
}


// Creación de los botones de ordenación (precio y fecha)
function crear_botones_ordenar(ofertas) {
    let containerOrdenar = document.getElementById('container_botones_ordenar');

    let buttonPrecio = document.createElement('button');
    buttonPrecio.classList.add('btn', 'btn-secondary');
    buttonPrecio.textContent = 'Precio ↑↓';
    buttonPrecio.id = 'ordenarPrecioBtn';
    buttonPrecio.onclick = function() {
        ordenar_ofertas_precio(ofertas);
        let buttonFecha = document.getElementById('ordenarFechaBtn');
        buttonFecha.textContent = 'Fecha ↑↓';
        let inputBuscar = document.getElementById('inputBuscar');
        inputBuscar.value = '';
    }
    containerOrdenar.appendChild(buttonPrecio);

    let buttonFecha = document.createElement('button');
    buttonFecha.classList.add('btn', 'btn-secondary');
    buttonFecha.textContent = 'Fecha ↑↓';
    buttonFecha.id = 'ordenarFechaBtn';
    buttonFecha.onclick = function() {
        ordenar_ofertas_fecha(ofertas);
        let buttonPrecio = document.getElementById('ordenarPrecioBtn');
        buttonPrecio.textContent = 'Precio ↑↓';
        let inputBuscar = document.getElementById('inputBuscar');
        inputBuscar.value = '';
    }
    containerOrdenar.appendChild(buttonFecha);
}


let ordenPrecio = true;
// Acción de ordenar según el precio
function ordenar_ofertas_precio(ofertas) {
    let ordenarBtn = document.getElementById('ordenarPrecioBtn');
    if (ordenPrecio) {
        ordenPrecio = false;
        ordenarBtn.textContent = 'Precio ↑';
        ofertas.sort(function(a, b) {
            return a.precio_inm - b.precio_inm;
        });
    } else {
        ordenPrecio = true;
        ordenarBtn.textContent = 'Precio ↓';
        ofertas.sort(function(a, b) {
            return b.precio_inm - a.precio_inm;
        });
    }
    paginar_ofertas(ofertas);
}


let ordenFecha = true;
// Acción de ordenar según la fecha 
function ordenar_ofertas_fecha(ofertas) {
    let ordenarBtn = document.getElementById('ordenarFechaBtn');
    if (ordenFecha) {
        ofertas.sort(function(a, b) {
            ordenFecha = false;
            ordenarBtn.textContent = 'Fecha ↑';
            const dateA = new Date(a.fecha_publicacion_oferta);
            const dateB = new Date(b.fecha_publicacion_oferta);
            return dateA - dateB;
        });
    } else {
        ofertas.sort(function(a, b) {
            ordenFecha = true;
            ordenarBtn.textContent = 'Fecha ↓';
            const dateA = new Date(a.fecha_publicacion_oferta);
            const dateB = new Date(b.fecha_publicacion_oferta);
            return dateB - dateA;
        });
    }   

    paginar_ofertas(ofertas);
}


let pagina_actual = 1;
let ofertas_por_pagina = 3;
// Creación de los botones de paginación
function crear_botones_paginar(ofertas) {
    let paginas_totales = Math.ceil(ofertas.length / ofertas_por_pagina);

    let containerPaginar = document.getElementById('contenedor_paginacion');

    containerPaginar.innerHTML = '';

    for (let i = 1; i <= paginas_totales; i++) {
        
        if (paginas_totales > 1) {
            let button = document.createElement('button');
            button.textContent = i;
            button.classList.add('btn', 'btn-secondary');
            
            if (i == pagina_actual) {
                button.classList.add('active');
            }
            button.onclick = function() {
                pagina_actual = parseInt(this.textContent);
                mostrar_pagina(ofertas, pagina_actual);
                let buttons = containerPaginar.getElementsByTagName('button');
                
                for (let j = 0; j < buttons.length; j++) {
                    buttons[j].classList.remove('active');
                }
                this.classList.add('active');
            };   
            containerPaginar.appendChild(button);
        }
    }
}


// Acción de mostrar las páginas
function mostrar_pagina(ofertas, numero_pagina) {
    let comienzo = (numero_pagina - 1) * ofertas_por_pagina;
    
    let final = comienzo + ofertas_por_pagina;
    
    let ofertas_paginadas = ofertas.slice(comienzo, final);

    crear_card_oferta(ofertas_paginadas);
}


function paginar_ofertas(ofertas) {
    mostrar_pagina(ofertas, pagina_actual);
    
    crear_botones_paginar(ofertas);
}


//***********************************************************************************


/*       FUNCION PARA MANTENER LA OPCION EN EL SELECT OPTION */
function mantener_add() {
    var select = document.getElementById("opcion_añadir");
    select.value="";
}
/*       FUNCION PARA SELECCIONAR Y ABRIR MODAL DE LO QUE QUIERES AÑADIR */
function selectOption(valor, municipios) {
    var municipiosJSON = JSON.stringify({ "municipio": municipios });
    var nombre_municipio = JSON.parse(municipiosJSON);

    var addtype = valor.value;

    if (addtype == "Negocio") {
        var comprobar = document.getElementById("miVentanaModal");
        if(comprobar){
            comprobar.remove();
        }
        var miVentanaModal = document.createElement('div');
        miVentanaModal.classList.add("modal", "fade");
        miVentanaModal.setAttribute("id", "miVentanaModal");
        miVentanaModal.setAttribute("tabindex", "-1");
        miVentanaModal.setAttribute("aria-labelledby", "miVentanaModalLabel");
        miVentanaModal.setAttribute("aria-hidden", "true");                        
        // Agregar la ventana modal al final del cuerpo del documento
        document.body.appendChild(miVentanaModal);

        var modalDialog = document.createElement("div");
        modalDialog.classList.add("modal-dialog");
        modalDialog.classList.add("modal-dialog-centered");
        modalDialog.classList.add("modal-lg");
        miVentanaModal.appendChild(modalDialog);


        var modalContent = document.createElement("div");
        modalContent.classList.add("modal-content");
        modalDialog.appendChild(modalContent);

        // Cabecera de la ventana modal
        var modalHeader = document.createElement("div");
        modalHeader.classList.add("modal-header");
        modalContent.appendChild(modalHeader);

        var modalTitle = document.createElement("h5");
        modalTitle.classList.add("modal-title");
        modalTitle.setAttribute("id", "miVentanaModalLabel");
        modalTitle.innerText = "DATOS NEGOCIO";
        modalHeader.appendChild(modalTitle);

        var closeButton = document.createElement("button");
        closeButton.setAttribute("type", "button");
        closeButton.classList.add("btn-close");
        closeButton.setAttribute("data-bs-dismiss", "modal");
        closeButton.setAttribute("aria-label", "Close");
        modalHeader.appendChild(closeButton);

        // Cuerpo de la ventana modal
        var modalBody = document.createElement("div");
        modalBody.classList.add("modal-body");
        modalContent.appendChild(modalBody);

        //INTRODUCIR FORMULARIO QUE VA A IR EN EL BODY DE LA VENTANA MODAL
        var formulario = document.createElement("form");
        formulario.action = "oferta/insertnegocio";
        formulario.method = "POST";
        formulario.classList.add("needs-validation");
        formulario.setAttribute("id","formulario_add_negocio");
        modalBody.appendChild(formulario);

        //DIV QUE VA A CONTENER LA INFORMACION DEL FORMULARIO FILA1
        var div_row1 = document.createElement("div");
        div_row1.classList.add("row");
        div_row1.classList.add("form-row");
        formulario.appendChild(div_row1);

        //AGRUPAR INPUTS + LABEL 1
        var form_grup1 = document.createElement("div");
        form_grup1.classList.add("form-group");
        form_grup1.classList.add("col-md-4");
        form_grup1.classList.add("d-flex");
        form_grup1.classList.add("align-items-start");
        form_grup1.classList.add("flex-column");
        div_row1.appendChild(form_grup1);

        //CAMPO 1
        var label_title_negocio = document.createElement("label");
        label_title_negocio.setAttribute("for","title_negocio");
        label_title_negocio.innerText="Nombre:";
        form_grup1.appendChild(label_title_negocio);
        //
        var input_title_negocio = document.createElement("input");
        input_title_negocio.setAttribute("type","text");
        input_title_negocio.setAttribute("id", "title_negocio");
        input_title_negocio.setAttribute("name", "title_negocio");
        input_title_negocio.required = true;
        input_title_negocio.classList.add("form-control");
        form_grup1.appendChild(input_title_negocio);

        //AGRUPAR INPUTS + LABEL 2
        var form_grup2 = document.createElement("div");
        form_grup2.classList.add("form-group");
        form_grup2.classList.add("col-md-4");
        form_grup2.classList.add("d-flex");
        form_grup2.classList.add("align-items-start");
        form_grup2.classList.add("flex-column");
        div_row1.appendChild(form_grup2);

        //CAMPO 2
        var label_coste_traspaso_negocio = document.createElement("label");
        label_coste_traspaso_negocio.setAttribute("for","coste_traspaso_negocio");
        label_coste_traspaso_negocio.innerText="Coste traspaso (sin iva):";
        form_grup2.appendChild(label_coste_traspaso_negocio);
        //
        var input_coste_traspaso_negocio = document.createElement("input");
        input_coste_traspaso_negocio.setAttribute("type","number");
        input_coste_traspaso_negocio.setAttribute("id", "coste_traspaso_negocio");
        input_coste_traspaso_negocio.setAttribute("name", "coste_traspaso_negocio");
        input_coste_traspaso_negocio.required = true;
        input_coste_traspaso_negocio.setAttribute("placeholder", "€");
        input_coste_traspaso_negocio.classList.add("form-control");
        form_grup2.appendChild(input_coste_traspaso_negocio);

        //AGRUPAR INPUTS + LABEL 3
        var form_grup3 = document.createElement("div");
        form_grup3.classList.add("form-group");
        form_grup3.classList.add("col-md-4");
        form_grup3.classList.add("d-flex");
        form_grup3.classList.add("align-items-start");
        form_grup3.classList.add("flex-column");
        div_row1.appendChild(form_grup3);

        //CAMPO 3
        var label_coste_mensual_negocio = document.createElement("label");
        label_coste_mensual_negocio.setAttribute("for","coste_mensual_negocio");
        label_coste_mensual_negocio.innerText="Coste mensual (opcional)";
        form_grup3.appendChild(label_coste_mensual_negocio);
        //
        var input_coste_mensual_negocio = document.createElement("input");
        input_coste_mensual_negocio.setAttribute("type","number");
        input_coste_mensual_negocio.setAttribute("id", "coste_mensual_negocio");
        input_coste_mensual_negocio.setAttribute("name", "coste_mensual_negocio");
        input_coste_mensual_negocio.setAttribute("placeholder", "€");
        input_coste_mensual_negocio.classList.add("form-control");
        form_grup3.appendChild(input_coste_mensual_negocio);

        //AGRUPAR INPUTS + LABEL MOTIVO TRASPASO
        var form_grup_motivo_traspaso = document.createElement("div");
        form_grup_motivo_traspaso.classList.add("form-group");
        form_grup_motivo_traspaso.classList.add("col-xl-6");
        form_grup_motivo_traspaso.classList.add("d-flex");
        form_grup_motivo_traspaso.classList.add("align-items-start");
        form_grup_motivo_traspaso.classList.add("flex-column");
        div_row1.appendChild(form_grup_motivo_traspaso);

        //CAMPO MOTIVO TRASPASO
        var label_motivo_traspaso_negocio = document.createElement("label");
        label_motivo_traspaso_negocio.setAttribute("for","motivo_traspaso_negocio");
        label_motivo_traspaso_negocio.innerText="Motivo de traspaso:";
        form_grup_motivo_traspaso.appendChild(label_motivo_traspaso_negocio);
        //
        var input_motivo_traspaso_negocio = document.createElement("textarea");
        input_motivo_traspaso_negocio.required = true;
        input_motivo_traspaso_negocio.setAttribute("name","motivo_traspaso_negocio");
        input_motivo_traspaso_negocio.setAttribute("id", "motivo_traspaso_negocio");
        input_motivo_traspaso_negocio.setAttribute("cols", "32");
        input_motivo_traspaso_negocio.setAttribute("rows", "3");

        form_grup_motivo_traspaso.appendChild(input_motivo_traspaso_negocio);

        //AGRUPAR INPUTS + LABEL DESCRIPCION NEGOCIO
        var form_grup_descripcion = document.createElement("div");
        form_grup_descripcion.classList.add("form-group");
        form_grup_descripcion.classList.add("col-xl-6");
        form_grup_descripcion.classList.add("d-flex");
        form_grup_descripcion.classList.add("align-items-start");
        form_grup_descripcion.classList.add("flex-column");
        div_row1.appendChild(form_grup_descripcion);

        //CAMPO DESCRIPCION NEGOCIO
        var label_descripcion_negocio = document.createElement("label");
        label_descripcion_negocio.setAttribute("for","descripcion_negocio");
        label_descripcion_negocio.innerText="Descripcion negocio (opcional)";
        form_grup_descripcion.appendChild(label_descripcion_negocio);
        //
        var input_descripcion_negocio = document.createElement("textarea");
        input_descripcion_negocio.setAttribute("name","descripcion_negocio");
        input_descripcion_negocio.setAttribute("id", "descripcion_negocio");
        input_descripcion_negocio.setAttribute("cols", "32");
        input_descripcion_negocio.setAttribute("rows", "3");

        form_grup_descripcion.appendChild(input_descripcion_negocio);
        
        //DIV QUE VA A CONTENER LA INFORMACION DEL FORMULARIO FILA2
        var div_row2 = document.createElement("div");
        div_row2.classList.add("row");
        div_row2.classList.add("form-row");
        formulario.appendChild(div_row2);

        //AGRUPAR CENTRAR INICIO DATOS LOCAL
        var form_grup3 = document.createElement("div");
        form_grup3.classList.add("form-group");
        form_grup3.classList.add("col-md-12");
        form_grup3.classList.add("d-flex");
        form_grup3.classList.add("align-items-start");
        form_grup3.classList.add("flex-column");
        div_row2.appendChild(form_grup3);

        //INICIO LOCAL
        var h_local = document.createElement("h5");
        h_local.classList.add("pt-2");
        h_local.innerText = "DATOS DEL LOCAL ASOCIADO";
        form_grup3.appendChild(h_local);
        
        //DIV QUE VA A CONTENER LA INFORMACION DEL FORMULARIO FILA3
        var div_row3 = document.createElement("div");
        div_row3.classList.add("row");
        div_row3.classList.add("form-row");
        formulario.appendChild(div_row3);

        //AGRUPAR INPUTS + LABEL 4
        var form_grup4 = document.createElement("div");
        form_grup4.classList.add("form-group");
        form_grup4.classList.add("col-md-4");
        form_grup4.classList.add("d-flex");
        form_grup4.classList.add("align-items-start");
        form_grup4.classList.add("flex-column");
        div_row3.appendChild(form_grup4);

        //CAMPO 4
        var label_nombre_local = document.createElement("label");
        label_nombre_local.setAttribute("for","nombre_local");
        label_nombre_local.innerText="Titulo local:";
        form_grup4.appendChild(label_nombre_local);
        //
        var input_nombre_local = document.createElement("input");
        input_nombre_local.setAttribute("type","text");
        input_nombre_local.setAttribute("id", "nombre_local");
        input_nombre_local.setAttribute("name", "nombre_local");
        input_nombre_local.setAttribute.required = true;
        input_nombre_local.classList.add("form-control");
        form_grup4.appendChild(input_nombre_local);

        //AGRUPAR INPUTS + LABEL 5
        var form_grup5 = document.createElement("div");
        form_grup5.classList.add("form-group");
        form_grup5.classList.add("col-md-4");
        form_grup5.classList.add("d-flex");
        form_grup5.classList.add("align-items-start");
        form_grup5.classList.add("flex-column");
        div_row3.appendChild(form_grup5);

        //CAMPO 5
        var label_metros_cuadrados = document.createElement("label");
        label_metros_cuadrados.setAttribute("for","metros_cuadrados");
        label_metros_cuadrados.innerText = "Metros²";
        form_grup5.appendChild(label_metros_cuadrados);
        //
        var input_metros_cuadrados = document.createElement("input");
        input_metros_cuadrados.setAttribute("type","number");
        input_metros_cuadrados.setAttribute("id", "metros_cuadrados");
        input_metros_cuadrados.setAttribute("name", "metros_cuadrados");
        input_metros_cuadrados.setAttribute.required = true;
        input_metros_cuadrados.classList.add("form-control");
        form_grup5.appendChild(input_metros_cuadrados);

        //AGRUPAR INPUTS + LABEL 6
        var form_grup6 = document.createElement("div");
        form_grup6.classList.add("form-group");
        form_grup6.classList.add("col-md-4");
        form_grup6.classList.add("d-flex");
        form_grup6.classList.add("align-items-start");
        form_grup6.classList.add("flex-column");
        div_row3.appendChild(form_grup6);

        //CAMPO 6
        var label_precio_inmueble = document.createElement("label");
        label_precio_inmueble.setAttribute("for","precio_inmueble");
        label_precio_inmueble.innerText = "Precio alquiler:";
        form_grup6.appendChild(label_precio_inmueble);
        //
        var input_precio_alquiler_inmueble = document.createElement("input");
        input_precio_alquiler_inmueble.setAttribute("type","number");
        input_precio_alquiler_inmueble.setAttribute("id", "precio_alquiler_inmueble");
        input_precio_alquiler_inmueble.setAttribute("name", "precio_alquiler_inmueble");
        input_precio_alquiler_inmueble.setAttribute("placeholder", "€");
        input_precio_alquiler_inmueble.required = true;
        input_precio_alquiler_inmueble.classList.add("form-control");
        form_grup6.appendChild(input_precio_alquiler_inmueble);

        //DIV QUE VA A CONTENER LA INFORMACION DEL FORMULARIO FILA4
        var div_row4 = document.createElement("div");
        div_row4.classList.add("row");
        div_row4.classList.add("form-row");
        formulario.appendChild(div_row4);

        //AGRUPAR INPUTS + LABEL 7
        var form_grup7 = document.createElement("div");
        form_grup7.classList.add("form-group");
        form_grup7.classList.add("col-md-4");
        form_grup7.classList.add("d-flex");
        form_grup7.classList.add("align-items-start");
        form_grup7.classList.add("flex-column");
        div_row4.appendChild(form_grup7);

        //CAMPO 7
        var label_direccion_inmueble = document.createElement("label");
        label_direccion_inmueble.setAttribute("for","direccion_inmueble");
        label_direccion_inmueble.innerText = "Direccion:";
        form_grup7.appendChild(label_direccion_inmueble);
        //
        var input_direccion_inmueble = document.createElement("input");
        input_direccion_inmueble.setAttribute("type","text");
        input_direccion_inmueble.setAttribute("id", "direccion_inmueble");
        input_direccion_inmueble.setAttribute("name", "direccion_inmueble");
        input_direccion_inmueble.required = true;
        input_direccion_inmueble.classList.add("form-control");
        form_grup7.appendChild(input_direccion_inmueble);

        //AGRUPAR INPUTS + LABEL 8
        var form_grup8 = document.createElement("div");
        form_grup8.classList.add("form-group");
        form_grup8.classList.add("col-md-4");
        form_grup8.classList.add("d-flex");
        form_grup8.classList.add("align-items-start");
        form_grup8.classList.add("flex-column");
        div_row4.appendChild(form_grup8);

        //CAMPO 8
        var label_distribucion_inmueble = document.createElement("label");
        label_distribucion_inmueble.setAttribute("for","distribucion_inmueble");
        label_distribucion_inmueble.innerText = "Distribucion:";
        form_grup8.appendChild(label_distribucion_inmueble);
        //
        var input_distribucion_inmueble = document.createElement("textarea");
        input_distribucion_inmueble.setAttribute("id", "distribucion_inmueble");
        input_distribucion_inmueble.setAttribute("name", "distribucion_inmueble");
        input_distribucion_inmueble.required = true;
        input_distribucion_inmueble.setAttribute("rows", "3");
        input_distribucion_inmueble.classList.add("form-control");
        form_grup8.appendChild(input_distribucion_inmueble);

        //AGRUPAR INPUTS + LABEL 9
        var form_grup9 = document.createElement("div");
        form_grup9.classList.add("form-group");
        form_grup9.classList.add("col-md-4");
        form_grup9.classList.add("d-flex");
        form_grup9.classList.add("align-items-start");
        form_grup9.classList.add("flex-column");
        div_row4.appendChild(form_grup9);

        //CAMPO 9
        var label_equipamiento_inmueble = document.createElement("label");
        label_equipamiento_inmueble.setAttribute("for","Equipamiento_inmueble");
        label_equipamiento_inmueble.innerText = "Equipamiento:";
        form_grup9.appendChild(label_equipamiento_inmueble);
        //
        var input_equipamiento_inmueble = document.createElement("textarea");
        input_equipamiento_inmueble.setAttribute("id", "equipamiento_inmueble");
        input_equipamiento_inmueble.required = true;
        input_equipamiento_inmueble.setAttribute("name", "equipamiento_inmueble");
        input_equipamiento_inmueble.setAttribute("rows", "3");
        input_equipamiento_inmueble.classList.add("form-control");
        form_grup9.appendChild(input_equipamiento_inmueble);

        //DIV QUE VA A CONTENER LA INFORMACION DEL FORMULARIO FILA5
        var div_row5 = document.createElement("div");
        div_row5.classList.add("row");
        div_row5.classList.add("form-row");
        formulario.appendChild(div_row5);

        //AGRUPAR INPUTS + LABEL 10
        var form_grup10 = document.createElement("div");
        form_grup10.classList.add("form-group");
        form_grup10.classList.add("col-xl-4");
        form_grup10.classList.add("d-flex");
        form_grup10.classList.add("align-items-start");
        form_grup10.classList.add("flex-column");
        div_row5.appendChild(form_grup10);
        
        var label_municipio = document.createElement("label");
        label_municipio.setAttribute("for","input_municipio");
        label_municipio.innerText = "Ubicacion (municipio):";
        form_grup10.appendChild(label_municipio);

        var select_column = document.createElement("div");
        select_column.classList.add("col-auto"); 
        form_grup10.appendChild(select_column);

        var input_municipio = document.createElement("select");
        input_municipio.setAttribute("id", "input_municipio");
        input_municipio.setAttribute("name", "input_municipio");
        input_municipio.classList.add("form-select"); 
        input_municipio.setAttribute("aria-label", "Default select example"); 
        input_municipio.required = true;
        form_grup10.appendChild(input_municipio);

        nombre_municipio.municipio.forEach(function(element) {
            var option = document.createElement("option");
            option.setAttribute("value",element);
            option.innerHTML = element;
            input_municipio.appendChild(option);
        });
        

        //AGRUPAR INPUTS + LABEL 11
        var form_grup11 = document.createElement("div");
        form_grup11.classList.add("form-group");
        form_grup11.classList.add("col-xl-4");
        form_grup11.classList.add("d-flex");
        form_grup11.classList.add("align-items-start");
        form_grup11.classList.add("flex-column");
        div_row5.appendChild(form_grup11);
        
        var label_estado = document.createElement("label");
        label_estado.setAttribute("for","input_estado");
        label_estado.innerText = "Estado:";
        form_grup11.appendChild(label_estado);

        var select_column = document.createElement("div");
        select_column.classList.add("col-auto"); 
        form_grup10.appendChild(select_column);

        //SELECT E INPUT ESTADO
        var select_estado = document.createElement("select");
        select_estado.setAttribute("id", "input_estado");
        select_estado.setAttribute("name", "input_estado");
        select_estado.classList.add("form-select"); 
        select_estado.setAttribute("aria-label", "Default select example"); 
        select_estado.required = true;
        form_grup11.appendChild(select_estado);

        var option_como_nuevo = document.createElement("option")
        option_como_nuevo.setAttribute("value", "Casi nuevo");
        option_como_nuevo.innerHTML="Casi nuevo";
        select_estado.appendChild(option_como_nuevo);

        var option_como_nuevo = document.createElement("option")
        option_como_nuevo.setAttribute("value", "Muy bien");
        option_como_nuevo.innerHTML="Muy bien";
        select_estado.appendChild(option_como_nuevo);

        var option_como_nuevo = document.createElement("option")
        option_como_nuevo.setAttribute("value", "Bien");
        option_como_nuevo.innerHTML="Bien";
        select_estado.appendChild(option_como_nuevo);

        var option_como_nuevo = document.createElement("option")
        option_como_nuevo.setAttribute("value", "Reformado");
        option_como_nuevo.innerHTML="Reformado";
        select_estado.appendChild(option_como_nuevo);

        // Pie de la ventana modal
        var modalFooter = document.createElement("div");
        modalFooter.classList.add("modal-footer");
        modalContent.appendChild(modalFooter);

        var closeButtonFooter = document.createElement("button");
        closeButtonFooter.setAttribute("type", "button");
        closeButtonFooter.classList.add("btn", "btn-secondary",  "mt-5", "float-end", "ms-2");
        closeButtonFooter.setAttribute("data-bs-dismiss", "modal");
        closeButtonFooter.innerText = "Cerrar";
       formulario.appendChild(closeButtonFooter);

        var saveButton = document.createElement("input");
        saveButton.type = "submit";
        saveButton.classList.add("btn", "btn-primary", "mt-5", "float-end");
        saveButton.value = "Insertar";
        formulario.appendChild(saveButton);

        // Obtener la referencia a la ventana modal
        var ventanaModal = new bootstrap.Modal(document.getElementById("miVentanaModal"));

        // Abrir la ventana modal
        ventanaModal.show();
        
    }
    //LOCAL
    if (addtype == "Local") {
        var comprobar = document.getElementById("miVentanaModal");
        if(comprobar){
            comprobar.remove();
        }
        var miVentanaModal = document.createElement('div');
        miVentanaModal.classList.add("modal", "fade");
        miVentanaModal.setAttribute("id", "miVentanaModal");
        miVentanaModal.setAttribute("tabindex", "-1");
        miVentanaModal.setAttribute("aria-labelledby", "miVentanaModalLabel");
        miVentanaModal.setAttribute("aria-hidden", "true");                        
        // Agregar la ventana modal al final del cuerpo del documento
        document.body.appendChild(miVentanaModal);

        var modalDialog = document.createElement("div");
        modalDialog.classList.add("modal-dialog");
        modalDialog.classList.add("modal-dialog-centered");
        modalDialog.classList.add("modal-lg");
        miVentanaModal.appendChild(modalDialog);


        var modalContent = document.createElement("div");
        modalContent.classList.add("modal-content");
        modalDialog.appendChild(modalContent);

        // Cabecera de la ventana modal
        var modalHeader = document.createElement("div");
        modalHeader.classList.add("modal-header");
        modalContent.appendChild(modalHeader);

        var modalTitle = document.createElement("h5");
        modalTitle.classList.add("modal-title");
        modalTitle.setAttribute("id", "miVentanaModalLabel");
        modalTitle.innerText = "DATOS LOCAL";
        modalHeader.appendChild(modalTitle);

        var closeButton = document.createElement("button");
        closeButton.setAttribute("type", "button");
        closeButton.classList.add("btn-close");
        closeButton.setAttribute("data-bs-dismiss", "modal");
        closeButton.setAttribute("aria-label", "Close");
        modalHeader.appendChild(closeButton);

        // Cuerpo de la ventana modal
        var modalBody = document.createElement("div");
        modalBody.classList.add("modal-body");
        modalContent.appendChild(modalBody);

        //INTRODUCIR FORMULARIO QUE VA A IR EN EL BODY DE LA VENTANA MODAL
        var formulario = document.createElement("form");
        formulario.setAttribute("action","<?php RUTA_URL?>/oferta");
        formulario.setAttribute("method","POST");
        formulario.classList.add("needs-validation");
        formulario.setAttribute("id","formulario_add_negocio");
        modalBody.appendChild(formulario);

        //DIV QUE VA A CONTENER LA INFORMACION DEL FORMULARIO FILA1
        var div_row3 = document.createElement("div");
        div_row3.classList.add("row");
        div_row3.classList.add("form-row");
        formulario.appendChild(div_row3);

        //AGRUPAR INPUTS + LABEL 4
        var form_grup4 = document.createElement("div");
        form_grup4.classList.add("form-group");
        form_grup4.classList.add("col-md-4");
        form_grup4.classList.add("d-flex");
        form_grup4.classList.add("align-items-start");
        form_grup4.classList.add("flex-column");
        div_row3.appendChild(form_grup4);

        //CAMPO 4
        var label_nombre_local = document.createElement("label");
        label_nombre_local.setAttribute("for","nombre_local");
        label_nombre_local.innerText="Titulo local:";
        form_grup4.appendChild(label_nombre_local);
        //
        var input_nombre_local = document.createElement("input");
        input_nombre_local.setAttribute("type","text");
        input_nombre_local.setAttribute("id", "nombre_local");
        input_nombre_local.classList.add("form-control");
        form_grup4.appendChild(input_nombre_local);

        //AGRUPAR INPUTS + LABEL 5
        var form_grup5 = document.createElement("div");
        form_grup5.classList.add("form-group");
        form_grup5.classList.add("col-md-4");
        form_grup5.classList.add("d-flex");
        form_grup5.classList.add("align-items-start");
        form_grup5.classList.add("flex-column");
        div_row3.appendChild(form_grup5);

        //CAMPO 5
        var label_metros_cuadrados = document.createElement("label");
        label_metros_cuadrados.setAttribute("for","metros_cuadrados");
        label_metros_cuadrados.innerText = "Metros²";
        form_grup5.appendChild(label_metros_cuadrados);
        //
        var input_metros_cuadrados = document.createElement("input");
        input_metros_cuadrados.setAttribute("type","number");
        input_metros_cuadrados.setAttribute("id", "metros_cuadrados");
        input_metros_cuadrados.classList.add("form-control");
        form_grup5.appendChild(input_metros_cuadrados);

        //AGRUPAR INPUTS + LABEL 6
        var form_grup6 = document.createElement("div");
        form_grup6.classList.add("form-group");
        form_grup6.classList.add("col-md-4");
        form_grup6.classList.add("d-flex");
        form_grup6.classList.add("align-items-start");
        form_grup6.classList.add("flex-column");
        div_row3.appendChild(form_grup6);

        //CAMPO 6
        var label_precio_inmueble = document.createElement("label");
        label_precio_inmueble.setAttribute("for","precio_inmueble");
        label_precio_inmueble.innerText = "Precio alquiler (sin iva):";
        form_grup6.appendChild(label_precio_inmueble);
        //
        var input_precio_alquiler_inmueble = document.createElement("input");
        input_precio_alquiler_inmueble.setAttribute("type","number");
        input_precio_alquiler_inmueble.setAttribute("id", "precio_alquiler_inmueble");
        input_precio_alquiler_inmueble.setAttribute("name", "precio_alquiler_inmueble");
        input_precio_alquiler_inmueble.setAttribute("placeholder", "€");
        input_precio_alquiler_inmueble.classList.add("form-control");
        form_grup6.appendChild(input_precio_alquiler_inmueble);

        //DIV QUE VA A CONTENER LA INFORMACION DEL FORMULARIO FILA4
        var div_row4 = document.createElement("div");
        div_row4.classList.add("row");
        div_row4.classList.add("form-row");
        formulario.appendChild(div_row4);

        //AGRUPAR INPUTS + LABEL 7
        var form_grup7 = document.createElement("div");
        form_grup7.classList.add("form-group");
        form_grup7.classList.add("col-md-4");
        form_grup7.classList.add("d-flex");
        form_grup7.classList.add("align-items-start");
        form_grup7.classList.add("flex-column");
        div_row4.appendChild(form_grup7);

        //CAMPO 7
        var label_direccion_inmueble = document.createElement("label");
        label_direccion_inmueble.setAttribute("for","direccion_inmueble");
        label_direccion_inmueble.innerText = "Direccion:";
        form_grup7.appendChild(label_direccion_inmueble);
        //
        var input_direccion_inmueble = document.createElement("input");
        input_direccion_inmueble.setAttribute("type","text");
        input_direccion_inmueble.setAttribute("id", "direccion_inmueble");
        input_direccion_inmueble.setAttribute("name", "direccion_inmueble");
        input_direccion_inmueble.classList.add("form-control");
        form_grup7.appendChild(input_direccion_inmueble);

        //AGRUPAR INPUTS + LABEL 8
        var form_grup8 = document.createElement("div");
        form_grup8.classList.add("form-group");
        form_grup8.classList.add("col-md-4");
        form_grup8.classList.add("d-flex");
        form_grup8.classList.add("align-items-start");
        form_grup8.classList.add("flex-column");
        div_row4.appendChild(form_grup8);

        //CAMPO 8
        var label_distribucion_inmueble = document.createElement("label");
        label_distribucion_inmueble.setAttribute("for","distribucion_inmueble");
        label_distribucion_inmueble.innerText = "Distribucion:";
        form_grup8.appendChild(label_distribucion_inmueble);
        //
        var input_distribucion_inmueble = document.createElement("textarea");
        input_distribucion_inmueble.setAttribute("id", "distribucion_inmueble");
        input_distribucion_inmueble.setAttribute("name", "distribucion_inmueble");
        input_distribucion_inmueble.setAttribute("rows", "3");
        input_distribucion_inmueble.classList.add("form-control");
        form_grup8.appendChild(input_distribucion_inmueble);

        //AGRUPAR INPUTS + LABEL 9
        var form_grup9 = document.createElement("div");
        form_grup9.classList.add("form-group");
        form_grup9.classList.add("col-md-4");
        form_grup9.classList.add("d-flex");
        form_grup9.classList.add("align-items-start");
        form_grup9.classList.add("flex-column");
        div_row4.appendChild(form_grup9);

        //CAMPO 9
        var label_equipamiento_inmueble = document.createElement("label");
        label_equipamiento_inmueble.setAttribute("for","Equipamiento_inmueble");
        label_equipamiento_inmueble.innerText = "Equipamiento:";
        form_grup9.appendChild(label_equipamiento_inmueble);
        //
        var input_equipamiento_inmueble = document.createElement("textarea");
        input_equipamiento_inmueble.setAttribute("id", "equipamiento_inmueble");
        input_equipamiento_inmueble.setAttribute("name", "equipamiento_inmueble");
        input_equipamiento_inmueble.setAttribute("rows", "3");
        input_equipamiento_inmueble.classList.add("form-control");
        form_grup9.appendChild(input_equipamiento_inmueble);

        //DIV QUE VA A CONTENER LA INFORMACION DEL FORMULARIO FILA5
        var div_row5 = document.createElement("div");
        div_row5.classList.add("row");
        div_row5.classList.add("form-row");
        formulario.appendChild(div_row5);

        //AGRUPAR INPUTS + LABEL 10
        var form_grup10 = document.createElement("div");
        form_grup10.classList.add("form-group");
        form_grup10.classList.add("col-xl-4");
        form_grup10.classList.add("d-flex");
        form_grup10.classList.add("align-items-start");
        form_grup10.classList.add("flex-column");
        div_row5.appendChild(form_grup10);
        
        var label_municipio = document.createElement("label");
        label_municipio.setAttribute("for","input_municipio");
        label_municipio.innerText = "Ubicacion (municipio):";
        form_grup10.appendChild(label_municipio);

        var select_column = document.createElement("div");
        select_column.classList.add("col-auto"); 
        form_grup10.appendChild(select_column);

        var input_municipio = document.createElement("select");
        input_municipio.setAttribute("id", "input_municipio");
        input_municipio.setAttribute("name", "input_municipio");
        input_municipio.classList.add("form-select"); 
        input_municipio.setAttribute("aria-label", "Default select example");
        form_grup10.appendChild(input_municipio);

        nombre_municipio.municipio.forEach(function(element) {
            var option = document.createElement("option");
            option.setAttribute("value",element);
            option.innerHTML = element;
            input_municipio.appendChild(option);
        });
        

        //AGRUPAR INPUTS + LABEL 11
        var form_grup11 = document.createElement("div");
        form_grup11.classList.add("form-group");
        form_grup11.classList.add("col-xl-4");
        form_grup11.classList.add("d-flex");
        form_grup11.classList.add("align-items-start");
        form_grup11.classList.add("flex-column");
        div_row5.appendChild(form_grup11);
        
        var label_estado = document.createElement("label");
        label_estado.setAttribute("for","input_estado");
        label_estado.innerText = "Estado:";
        form_grup11.appendChild(label_estado);

        var select_column = document.createElement("div");
        select_column.classList.add("col-auto"); 
        form_grup10.appendChild(select_column);

        //SELECT E INPUT ESTADO
        var select_estado = document.createElement("select");
        select_estado.setAttribute("id", "input_estado");
        select_estado.setAttribute("name", "input_estado");
        select_estado.classList.add("form-select"); 
        select_estado.setAttribute("aria-label", "Default select example"); 
        form_grup11.appendChild(select_estado);

        var option_como_nuevo = document.createElement("option")
        option_como_nuevo.setAttribute("value", "como_nuevo");
        option_como_nuevo.innerHTML="Como nuevo";
        select_estado.appendChild(option_como_nuevo);

        var option_como_nuevo = document.createElement("option")
        option_como_nuevo.setAttribute("value", "como_nuevo");
        option_como_nuevo.innerHTML="Buen estado";
        select_estado.appendChild(option_como_nuevo);

        var option_como_nuevo = document.createElement("option")
        option_como_nuevo.setAttribute("value", "como_nuevo");
        option_como_nuevo.innerHTML="Necesita reforma";
        select_estado.appendChild(option_como_nuevo);
        
        // Pie de la ventana modal
        // var modalFooter = document.createElement("div");
        // modalFooter.classList.add("modal-footer");
        // modalContent.appendChild(modalFooter);

        var closeButtonFooter = document.createElement("button");
        closeButtonFooter.setAttribute("type", "button");
        closeButtonFooter.classList.add("btn", "btn-secondary", "mt-5", "float-end", "ms-2");
        closeButtonFooter.setAttribute("data-bs-dismiss", "modal");
        closeButtonFooter.innerText = "Cerrar";
        formulario.appendChild(closeButtonFooter);

        var saveButton = document.createElement("button");
        saveButton.setAttribute("type", "button");
        saveButton.classList.add("btn", "btn-primary", "mt-5", "float-end");
        saveButton.innerText = "Insertar";
        formulario.appendChild(saveButton);

        // Obtener la referencia a la ventana modal
        var ventanaModal = new bootstrap.Modal(document.getElementById("miVentanaModal"));

        // Abrir la ventana modal
        ventanaModal.show();
        
    }

    if (addtype == "Vivienda") {
        var comprobar = document.getElementById("miVentanaModal");
        if(comprobar){
            comprobar.remove();
        }
        var miVentanaModal = document.createElement('div');
        miVentanaModal.classList.add("modal", "fade");
        miVentanaModal.setAttribute("id", "miVentanaModal");
        miVentanaModal.setAttribute("tabindex", "-1");
        miVentanaModal.setAttribute("aria-labelledby", "miVentanaModalLabel");
        miVentanaModal.setAttribute("aria-hidden", "true");                        
        // Agregar la ventana modal al final del cuerpo del documento
        document.body.appendChild(miVentanaModal);

        var modalDialog = document.createElement("div");
        modalDialog.classList.add("modal-dialog");
        modalDialog.classList.add("modal-dialog-centered");
        modalDialog.classList.add("modal-lg");
        miVentanaModal.appendChild(modalDialog);


        var modalContent = document.createElement("div");
        modalContent.classList.add("modal-content");
        modalDialog.appendChild(modalContent);

        // Cabecera de la ventana modal
        var modalHeader = document.createElement("div");
        modalHeader.classList.add("modal-header");
        modalContent.appendChild(modalHeader);

        var modalTitle = document.createElement("h5");
        modalTitle.classList.add("modal-title");
        modalTitle.setAttribute("id", "miVentanaModalLabel");
        modalTitle.innerText = "DATOS VIVIENDA";
        modalHeader.appendChild(modalTitle);

        var closeButton = document.createElement("button");
        closeButton.setAttribute("type", "button");
        closeButton.classList.add("btn-close");
        closeButton.setAttribute("data-bs-dismiss", "modal");
        closeButton.setAttribute("aria-label", "Close");
        modalHeader.appendChild(closeButton);

        // Cuerpo de la ventana modal
        var modalBody = document.createElement("div");
        modalBody.classList.add("modal-body");
        modalContent.appendChild(modalBody);

        //INTRODUCIR FORMULARIO QUE VA A IR EN EL BODY DE LA VENTANA MODAL
        var formulario = document.createElement("form");
        formulario.setAttribute("action","<?php RUTA_URL?>/oferta");
        formulario.setAttribute("method","POST");
        formulario.classList.add("needs-validation");
        formulario.setAttribute("id","formulario_add_negocio");
        modalBody.appendChild(formulario);

        //DIV QUE VA A CONTENER LA INFORMACION DEL FORMULARIO FILA1
        var div_row3 = document.createElement("div");
        div_row3.classList.add("row");
        div_row3.classList.add("form-row");
        formulario.appendChild(div_row3);

        //AGRUPAR INPUTS + LABEL 5
        var form_grup5 = document.createElement("div");
        form_grup5.classList.add("form-group");
        form_grup5.classList.add("col-md-4");
        form_grup5.classList.add("d-flex");
        form_grup5.classList.add("align-items-start");
        form_grup5.classList.add("flex-column");
        div_row3.appendChild(form_grup5);

        //CAMPO 5
        var label_titulo_vivienda = document.createElement("label");
        label_titulo_vivienda.setAttribute("for","titulo_vivienda");
        label_titulo_vivienda.innerText = "Titulo vivienda:";
        form_grup5.appendChild(label_titulo_vivienda);
        //
        var input_titulo_vivienda = document.createElement("input");
        input_titulo_vivienda.setAttribute("type","text");
        input_titulo_vivienda.setAttribute("id", "titulo_vivienda");
        input_titulo_vivienda.classList.add("form-control");
        form_grup5.appendChild(input_titulo_vivienda);

        //AGRUPAR INPUTS + LABEL 6
        var form_grup6 = document.createElement("div");
        form_grup6.classList.add("form-group");
        form_grup6.classList.add("col-md-4");
        form_grup6.classList.add("d-flex");
        form_grup6.classList.add("align-items-start");
        form_grup6.classList.add("flex-column");
        div_row3.appendChild(form_grup6);

        //CAMPO 6
        var label_precio_inmueble = document.createElement("label");
        label_precio_inmueble.setAttribute("for","precio_inmueble");
        label_precio_inmueble.innerText = "Precio alquiler (sin iva):";
        form_grup6.appendChild(label_precio_inmueble);
        //
        var input_precio_alquiler_inmueble = document.createElement("input");
        input_precio_alquiler_inmueble.setAttribute("type","number");
        input_precio_alquiler_inmueble.setAttribute("id", "precio_alquiler_inmueble");
        input_precio_alquiler_inmueble.setAttribute("name", "precio_alquiler_inmueble");
        input_precio_alquiler_inmueble.setAttribute("required", true);
        input_precio_alquiler_inmueble.setAttribute("placeholder", "€");
        input_precio_alquiler_inmueble.classList.add("form-control");
        form_grup6.appendChild(input_precio_alquiler_inmueble);

        //AGRUPAR INPUTS + LABEL 7
        var form_grup7 = document.createElement("div");
        form_grup7.classList.add("form-group");
        form_grup7.classList.add("col-md-4");
        form_grup7.classList.add("d-flex");
        form_grup7.classList.add("align-items-start");
        form_grup7.classList.add("flex-column");
        div_row3.appendChild(form_grup7);

        //CAMPO 7
        var label_direccion_inmueble = document.createElement("label");
        label_direccion_inmueble.setAttribute("for","direccion_inmueble");
        label_direccion_inmueble.innerText = "Direccion:";
        form_grup7.appendChild(label_direccion_inmueble);
        //
        var input_direccion_inmueble = document.createElement("input");
        input_direccion_inmueble.setAttribute("type","text");
        input_direccion_inmueble.setAttribute("id", "direccion_inmueble");
        input_direccion_inmueble.setAttribute("name", "direccion_inmueble");
        input_direccion_inmueble.required=true;
        input_direccion_inmueble.classList.add("form-control");
        form_grup7.appendChild(input_direccion_inmueble);
        
        //DIV QUE VA A CONTENER LA INFORMACION DEL FORMULARIO FILA4
        var div_row4 = document.createElement("div");
        div_row4.classList.add("row");
        div_row4.classList.add("form-row");
        formulario.appendChild(div_row4);
        //AGRUPAR INPUTS + LABEL 8
        var form_grup8 = document.createElement("div");
        form_grup8.classList.add("form-group");
        form_grup8.classList.add("col-md-6");
        form_grup8.classList.add("d-flex");
        form_grup8.classList.add("align-items-start");
        form_grup8.classList.add("flex-column");
        div_row4.appendChild(form_grup8);

        //CAMPO 8
        var label_distribucion_inmueble = document.createElement("label");
        label_distribucion_inmueble.setAttribute("for","distribucion_inmueble");
        label_distribucion_inmueble.innerText = "Distribucion:";
        form_grup8.appendChild(label_distribucion_inmueble);
        //
        var input_distribucion_inmueble = document.createElement("textarea");
        input_distribucion_inmueble.setAttribute("id", "distribucion_inmueble");
        input_distribucion_inmueble.setAttribute("name", "distribucion_inmueble");
        input_distribucion_inmueble.required=true;
        input_distribucion_inmueble.setAttribute("rows", "3");
        input_distribucion_inmueble.classList.add("form-control");
        form_grup8.appendChild(input_distribucion_inmueble);

        //AGRUPAR INPUTS + LABEL 9
        var form_grup9 = document.createElement("div");
        form_grup9.classList.add("form-group");
        form_grup9.classList.add("col-md-6");
        form_grup9.classList.add("d-flex");
        form_grup9.classList.add("align-items-start");
        form_grup9.classList.add("flex-column");
        div_row4.appendChild(form_grup9);

        //CAMPO 9
        var label_equipamiento_inmueble = document.createElement("label");
        label_equipamiento_inmueble.setAttribute("for","Equipamiento_inmueble");
        label_equipamiento_inmueble.innerText = "Equipamiento:";
        form_grup9.appendChild(label_equipamiento_inmueble);
        //
        var input_equipamiento_inmueble = document.createElement("textarea");
        input_equipamiento_inmueble.setAttribute("id", "equipamiento_inmueble");
        input_equipamiento_inmueble.setAttribute("name", "equipamiento_inmueble");
        input_equipamiento_inmueble.required=true;
        input_equipamiento_inmueble.setAttribute("rows", "3");
        input_equipamiento_inmueble.classList.add("form-control");
        form_grup9.appendChild(input_equipamiento_inmueble);

        //DIV QUE VA A CONTENER LA INFORMACION DEL FORMULARIO FILA5
        var div_row5 = document.createElement("div");
        div_row5.classList.add("row");
        div_row5.classList.add("form-row");
        formulario.appendChild(div_row5);

        //AGRUPAR INPUTS + LABEL 10
        var form_grup10 = document.createElement("div");
        form_grup10.classList.add("form-group");
        form_grup10.classList.add("col-xl-4");
        form_grup10.classList.add("d-flex");
        form_grup10.classList.add("align-items-start");
        form_grup10.classList.add("flex-column");
        div_row5.appendChild(form_grup10);
        
        var select_column = document.createElement("div");
        select_column.classList.add("col-auto"); 
        form_grup10.appendChild(select_column);

        var label_municipio = document.createElement("label");
        label_municipio.setAttribute("for","input_municipio");
        label_municipio.innerText = "Ubicacion (municipio):";
        form_grup10.appendChild(label_municipio);

        var input_municipio = document.createElement("select");
        input_municipio.setAttribute("id", "input_municipio");
        input_municipio.setAttribute("name", "input_municipio");
        input_municipio.classList.add("form-select"); 
        input_municipio.setAttribute("aria-label", "Default select example"); 
        input_municipio.setAttribute.required=true;
        form_grup10.appendChild(input_municipio);

        nombre_municipio.municipio.forEach(function(element) {
            var option = document.createElement("option");
            option.setAttribute("value",element);
            option.innerHTML = element;
            input_municipio.appendChild(option);
        });
        

        //AGRUPAR INPUTS + LABEL 11
        var form_grup11 = document.createElement("div");
        form_grup11.classList.add("form-group");
        form_grup11.classList.add("col-xl-4");
        form_grup11.classList.add("d-flex");
        form_grup11.classList.add("align-items-start");
        form_grup11.classList.add("flex-column");
        div_row5.appendChild(form_grup11);
        
        var label_estado = document.createElement("label");
        label_estado.setAttribute("for","input_estado");
        label_estado.innerText = "Estado:";
        form_grup11.appendChild(label_estado);

        var select_column = document.createElement("div");
        select_column.classList.add("col-auto"); 
        form_grup10.appendChild(select_column);
        //SELECT E INPUT ESTADO
        var select_estado = document.createElement("select");
        select_estado.setAttribute("id", "input_estado");
        select_estado.setAttribute("name", "input_estado");
        select_estado.classList.add("form-select"); 
        select_estado.setAttribute("aria-label", "Default select example");
        select_estado.setAttribute.required=true;
        form_grup11.appendChild(select_estado);

        var option_1 = document.createElement("option")
        option_1.setAttribute("value", "Casi nuevo");
        option_1.innerHTML="Casi nuevo";
        select_estado.appendChild(option_1);

        var option_2 = document.createElement("option")
        option_2.setAttribute("value", "Muy bien");
        option_2.innerHTML="Muy bien";
        select_estado.appendChild(option_2);

        var option_3 = document.createElement("option")
        option_3.setAttribute("value", "Bien");
        option_3.innerHTML="Bien";
        select_estado.appendChild(option_3);

        var option_4 = document.createElement("option")
        option_4.setAttribute("value", "Reformado");
        option_4.innerHTML="Reformado";
        select_estado.appendChild(option_4);

        
        // Pie de la ventana modal
        var modalFooter = document.createElement("div");
        modalFooter.classList.add("modal-footer");
        modalContent.appendChild(modalFooter);

        var closeButtonFooter = document.createElement("button");
        closeButtonFooter.setAttribute("type", "button");
        closeButtonFooter.classList.add("btn", "btn-secondary", "mt-5", "float-end", "ms-2");
        closeButtonFooter.setAttribute("data-bs-dismiss", "modal");
        closeButtonFooter.innerText = "Cerrar";
        formulario.appendChild(closeButtonFooter);

        var saveButton = document.createElement("button");
        saveButton.setAttribute("type", "submit");
        saveButton.classList.add("btn", "btn-primary", "mt-5", "float-end");
        saveButton.innerText = "Insertar";
        formulario.appendChild(saveButton);

        // Obtener la referencia a la ventana modal
        var ventanaModal = new bootstrap.Modal(document.getElementById("miVentanaModal"));

        // Abrir la ventana modal
        ventanaModal.show();
    }
}

async function maps(pueblo) {    
    try{
        var res = await fetch("/servicios/poblacion/"+pueblo.value);
        //console.log(res);

        if (!res.ok) {
            throw new Error('resultado invalido');
        }

        var data = await res.json();
        console.log(data);

        //COJO EL DIV QUE VA A CONTENER EL MAPA
        let map = document.getElementById('mapa');
        //SI EXISTE ELIMINO EL DIV PARA VOLVER A CARGAR OTRO MAPA Y GENERO UNO VACIO
        if (map) {
           map.remove();
           map = document.createElement("div"); 
           map.setAttribute("id","mapa");
           document.getElementById('contain_map').appendChild(map);
        }

        //CARGO EL MAPA EN EL CONTENEDOR DEL MAPA VACIO
        map = L.map('mapa').setView([data.latitud_municipio, data.longitud_municipio],15);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        //GENERO UN POINTER EN LA UBICACION DEL MUNICIPIO
        L.marker([data.latitud_municipio, data.longitud_municipio]).addTo(map).bindPopup(pueblo.value);
    } catch (error) {
        console.log(error);
    }
}


async function servicios(pueblo) {    
    try{
        var res = await fetch("/servicios/servicios/"+pueblo.value);
        //console.log(res);

        if (!res.ok) {
            throw new Error('resultado invalido');
        }

        var data = await res.json();
        console.log(data);

        let tabla_servicios = document.getElementById('tabla_servicios');
        if (tabla_servicios) {
            tabla_servicios.remove();
            tabla_servicios = document.createElement("table"); 
            tabla_servicios.setAttribute("id","tabla_servicios");
            tabla_servicios.classList.add("table", "table-striped");
            document.getElementById('contain_tabla_servicios').appendChild(tabla_servicios);
        }

        let tabla_servicios_header = "<thead><tr><th>Servicio</th><th>Tipo</th></tr></thead>";
        tabla_servicios.innerHTML = tabla_servicios_header;

        let tabla_servicios_body = document.createElement("tbody");
        tabla_servicios.appendChild(tabla_servicios_body);

        data.forEach(servicio => {
            let row = document.createElement("tr");
            let nombre_servicio = servicio.nombre_servicio.replace(/_/g, " ");
            let descripcion_servicio = servicio.descripcion_servicio.replace(/_/g, " ");
            row.innerHTML = `<td>${nombre_servicio}</td><td>${descripcion_servicio}</td>`;
            tabla_servicios_body.appendChild(row);
        });

    } catch (error) {
        console.log(error);
    }
}



//Marcar como active el botón pulsado (ya hay un active por defecto)
// let boton_marcado = document.getElementsByClassName("botones_activos");
// let botones = boton_marcado.getElementsByClassName("boton_activo");
// if(botones && boton_marcado){
//     for (let i = 0; i < botones.length; i++) {
//         botones[i].addEventListener("click", function() {
//             let actual = document.getElementsByClassName("active");
//             actual[0].className = actual[0].className.replace("active", "");
//             this.className += "active";
//         });
//     }
// }


function closeCookieNotice() {
    var modalCookie = document.getElementById('modal_cookie');
    if (modalCookie) {
        modalCookie.style.display = "none";
    }
    document.cookie = "cookie_notice_shown=true; expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/";
}


function showCookieNotice() {
    let cookieNotice = document.getElementById("cookie-notice");
    if (cookieNotice && !checkCookie()) {
        let container = document.createElement('div');
        container.classList.add('modal');
        container.id = 'modal_cookie'; 

        let contenedorModal = document.createElement('div');
        contenedorModal.classList.add('modal-fullscreen-down');
        container.appendChild(contenedorModal);

        let contenedorCookie = document.createElement('div');
        contenedorCookie.classList.add('modal-content');
        contenedorModal.appendChild(contenedorCookie);

        let modalHeader = document.createElement('div');
        modalHeader.classList.add('modal-header');
        contenedorCookie.appendChild(modalHeader);

        let titulo = document.createElement('h3');
        titulo.innerText = 'Aviso Legal de Cookies';
        modalHeader.appendChild(titulo);

        let cookie = document.createElement('div');
        cookie.classList.add('modal-body', 'm-auto', 'p-auto');
        contenedorCookie.appendChild(cookie);

        let texto1 = document.createElement('p');
        texto1.innerText = 'Este sitio web utiliza cookies para mejorar la experiencia del usuario. Al utilizar este sitio web, usted acepta el uso de cookies de acuerdo con nuestra política de cookies.';
        texto1.classList.add('mb-0');
        cookie.appendChild(texto1);

        let texto2 = document.createElement('p');
        texto2.innerText = ' Si no está de acuerdo con el uso de cookies, puede ajustar la configuración de su navegador web para rechazarlas. Sin embargo, tenga en cuenta que esto puede afectar la funcionalidad del sitio y su experiencia de usuario.';
        texto2.classList.add('mb-0');
        cookie.appendChild(texto2);

        let texto3 = document.createElement('p');
        texto3.innerText = 'Este sitio web cumple con la normativa de protección de datos y privacidad vigente. Para obtener más información sobre cómo usamos las cookies y cómo protegemos su privacidad, consulte nuestra Política de Privacidad.';
        texto3.classList.add('mb-0');
        cookie.appendChild(texto3);

        let modalFooter = document.createElement('div');
        modalFooter.classList.add('modal-footer');
        contenedorCookie.appendChild(modalFooter);

        let buttonFooter = document.createElement('button');
        buttonFooter.classList.add('btn', 'btn-secondary');
        buttonFooter.textContent = 'Aceptar';
        buttonFooter.onclick = function() {
            closeCookieNotice();
        };
        modalFooter.appendChild(buttonFooter);

        document.body.appendChild(container);
        
        container.style.display = 'block';
    }
}

showCookieNotice();


function checkCookie() {
    return document.cookie.indexOf("cookie_notice_shown") >= 0;
}


function cookie_user() {
    var email = document.getElementById("login_email").value;
    var pass = document.getElementById("login_password").value;

    sessionStorage.setItem("email", email);
    sessionStorage.setItem("pass", pass);
}


function out_cookie() {
    sessionStorage.removeItem("email");
    sessionStorage.removeItem("pass");
}