<?php
/*
    Integrantes:
        Chacón Orduño Martín Eduardo - 351840
        Cruz Juárez Guillermo - 352905
        Ruiz Almeida Josue David - 358472
        Mendoza Escarzaga Erick - 357307
*/

// verificar si existe la cookie y redireccionar
if (isset($_COOKIE["color"])){
    header("Location: resultado.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Colores</title>
    <style>
        /* ----- ESTILOS GENERALES ----- */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* ----- TARJETA CENTRAL ----- */
        form, .container {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 40px 50px;
            text-align: center;
            width: 350px;
        }

        /* ----- TÍTULOS Y ETIQUETAS ----- */
        h1 {
            font-size: 1.8em;
            margin-bottom: 20px;
            color: #222;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
            text-transform: capitalize;
        }

        /* ----- SELECT Y BOTÓN ----- */
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 1em;
            margin-bottom: 20px;
        }

        button {
            background-color: #4f46e5;
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 6px;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #4338ca;
        }

        /* ----- MENSAJES ----- */
        .error-message {
            margin-top: 15px;
            color: #d7263d;
            font-weight: bold;
        }

    </style>
</head>
<body>
    <!-- Formulario con select y option correspondiente a cada color a elegir -->
    <form action="resultado.php" method="post">
        <div class="field">
            <label for="color">selecciona un color</label>
            <select id="color" name="color" required>
            <option value="" disabled selected>Selecciona una opción</option>
            <option value="Rojo">Rojo</option>
            <option value="Azul">Azul</option>
            <option value="Verde">Verde</option>
            <option value="Amarillo">Amarillo</option>
            </select>
        </div>
        <div class="actions span-2">
            <button type="submit">Guardar registro</button>
        </div>

        <!-- Mensaje de error si no hay post en resultado.php o no hay cookie y se quiere ingresar
        directamente a resultado.php-->
        <?php if (isset($_GET["error"]) && $_GET["error"] == "1"): ?>
            <div class="error-message">
                Debe seleccionar un color
            </div>
        <?php endif; ?>
    </form>
</body>
</html>