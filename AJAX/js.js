
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
        //Añado la la tarea al div "tareas" modificando el DOM
        var capaTarea = document.createElement('div');
        capaTarea.classList.add('tarea');
        var capaTexto = document.createElement('div');
        capaTexto.classList.add('texto');
        capaTexto.innerHTML=tarea.texto;
        var papelera = document.createElement('i');
        papelera.classList.add('fa-solid', 'fa-trash', 'papelera');
        capaTarea.appendChild(capaTexto);
        capaTarea.appendChild(papelera);
        document.getElementById('tareas').appendChild(capaTarea);

        //También se podría hacer así:
        //document.getElementById('tareas').innerHTML+='<div class="tarea"><div class="texto">'+tarea.texto+'</div><i class="fa-solid fa-trash papelera"></i></div>';
    });
    
});


let papeleras = document.querySelectorAll('.papelera');
papeleras.forEach(papelera => {
    papelera.addEventListener('click',function(event){
        //this referencia al elementos del DOM sobre el que hemos hecho click
        let idTarea = this.getAttribute('data-idTarea');
        
        //Llamamos al script del servidor que borra la tarea pasándole el idTarea como parámetro
        fetch('borrar.php?id='+idTarea)
        .then(datos => datos.json)
        .then(respuesta =>{
            console.log(respuesta);
        });
        
        
        
    });
});

    


