<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    session_start();
    $session = $_SESSION['user'];
    if($_SESSION['user']['email'] == null || $_SESSION['user']['email'] == '') {
        header('Location: signin.php');
    }
    echo "<h2>Sesión de ".$_SESSION['user']['email']." cerrada</h2>";
    session_unset();
    session_destroy();
    header('Location: signin.php');
    ?>
    
</body>
</html>