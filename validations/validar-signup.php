<?php
$message = '';
if(isset($_POST['submit'])) {
    if(empty($name)) {
        echo "<p class='error'>* Ingrese un nombre</p>";
        return;
    } else {
        if (strlen($nombre) > 15) {
            echo "<p class='error'>* El nombre es muy largo</p>";
            return;
        }
    }
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

    // VERIFICA QUE EL USUARIO NO EXISTA
/*     $records = $conn->prepare('SELECT email FROM users WHERE email= :email');
    $records->bindParam(':email',$email);
    $records->execute();
    
    $results = $records->fetch(PDO::FETCH_ASSOC);
    if (count($results) > 0 ) { 
        $message = 'Este Email ya esta en uso';
        echo "<p class='warning'>$message</p>";
    } */
        // AGREGA USUARIO A LA BASE DE DATOS
    $passwordHash = password_hash($password, PASSWORD_BCRYPT);
    $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $passwordHash);
    if ($stmt->execute()) {
        $message = 'Usuario registrado con éxito';
    } else {
        $message = 'error al registrar usuario';
    }
    if (!empty($message)) {
        echo "<p class='success'>$message</p>";
    }

    
}

?>
