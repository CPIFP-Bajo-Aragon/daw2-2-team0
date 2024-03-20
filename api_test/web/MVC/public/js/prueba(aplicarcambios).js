
    /*      FUNCIONES PARA MOSTRAR SUS NEGOCIOS/LOCALES/VIVIENDAS     */
    
    async function abrir_misnegocios() {
        try {
            var res = await fetch('/oferta/negocios');
            console.log(res);

            if (!res.ok) {
                throw new Error('resultado invalido');
            }

            var data = await res.json();
            
            console.log(data);
            /*let container = document.getElementById('card_myofertas');
            container.innerHTML = '';

            data['negocios'].forEach(function(oferta) {
            let contenedorCards = document.getElementById('card_myofertas');

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
    }*/

        } catch (error) {
            console.log(error);
        }
    }
    async function abrir_mislocales() {
        try {
            var res = await fetch('/oferta/locales');
            console.log(res);

            if (!res.ok) {
                throw new Error('resultado invalido');
            }

             var data = await res.json();
            // var datas= JSON.stringify({ "datos": data });
            // var data_inmueble = JSON.parse(datas);
             console.log(data);

        } catch (error) {
            console.log(error);
        }
    }
    function abrir_misviviendas() {
        
    }

    /* var porcentajes = <?php echo json_encode($datos['porcentajes']); ?>;
    var ctx = document.getElementById('graficoEdades').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: Object.keys(porcentajes),
            datasets: [{
                label: 'Porcentaje por rango de edad',
                data: Object.values(porcentajes),
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
 */
    function graficoEdades() {
        fetch('/graficos/edades')
        .then(response => {
            if (!response.ok) {
                throw new Error('No se pudieron obtener los datos del gráfico');
            }
            return response.json();
        })
        .then(data => {
            generarGrafico(data);
        })
        .catch(error => {
            console.error('Error al obtener los datos del gráfico:', error);
        });
    }
    
    function generarGrafico(porcentajes) {
        var ctx = document.getElementById('graficoEdades').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: Object.keys(porcentajes),
                datasets: [{
                    label: 'Porcentaje por rango de edad',
                    data: Object.values(porcentajes),
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }