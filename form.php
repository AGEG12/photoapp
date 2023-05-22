<?php
    session_start();
    $session = $_SESSION['user'];
    $user_id = $_SESSION['user']['id'];
    include("parts/header.php");
    if($_SESSION['user']['email'] == null || $_SESSION['user']['email'] == '') {
        header('Location: signin.php');
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cargar Archivos</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <main>
        <?php
            include("parts/nav.php");
        ?>
        <form class="form-user form-files" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" enctype="multipart/form-data">
            <h1>Agregar una imagen</h1>
            <input id="input-file" class="form-input-file" type="file" accept="image/*" name="file">
            <input id="input-filename" class="form-inputs" type="text" name="filename" placeholder="Nombre de la imagen:">
            <input class="form-btn" type="submit" value="Agregar imagen" name="submit">
            <?php
            include("validations/validate-file.php");
            ?>
        </form>
    </main>
    <script src='assets/formFile.js'></script>
    <script src="assets/alert-signout.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>