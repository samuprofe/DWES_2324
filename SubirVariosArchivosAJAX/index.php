<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Subir Fotos</title>
</head>
<body>
    <form id="uploadForm" enctype="multipart/form-data">
        <label for="fileInput">Selecciona fotos:</label>
        <input type="file" name="fileInput" id="fileInput">
        <input type="button" value="Subir Foto" onclick="uploadFile()">
    </form>

    <div id="imageContainer"></div>

    <script src="upload.js"></script>
</body>
</html>