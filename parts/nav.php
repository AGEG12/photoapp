<?php
session_start();
$name = $_SESSION['user']['name'];
$locationFile = basename($_SERVER['PHP_SELF']);
?>
<nav>
    <h2>¡Hola <?= $name ?>!</h2>

    <?php if ($locationFile == 'account.php'): ?>
        <a id="btn-add-img" href="index.php">
            <img src="assets/img_interface/imgphoto.svg" alt="">
            <p>Ir a galería</p>
        </a>
        <a id="btn-add-img" href="form.php">
            <img src="assets/img_interface/add-to-folder.svg" alt="">
            <p>Agregar una imagen</p>
        </a>
    <?php endif; ?>

    <?php if ($locationFile == 'index.php'): ?>
        <a class="btn-account" href="account.php">
            <img src="assets/img_interface/avatar.svg" alt="">
            <p>Mi cuenta</p>
        </a>
        <a id="btn-add-img" href="form.php">
            <img src="assets/img_interface/add-to-folder.svg" alt="">
            <p>Agregar una imagen</p>
        </a>
    <?php endif; ?>

    <?php if ($locationFile == 'form.php'): ?>
        <a class="btn-account" href="account.php">
            <img src="assets/img_interface/avatar.svg" alt="">
            <p>Mi cuenta</p>
        </a>
        <a id="btn-add-img" href="index.php">
            <img src="assets/img_interface/imgphoto.svg" alt="">
            <p>Ir a galería</p>
        </a>
    <?php endif; ?>

    <a class="btn-signout" href="#" onclick="confirmSignout()">
        <img src="assets/img_interface/img-session.svg" alt="">
        <p>Cerrar sesión</p>
    </a>
</nav>
