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
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="assets/style.css">
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        // ELIMINAR ARCHIVO MOSTRANDO ALERTAS
        $(document).ready(function() {
            $('.btn-delete-img').click(function(e){
                e.preventDefault();
                (async () => {
                let confirm =  await Swal.fire({
                    title: 'Eliminar imagen',
                    text: '¿Deseas eliminar esta imagen?',
                    icon: 'question',
                    confirmButtonText: 'Eliminar',
                    confirmButtonColor: '#f48c67',
                    backdrop: true,
                    allowOutsideClick: false,
                    allowEscapekey: false,
                    allowEnterKey: true,
                    stopkeydownPropagation: false,
                    showCancelButton: true,
                    cancelButtonText: 'Cancelar'
                    }).then( result => {
                        if (result.value) {
                            var path = $(this).attr('data');
                            var pathID = "id=../"+path;
                            console.log(pathID);
                            $.ajax({
                                type: "POST",
                                url: "parts/delete-img.php",
                                data: pathID,
                                success: function() {
                                    (async () => {
                                        await Swal.fire({
                                            title: 'Completado',
                                            text: 'La imagen se elimino correctamente',
                                            icon: 'success',
                                            backdrop: true,
                                            allowOutsideClick: false,
                                            allowEscapekey: false,
                                            allowEnterKey: false,
                                            stopkeydownPropagation: false,

                                        })
                                        .then(result => {
                                            if (result.value) {
                                                location.reload();
                                            }
                                        })
                                    })();
                                }
                            });     
                        }
                    });
            })();     
            });
        });
        // DESCARGAR ARCHIVO
        /* $(document).ready(function() {
            $('.btn-download-img').click(function(e){
                e.preventDefault();
                (async () => {
                let confirm =  await Swal.fire({
                    title: 'Descargar imagen',
                    text: '¿Deseas descargar esta imagen?',
                    icon: 'question',
                    confirmButtonText: 'Descargar',
                    confirmButtonColor: '#f48c67',
                    backdrop: true,
                    allowOutsideClick: false,
                    allowEscapekey: false,
                    allowEnterKey: true,
                    stopkeydownPropagation: false,
                    showCancelButton: true,
                    cancelButtonText: 'Cancelar'
                    }).then( result => {
                        if (result.value) {
                            var path = $(this).attr('data');
                            var pathID = "id=../"+path;
                            console.log(pathID);
                            $.ajax({
                                type: "POST",
                                url: "parts/download-img.php",
                                data: pathID,
                                success: function() {
                                    location.reload();
                                }
                            });     
                        }
                    });
            })();     
            });
        }); */
    </script>
</head>
<body>
    <?php
    include("parts/header.php");
    ?>
    <main>
        <?php
        include("parts/nav.php");
        ?>
        <section class="gallery">
        <?php
        if ($archivos < 1) {
            include("parts/no-images.php");
        } else {
            include("parts/user-images.php");
        }
        ?>
        </section>
    </main>
</body>
<script src="assets/alert-signout.js"></script>
</html>