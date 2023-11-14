function uploadFile() {
    var formData = new FormData(document.getElementById('uploadForm'));

    fetch('upload.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        // Maneja la respuesta JSON aquí
        console.log(data);

        if (data.status === 'success') {
            // Muestra la imagen cargada
            var imageContainer = document.getElementById('imageContainer');
            var newImage = document.createElement('img');
            newImage.src = 'uploads/' + data.filename; // La ruta puede variar según la estructura de tu servidor
            newImage.alt = data.filename;
            imageContainer.appendChild(newImage);
        } else {
            console.error('Error al subir la foto:', data.message);
        }
    })
    .catch(error => {
        console.error('Error durante la carga de archivos:', error);
    });
}
