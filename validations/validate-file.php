<?php
$message = '';
if (isset($_POST['submit'])) {
    $filename = $_POST['filename'];
    $extensionArray = explode("/",$_FILES['file']['type']);
    $extension = ".".$extensionArray[1];
    if ($_FILES['file']['size'] > 0 && !empty($_FILES['file']['tmp_name']) ) {
        $acceptedFile = validateFile($_FILES['file']);
        if ($acceptedFile) {
            $acceptedName = validateName($filename,$extension);
            if ($acceptedName) {
                // UNA VEZ VALIDADO TODO, SUBE LA IMAGEN AL SERVIDOR
                if(!file_exists('img-users/')) {
                    mkdir('img-users/',0777,true); 
                    $ruta_id = 'img-users/'.$user_id.'/';
                    $ruta_file = $ruta_id.$filename;
                    $tmpName =  $_FILES['file']['tmp_name'];
                    if(!file_exists($ruta_id)) {
                        mkdir($ruta_id,0777,true); 
                        if(move_uploaded_file($tmpName,$ruta_file)) {
                            echo "<p class='success'>'$filename' se ha agregado con éxito</p>";
                        } else {
                            echo "<p class='error'>Error inesperado al cargar '$filename'</p>";
                        }
                    } else {
                        if(move_uploaded_file($tmpName,$ruta_file)) {
                            echo "<p class='success'>'$filename' se ha agregado con éxito</p>";
                        } else {
                            echo "<p class='error'>Error inesperado al cargar '$filename'</p>";
                        }
                    }
                } else {
                $ruta_id = 'img-users/'.$user_id.'/';
                $ruta_file = $ruta_id.$filename;
                $tmpName =  $_FILES['file']['tmp_name'];
                if(!file_exists($ruta_id)) {
                    mkdir($ruta_id,0777,true); 
                    if(move_uploaded_file($tmpName,$ruta_file)) {
                        echo "<p class='success'>'$filename' se ha agregado con éxito</p>";
                    } else {
                        echo "<p class='error'>Error inesperado al cargar '$filename'</p>";
                    }
                } else {
                    if(move_uploaded_file($tmpName,$ruta_file)) {
                        echo "<p class='success'>'$filename' se ha agregado con éxito</p>";
/*                         echo '<script type="text/javascript">'
                        , 'fileUploadedAlert();'
                        , '</script>'; */
                    } else {
                        echo "<p class='error'>Error inesperado al cargar '$filename'</p>";
                    }
                }
                }
            }
        }
    } else {
        $message = 'Primero seleccione una imagen';
        echo "<p class='error'>$message</p>";
    }
}

// FUNCIÓN QUE VALIDA EL TIPO Y EL PESO DE LA IMAGEN
function validateFile($file) {
    $typesAccepted = array('image/png','image/jpg','image/jpeg','image/gif');
    $filetype = $file['type'];
    $filesize = $file['size'];
    if (!in_array($filetype,$typesAccepted)) {
        echo "<p class='error'>Tipo de archivo no permitido</p>";
        return false;
    }
    if ($filesize > 512000) {
        echo "<p class='error'>La imagen es muy pesada</p>";
        return false;
    }
    return true;
}

// FUNCIÓN QUE VALIDA EL NOMBRE Y LA EXTENSIÓN DE LA IMAGEN
function validateName($name,$extension) {
    $lname = strlen($name);
    $lextension = strlen($extension);
    $includeType = strpos($name,$extension);
    if (empty($name)) {
        echo "<p class='error'>Ingrese un nombre para la imagen</p>";
        return false;
    } else {
        if(strlen($name) > 50) {
            echo "<p class='error'>El nombre es muy largo</p>";
            return false;
        }
    }
    if($includeType !== false) {
        if (($includeType + $lextension) !== $lname) {
            echo "<p class='error'>El nombre ingresado no es valido</p>"; 
            return false;
        }
    } else {
        if (strpos($name,".") !== false) {
            echo "<p class='error'>Extensión no válida</p>"; 
            return false;
        } else {
            echo "<p class='error'>Por favor indique la extensión '$extension'</p>";
            /* $_FILES['file']['name'] = $name.$extension; */
            return false;
        }
    }
    $_FILES['file']['name'] = $name;
    return true;
}
?>
