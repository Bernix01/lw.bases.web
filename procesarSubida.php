<?php
# definimos la carpeta destino
$carpetaDestino="certificados/";

# si hay algun archivo que subir
if(isset($_FILES["archivo"]["name"]))
{
  $target_file = $carpetaDestino . basename($_FILES["archivo"]["name"]);
$fileType = pathinfo($target_file,PATHINFO_EXTENSION);
  //$filename = $_FILES["archivo"]["name"];
  //$tipo=$finfo->file($filename);

        //$tipo = $_FILES["archivo"]['type'];
        if($fileType == "PDF" || $fileType == "odt" || $fileType == "docx" || $fileType == "doc" )
        {
            # si exsite la carpeta o se ha creado
            if(file_exists($carpetaDestino))
            {
                 var_dump($_FILES["archivo"]);
                 die();
                $destino=$carpetaDestino.$_FILES["archivo"]["name"];
                echo $_FILES["archivo"]["tmp_name"];
                die();
                # movemos el archivo
                if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $target_file)) {
                  echo "The file ". basename( $_FILES["archivo"]["name"]). " has been uploaded.";
                } else {
                  echo "Sorry, there was an error uploading your file.";
                }
            }else{
                echo "<br>No se ha podido encontrar la carpeta";
            }
        }else{
            echo "<br>".$_FILES["archivo"]["name"]." - NO es un archivo pdf o doc";
        }

}else{
    echo "<br>No se ha subido ninguna imagen";
}
?>
