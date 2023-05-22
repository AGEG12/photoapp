<?php
    if(isset($_POST['id'])) {
        $file_path = $_POST['id'];
        if(is_file($file_path)) {
            chmod($file_path,0777);
            if (!unlink($file_path)) {
                echo false;
            }
            echo $json['success'] = true;
        } else {
            echo false;
        }
    }
?>