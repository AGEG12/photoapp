<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $format = $_POST['format'];
    if (!empty($format)) {
        switch ($format) {
            case 1:
                header('Location: parts/word.php');
                break;
            case 2:
                header('Location: parts/excel.php');
                break;
            case 3:
                header('Location: parts/pdf.php');
                break;
            default:
                echo "<p class='error'>Formato no válido</p>";
        }
    } else {
        echo "<p class='error'>Ingrese un formato para el archivo</p>";
    }
}
?>



