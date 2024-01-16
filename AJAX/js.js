
let botonInsertar= document.getElementById('botonNuevaTarea');

botonInsertar.addEventListener('click',function (){
    //alert("has pinchado sobre el botón");
    fetch('insertar.php')
    .then(function (respuesta){
        return respuesta.text();
    })
    .then(function (texto){
        alert(texto);
    });
});

