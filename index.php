<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es-co">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/inicio.css">
    <link rel="stylesheet" href="css/productos.css">
</head>
<body class="page-home">
    <header>
        <div class="logo">
            <img src="./img/logo.png" alt="logo del proyecto">
        </div>
        <?php include("nav.php"); ?>
    </header>
    <main class="container-forms">
        <div class="form-selector">
            <button class="button-selector" id="showRegister">registrar</button>
            <?php if(!isset($_SESSION['user_id'])): ?>
            <button class="button-selector" id="showLogin">iniciar sesion</button>
            <?php endif; ?>
        </div>

        <form id="form-register" class="form-register active" action="./funciones/registro-cajeros.php" method="post">
            <h2>Regístro para Cajeros</h2>
            <input type="text" class="input-register input-name" name="nombres" required="required" placeholder="Digite su nombre y apellido">
            <div class="container-select"> 
                <select name="tipo_documento" class="select-document">
                    <option value="">Tipo documento</option>
                    <option value="Tarjeta de identidad">Tarjeta de identidad</option>
                    <option value="Cédula de ciudadania">Cédula de ciudadania</option>
                </select>
            </div>
            <input type="number" class="input-register input-document" name="numero_documento" maxlength="10" required placeholder="Digite su número de documento">
            <input type="tel" class="input-register input-phone" name="telefono" maxlength="10" required placeholder="Digite su número de teléfono">
            <input type="email" class="input-register input-email" name="email" required placeholder="Digite su correo electrónico">
            <input type="password" class="input-register input-document" name="password" required placeholder="Digite su contraseña">
            <input type="password" class="input-register input-document" required placeholder="Digite su contraseña de nuevo">
            <input type="submit" class="input-register input-submit" name="register" value="Registrar">
        </form>

        <form id="form-login" class="form-login" action="./funciones/login.php" method="post">
            <h2>Iniciar sesion</h2>
            <input type="email" class="input-login input-email" name="email" required placeholder="Digite su correo electrónico">
            <input type="password" class="input-login input-document" name="password" required placeholder="Digite su contraseña">
            <input type="submit" class="input-login input-submit" value="Iniciar sesion">
        </form>

        <div class="feedback-msg">
            <?php
            if(isset($_SESSION['form_msg'])){
                echo $_SESSION['form_msg'];
                unset($_SESSION['form_msg']);
            }
            ?>
        </div>
    </main>

    <?php
    include("footer.php");
    foreach($_SESSION as $key => $val)
    {
        if ($key !== 'user_id'){
            unset($_SESSION[$key]);
        }
    }
    ?>
</body>
</html>