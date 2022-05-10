    let map;
    let parcelas;

    async function initMap() {

        let urlParams = new URLSearchParams(window.location.search);
        let usuario = urlParams.get("usuario");
        let parcela = urlParams.get("parcela");

        if (usuario) {
            obtenerParcelasUsuario(usuario);
        } else if (parcela) {
            obtenerParcela(parcela)
        } else {
            obtenerParcelasUsuario(1);
        }
    }

    function crearMapa() {
        map = new google.maps.Map(document.getElementById('mapa'), {
            center: {lat: 39.9965055, lng: -0.1674364},
            zoom: 18,
            mapTypeId: 'hybrid',
            styles: [
                {
                    featureType: 'poi',
                    stylers: [{visibility: 'off'}]
                },
                {
                    featureType: 'transit',
                    stylers: [{visibility: 'off'}]
                }
            ],
            mapTypeControl: false,
            streetViewControl: false,
            rotateControl: false,
        });
    }

    async function obtenerParcela(parcela) {
        crearMapa();
        let consulta = await fetch("api/v1.0/parcela/" + parcela);
        parcelas = [];
        parcelas[0] = await consulta.json();
        await crearPoligono(parcelas[0]);
        ajustarMapa();
    }

    async function obtenerParcelasUsuario(usuario) {
        let consulta = await fetch("api/v1.0/parcela?usuario=" + usuario);
        parcelas = await consulta.json();

        crearSelector();

        crearMapa();
    }

    function crearSelector() {
        let selector = document.getElementById("selector-parcelas");
        parcelas.forEach(function (parcela, index) {
            let label = document.createElement('label');
            label.textContent = parcela.nombre_parcela;
            let check = document.createElement('input');
            check.type = 'checkbox';
            check.addEventListener('change', function () {
                mostrarOcultarParcela(index, check.checked);
            })
            label.prepend(check);
            selector.append(label);
        })
    }

    async function crearPoligono(parcela) {
        let id = parcela.parcela || parcela.id;
        let consulta = await fetch("api/v1.0/parcela/" + id + "/vertices");
        let vertices = await consulta.json();
        parcela.polygon = new google.maps.Polygon({
            paths: vertices,
            strokeColor: "#" + parcela.color,
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: "#" + parcela.color,
            fillOpacity: 0.35,
            map: map
        });
    }

    async function mostrarOcultarParcela(index, mostrar) {
        let parcela = parcelas[index];
        if (mostrar) {
            if (parcela.polygon) {
                parcela.polygon.setMap(map);
            } else {
                await crearPoligono(parcela);
            }
        } else {
            if (parcela.polygon) parcela.polygon.setMap(null);
        }
        ajustarMapa();
    }

    function ajustarMapa() {
        let bounds = new google.maps.LatLngBounds();
        parcelas.forEach(function (parcela) {
            if (parcela.polygon && parcela.polygon.getMap()) {
                parcela.polygon.getPath().getArray().forEach(function (v) {
                    bounds.extend(v);
                })
            }
        })
        if (!bounds.isEmpty()) map.fitBounds(bounds);
    }
