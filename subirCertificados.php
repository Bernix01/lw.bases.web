<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Subir una o varias imagenes al servidor</title>
</head>

<body>


    <form action="procesarSubida.php" method="post" enctype="multipart/form-data" name="inscripcion">
        <input type="hidden" name="MAX_FILE_SIZE" value="100000">
        <input type="file" name="archivo" multiple="multiple">
        <input type="submit" value="Enviar"  >
    </form>
</body>
</html>
