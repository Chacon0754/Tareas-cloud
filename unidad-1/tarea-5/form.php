<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Temperaturas</title>
    <style>
        /* Reset */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Segoe UI", Roboto, sans-serif;
    }

    body {
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background: linear-gradient(135deg, #74ebd5 0%, #9face6 100%);
        color: #333;
    }

    .container {
        background: rgba(255, 255, 255, 0.75);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        padding: 2rem;
        border-radius: 20px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        width: 100%;
        max-width: 380px;
        text-align: center;
        animation: fadeIn 0.7s ease;
    }

    h1 {
        font-size: 1.8rem;
        margin-bottom: 1.2rem;
        color: #2c3e50;
    }

    input[type="text"] {
        width: 100%;
        padding: 0.8rem;
        margin-bottom: 1rem;
        border: 2px solid transparent;
        border-radius: 12px;
        font-size: 1rem;
        background: #f9f9f9;
        transition: all 0.3s ease;
    }

    input[type="text"]:focus {
        outline: none;
        border-color: #6a82fb;
        background: #fff;
        box-shadow: 0 0 0 4px rgba(106,130,251,0.2);
    }

    label {
        display: flex;
        align-items: center;
        margin: 0.5rem 0;
        padding: 0.5rem;
        border-radius: 10px;
        cursor: pointer;
        transition: background 0.2s;
        font-size: 0.95rem;
    }

    label:hover {
        background: rgba(106,130,251,0.1);
    }

    input[type="radio"] {
        margin-right: 0.6rem;
        accent-color: #6a82fb;
        transform: scale(1.2);
    }

    input[type="submit"] {
        width: 100%;
        padding: 0.9rem;
        background: linear-gradient(135deg, #6a82fb, #fc5c7d);
        color: #fff;
        font-size: 1rem;
        font-weight: bold;
        border: none;
        border-radius: 12px;
        cursor: pointer;
        transition: transform 0.2s, box-shadow 0.2s;
    }

    input[type="submit"]:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 18px rgba(0,0,0,0.2);
    }

    #error-message {
        color: #e63946;
        font-size: 0.9rem;
        margin-bottom: 0.8rem;
        min-height: 1rem;
    }

    @keyframes fadeIn {
        from {opacity: 0; transform: translateY(10px);}
        to {opacity: 1; transform: translateY(0);}
    }
    </style>
</head>
<body>
    <div class="container">
        <h1>Transformar temperaturas</h1>
        <form action="temperaturas.php" method="post">
            <input type="text" placeholder="Temperatura" name="temperature" required>
            <div id="error-message">
                <?php
                    if (isset($_GET["error"])){
                        $error = $_GET["error"];
                        if ($error == 1){
                            echo "<small>Temperatura no esta definida o conversion no seleccionada</small>";
                        }
                        if ($error == 2){
                            echo "<small>Temperatura debe ser numerico</small>";
                        }
                    }
                ?>
            </div>
            <label for="celsius">
                <input type="radio" name="convert_to" value="celsius" id="celsius" required>
                Convertir de Fahrenheit a Celsius
            </label>
            <label for="fahrenheit">
                <input type="radio" name="convert_to" value="fahrenheit" id="fahrenheit">
                Convertir de Celsius a Fahrenheit
            </label>
            <input type="submit" value="Transformar">
        </form>
    </div>
</body>
</html>