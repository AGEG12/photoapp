<?php
        session_start();
        $session = $_SESSION['user'];
        if($_SESSION['user']['email'] == null || $_SESSION['user']['email'] == '') {
            header('Location: signin.php');
        }
        $user_id = $_SESSION['user']['id'];
        $ruta_id = 'img-users/'.$user_id.'/';
        if(file_exists($ruta_id)) {
            $archivos = count(glob($ruta_id.'{*}',GLOB_BRACE)); 
        } else {
            $archivos = 0;
        }
        $ruta_data = 'data-users/'.$user_id.'/user-data.json';
        $json = file_get_contents($ruta_data);
        $json_array = json_decode($json,true);

        // VARIABLES OBTENIDAS DE JSON
        $json_id = $json_array['id'];
        $json_name = $json_array['name'];
        $json_email = $json_array['email'];
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <?php
    include("parts/header.php");
    ?>
    <main>
        <?php
        include("parts/nav.php");
        ?>
        <section class="data-account">
            <h1>Cuenta de <?= $json_name ?> </h1>
            <h2>Correo en uso: <?= $json_email ?> </h2>
            <h2>Total de imágenes: <?= $archivos ?> </h2>        
        </section>

    </main>
</body>
<script src="assets/alert-signout.js"></script>
</html>