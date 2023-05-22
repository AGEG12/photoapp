<?php
session_start();
$session = $_SESSION['user'];
if(!($_SESSION['user']['email'] == null) || !($_SESSION['user']['email'] == '')) {
    header('Location: index.php');
}
require 'database.php';
if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password']; 
    $remind = $_POST['remind']; 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <?php
        include("parts/header.php");
    ?>
    <form class="form-user" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
        <h2>Registro de usuario</h2>
        <input class="form-inputs" type="text" name="name" placeholder="Nombre" value="<?php if(isset($name)) echo $name ?>">
        <input class="form-inputs" type="email" name="email" placeholder="Email" value="<?php if(isset($email)) echo $email ?>">
        <input class="form-inputs" type="password" name="password" placeholder="Contraseña" value="<?php if(isset($password)) echo $password ?>">
        <input class="form-btn" type="submit" name="submit" value="Registrarme">
        <a href="signin.php">Ya tengo cuenta</a>
        <?php
            include("validations/validar-signup.php");

        ?>
    </form>
</body>
</html>

