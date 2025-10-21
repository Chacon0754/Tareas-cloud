<?php
/*
    Integrantes:
        Chacón Orduño Martín Eduardo - 351840
        Cruz Juárez Guillermo - 352905
        Ruiz Almeida Josue David - 358472
        Mendoza Escarzaga Erick - 357307
*/

// verificar si existen la variable "color" en el formulario
if (!isset($_POST["color"])){
    // verificar si existen las cookies
    if (!isset($_COOKIE["color"])){
        header("Location: form.php?error=1");
        exit;
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
        .container {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 40px 60px;
            text-align: center;
            width: 350px;
        }

        /* ----- TÍTULO Y TEXTO ----- */
        h1 {
            margin-bottom: 20px;
            font-size: 1.8em;
            color: #222;
        }

        p {
            font-size: 1.3em;
            font-weight: 600;
        }

        /* ----- BOTÓN (OPCIONAL) ----- */
        button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 10px 20px;
            margin-top: 20px;
            border-radius: 6px;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }

        /* ----- COLORES DINÁMICOS ----- */
        p.red    { color: red; }
        p.blue   { color: blue; }
        p.green  { color: green; }
        p.yellow { color: goldenrod; }

    </style>
</head>
<body>
    <?php
    // elegir la timezone default
    date_default_timezone_set("America/Mexico_City");
    // asiganr el valor del formulario al color del texto
    if (isset($_POST["color"])) {
        $text_color = $_POST["color"];
        setcookie("color", $text_color, time() + 60 * 3);
    }
    // en caso de cookie asiganr el valor de la cookie al color del texto
    elseif (isset($_COOKIE["color"])){
        $text_color = $_COOKIE["color"];
    } 

    // asignar un color en ingles para el color del texto
    switch ($text_color) {
        case "Rojo":
            $text_color_css = "red";
            break;
        case "Azul":
            $text_color_css = "blue";
            break;
        case "Verde":
            $text_color_css = "green";
            break;
        case "Amarillo":
            $text_color_css = "yellow";
            break;
        default:
            $text_color_css = "black";
            $text_color = "Negro";
            break;
    }
    ?>

    <div class="container">
        <h1>Resultado del formulario</h1>
            <?php
            // mostrar el color del texto en el body
            echo '<p class="' . strtolower($text_color_css) . '">Texto del color: ' . $text_color . '</p>';
            ?>
        </div>
</body>
</html>
