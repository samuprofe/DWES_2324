
let botonInsertar= document.getElementById('botonNuevaTarea');

//document.querySelector('.papelera')

botonInsertar.addEventListener('click',function (){

    //Envío datos mediante POST a insertar.php construyendo un FormData
    const datos = new FormData();
    datos.append('texto',document.getElementById('nuevaTarea').value);
    
    const options = {
        method: "POST",
        body: datos
      };
    
    fetch('insertar.php', options)
    .then( respuesta => {
        return respuesta.json();
    })
    .then(tarea => {
        console.log(tarea);
    })
    .catch(function(){
        //Esto se ejecuta si hay error de conexión
        console.log("Error de conexión con insertar.php");
    });
    console.log("Esto está debajo del fetch");
});

