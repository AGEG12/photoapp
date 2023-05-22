<?php
session_start();
if(isset($_POST['submit'])) {

    if(empty($email)) {
        echo '<p class="error">* Ingrese un email</p>';
        return;
    } else {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo '<p class="error">* Ingrese un email válido</p>';
            return;
        }
    }
    if(empty($password)) {
        echo '<p class="error">* Ingrese una contraseña</p>';
        return;
    } else {
        if (strlen($password) < 6) {
            echo "<p class='error'>* La contraseña es muy corta</p>";
            return;
        }
    }

    $records = $conn->prepare('SELECT id, name, email, password FROM users WHERE email= :email');
    $records->bindParam(':email',$email);
    $records->execute();
    
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $message = '';
    if (count($results) > 0 ) { 
        if (password_verify($password, $results['password']) ) {
            unset($results['password']);
            // CREAR ARCHIVO JSON CON LOS DATOS DEL USUARIO
            if(!file_exists('data-users/')) {
                mkdir('data-users/',0777,true); 
                $ruta_id = 'data-users/'.$results['id'].'/';
                mkdir($ruta_id,0777,true); 
                $ruta_data = 'data-users/'.$results['id'].'/user-data.json';
                $fileJSON = fopen($ruta_data,"w");
                fwrite($fileJSON,json_encode($results));
                fclose($fileJSON);
            } else {
                $ruta_id = 'data-users/'.$results['id'].'/';
                if(!file_exists($ruta_id)) {
                    mkdir($ruta_id,0777,true);
                    $ruta_data = 'data-users/'.$results['id'].'/user-data.json';
                    if (!file_exists($ruta_data)) {
                        $fileJSON = fopen($ruta_data,"w");
                        fwrite($fileJSON,json_encode($results));
                        fclose($fileJSON);
                    } 
                } else {
                    $ruta_data = 'data-users/'.$results['id'].'/user-data.json';
                    if (!file_exists($ruta_data)) {
                        $fileJSON = fopen($ruta_data,"w");
                        fwrite($fileJSON,json_encode($results));
                        fclose($fileJSON);
                    }
                }
            } 
            
            $_SESSION['user'] = array();
            $_SESSION['user']['id'] = $results['id'];
            $_SESSION['user']['name'] = $results['name'];
            $_SESSION['user']['email'] = $results['email'];
            header('Location: index.php');
        } else {
            $message = 'Contraseña incorrecta';       
            echo "<p class='warning'>$message</p>";
        }
    } /* else {
        $message = 'Email no registrado';
        echo "<p class='warning'>$message</p>";
    } */

}
?>