<?php
/*
    Integrantes:
        Chacón Orduño Martín Eduardo - 351840
        Cruz Juárez Guillermo - 352905
        Ruiz Almeida Josue David - 358472
        Mendoza Escarzaga Erick - 357307
*/

if (isset($_COOKIE["user"]) && isset($_COOKIE["password"])) {
    if (!isset($_GET["error"])) {
        header("Location: autenticacion.php");
        exit;
    }
    else {
        // elegir zona horaria
        date_default_timezone_set("America/Mexico_City");

        // destruir cookies defectuosas
        setcookie("user", "", time() - 1000000);
        setcookie("password", "", time() - 1000000);

    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Estilo general */
body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
    display: flex;
    height: 100vh;
    align-items: center;
    justify-content: center;
}

/* Contenedor del formulario */
form {
    background-color: #fff;
    padding: 2rem 2.5rem;
    border-radius: 10px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 400px;
    box-sizing: border-box;
}

/* Etiquetas */
form label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: bold;
    color: #333;
}

/* Campos de entrada */
form input[type="text"],
form input[type="password"] {
    width: 100%;
    padding: 0.75rem;
    margin-bottom: 1.5rem;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    font-size: 1rem;
    transition: border-color 0.3s ease;
}

form input[type="text"]:focus,
form input[type="password"]:focus {
    border-color: #007bff;
    outline: none;
}

/* Botón de envío */
form input[type="submit"] {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 0.75rem;
    border-radius: 5px;
    font-size: 1rem;
    cursor: pointer;
    width: 100%;
    transition: background-color 0.3s ease;
}

form input[type="submit"]:hover {
    background-color: #0056b3;
}

/* Checkbox */
.checkbox-container {
    display: flex;
    align-items: center;
    margin-top: 1rem;
    gap: 0.5rem;
    font-size: 0.95rem;
}

/* Mensaje de error */
.error-message {
    margin-top: 1rem;
    color: red;
    font-size: 0.9rem;
}

    </style>
</head>
<body>
    <form action="autenticacion.php" method="post">

        <label for="user">Usuario</label>
        <input type="text" name="user" id="user" required>

        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password" required>

        <input type="submit" value="enviar" id="">

        <?php
        if (isset($_GET["error"]) && $_GET["error"] == "1"): ?>
            <div class="error-message">
                Usuario no encontrado
            </div>
        <?php endif; ?>
        
        <?php
        if (isset($_GET["error"]) && $_GET["error"] == "2"): ?>
            <div class="error-message">
                Contraseña incorrecta
            </div>
        <?php endif; ?>

        <?php
        if (isset($_GET["error"]) && $_GET["error"] == "3"): ?>
            <div class="error-message">
                Sesion invalida. Vuelva a ingresar
            </div>
        <?php endif; ?>
    </form>
</body>
</html>