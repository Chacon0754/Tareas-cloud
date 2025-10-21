<?php
// Elegir zona horaria
date_default_timezone_set("America/Mexico_City");

// conexion sql
$connection = mysqli_connect("localhost", "root", "", "tarea-12");

// validar existencia de cookies
if (isset($_COOKIE["user"]) && isset($_COOKIE["password"])){
    
    $user_cookie = $_COOKIE["user"];
    $pass_cookie = $_COOKIE["password"];

    //query sql para encontrar usuario en db
    $query_user = 'SELECT * from usuarios where user = ' . '"'.$user_cookie.'"';
    //consultar db
    $result = mysqli_query($connection, $query_user);
    // extraer registro
    $register = mysqli_fetch_array($result);

    // validar existencia de registro
    if (!$register){
        header("Location: form.php?error=3");
        exit;
    }

    $user_db = $register["user"];
    $pass_db = $register["password"];

    // validar usuario
    if ($user_db != $user_cookie){
        header("Location: form.php?error=1");
        exit;
    } // validar contraseña
    if (!$pass_db != $pass_cookie) {
        header("Location: form.php?error=2");
        exit;
    }

    // redireccionar si todo coincide
    header("Location: resultado.php");
    exit;
}

// Error 3 Sesion expirada si se trata de entrar a autentica sin haber pasado por formulario
if (!isset($_POST["user"]) || !isset($_POST["password"])){
    header("Location: form.php?error=3");
    exit;
}

$user_post = $_POST["user"];
$pass_post = $_POST["password"];

// query sql para encontrar usuario en db
$query_user = 'SELECT * from usuarios where user = ' . '"'.$user_post.'"';
$result = mysqli_query($connection, $query_user);
$register = mysqli_fetch_array($result);

// validar existencia de registro
if (!$register){
    header("Location: form.php?error=3");
    exit;
    }

$user_db = $register["user"];
$pass_db = $register["password"];


if ($user_db == $user_post){
    if ($pass_db == $pass_post){
        // si usuario y contra coinciden con db crear cookies
        setcookie("user", $user_post, time() + 60 * 5);
        setcookie("password", $pass_post, time() + 60 * 5);
        //redireccionar
        header("Location: resultado.php");
        exit;
    }
    else {
        // Error 1: usuario no encontrado
        header("Location: form.php?error=2");
        exit;
    }
}
else {
    // Error 2: contraseña incorrecta
    header("Location: form.php?error=1");
    exit;
}
?>