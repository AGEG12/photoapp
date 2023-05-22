<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../../vendor/autoload.php';
$phpWord = new \PhpOffice\PhpWord\PhpWord();

// Obtencion de variables
session_start();
$user_id = $_SESSION['user']['id'];
$ruta_id = '../img-users/'.$user_id.'/';

if(file_exists($ruta_id)) {
    $archivos = count(glob($ruta_id.'{*}',GLOB_BRACE)); 
} else {
    $archivos = 0;
}

$ruta_data = '../data-users/'.$user_id.'/user-data.json';
$json = file_get_contents($ruta_data);
$json_array = json_decode($json,true);

$json_id = $json_array['id'];
$json_name = $json_array['name'];
$json_email = $json_array['email'];



$section = $phpWord->addSection();
// TABLA CON LOS DATOS
$table = 
"<table>
    <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Imagenes</th>
    </tr>
    <tr>
        <td>$json_id</td>
        <td>$json_name</td>
        <td>$json_email</td>
        <td>$archivos</td>
    </tr>
</table>";


\PhpOffice\PhpWord\Shared\Html::addHtml($section,$table);

$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
$objWriter->save('Mis-Datos.docx');
?>