<?php
/*
    Integrantes:
        Chacón Orduño Martín Eduardo - 351840
        Cruz Juárez Guillermo - 352905
        Ruiz Almeida Josue David - 358472
        Mendoza Escarzaga Erick - 357307
*/

// verificar si existen las cookies
if (isset($_COOKIE["user"]) && isset($_COOKIE["password"])){

    //conexio sql
    $connection = mysqli_connect("localhost", "root", "", "tarea-12");

    //sacar variables de las cookies
    $user_cookie = $_COOKIE["user"];
    $pass_cookie = $_COOKIE["password"];

    // query sql
    $query_user = 'SELECT * from usuarios where user = ' . '"'.$user_cookie.'"';

    // consultar db
    $result = mysqli_query($connection, $query_user);

    // extraer registro
    $register = mysqli_fetch_array($result);

    // comporbar existencia de usuario
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
    }
    // validar contraseña
    if ($pass_db != $pass_cookie) {
        header("Location: form.php?error=2");
        exit;
    }
}
// si no existen las cookies
else {
    header("Location: form.php?error=3");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <style>
    /* Fondo general */
    body {
        font-family: 'Segoe UI', Arial, sans-serif;
        background-color: #f2f2f2;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    /* Contenedor principal */
    .container {
        background-color: #ffffff;
        padding: 2rem 3rem;
        border-radius: 12px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        text-align: center;
        max-width: 400px;
        width: 90%;
    }

    /* Título */
    .container h1 {
        color: #333333;
        font-size: 1.8rem;
        margin-bottom: 1rem;
    }

    /* Mensaje de bienvenida */
    .container p {
        font-size: 1.1rem;
        color: #555555;
        margin-bottom: 1.5rem;
    }

    /* Botón de cerrar sesión */
    .logout-btn {
        display: inline-block;
        background-color: #28a745;
        color: white;
        text-decoration: none;
        padding: 0.7rem 1.5rem;
        border-radius: 5px;
        font-size: 1rem;
        transition: background-color 0.3s ease;
    }

    .logout-btn:hover {
        background-color: #218838;
    }
</style>
</head>
<body>
    <div class="container">
        <h1>Bienvenido</h1>
        <!-- Mensaje de bienvenida-->
        <p><?php echo 'Beinvenido@ '.$user_cookie ?></p>
    </div>
</body>
</html>
