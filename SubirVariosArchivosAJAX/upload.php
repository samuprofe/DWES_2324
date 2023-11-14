<?php
header('Content-Type: application/json');

$response = array();

$carpetaDestino = "uploads/";
$archivos = $_FILES['fileInput'];

foreach ($archivos['name'] as $key => $name) {
    
    $uploadOk = 1;
    $extension = strtolower(pathinfo($archivoDestino, PATHINFO_EXTENSION));
    $archivoDestino = md5(time()+rand()).".$extension";

    // Verifica si el archivo ya existe
    while (file_exists("$carpetaDestino/$archivoDestino")) {
        $archivoDestino = md5(time()+rand()).".$extension";
    }

    // ... (resto del código para las verificaciones)

    if ($uploadOk == 1) {
        move_uploaded_file($archivos['tmp_name'][$key], $archivoDestino);
        $response['status'] = 'success';
        $response['message'] = "El archivo $name se ha subido correctamente.";
        $response['filename'] = $name;
    } else {
        $response['status'] = 'error';
        $response['message'] = "No se pudo subir el archivo $name.";
    }
}

echo json_encode($response);
?>
