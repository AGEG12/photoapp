<?php
    function showFiles($ruta) {
        $dir = opendir($ruta);
        while ($file = readdir($dir)){
            if( $file != "." && $file != ".."){
                // Si es una carpeta
                if( !is_dir($ruta.$file) ){
                    $ruta_file = $ruta.$file;
                    ?>
                    <div class="gallery-div">
                        <img src="<?= $ruta_file ?>" alt="">
                        <div class="gallery-div-options">
                            <p><?= $file ?></p>
                            <!-- Aqui iria el boton "descargar" -->
                            <button data="<?= $ruta_file ?>" class="btn-delete-img">Eliminar</button>
                        </div>

                    </div>
                    <?php
                }
            }
        }
    }
    showFiles($ruta_id);

   /*  <button data="<?= $ruta_file ?>" class="btn-download-img">Descargar</button> */
?>
