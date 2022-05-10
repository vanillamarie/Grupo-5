function enviarLogin(event) {
    event.preventDefault();
    console.log("Login enviado");

    let nombreUsuario = document.getElementById("usuario").value;
    let passUsuario = document.getElementById("contrasenya").value;



    let url = ".vscode" + nombreUsuario + "-" + passUsuario +".json";
    console.log(url);

    fetch(url).then(function (respuesta) {
        //console.log(respuesta);
        return respuesta.json();
    }).then(function (datos) {
        console.log(datos.nombre);
        location.href = "app/test-formulario.html"
    }).catch(function () {
        document.getElementById("error").style.visibility = "visible";
    })
}


/* Pone visible el menú cuando le das click */
function myFunction() {
    var x = document.getElementById("myLinks");
    if (x.style.display === "block") {
      x.style.display = "none";
    } else {
      x.style.display = "block";
    }
}