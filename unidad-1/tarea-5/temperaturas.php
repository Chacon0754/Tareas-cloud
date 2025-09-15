<?php
    /*
        Integrantes:
            Chacón Orduño Martín Eduardo - 351840
            Cruz Juárez Guillermo - 352905
            Ruiz Almeida Josue David - 358472
            Mendoza Escarzaga Erick - 357307
    */
    if (!isset($_POST["temperature"]) || !isset($_POST["convert_to"])) {
        header("Location: form.php?error=1");
        exit;
    }

    if (!is_numeric($_POST["temperature"])) {
        header("Location: form.php?error=2");
        exit;
    }


    $temperature = $_POST["temperature"];
    $convert_to = $_POST["convert_to"];

    if ($convert_to == "celsius"){
        $result = ($temperature - 32) * (5 / 9);
        $from_unit = "°F";
        $to_unit = "°C";
    }
    else if ($convert_to == "fahrenheit"){
        $result = ($temperature * (9 / 5)) + 32;
        $from_unit = "°C";
        $to_unit = "°F";
    }

    $input_formatted = number_format($temperature, 2);
    $result_formatted = number_format($result, 2);
    
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Resultado • Temperaturas</title>
    <style>
        /* Fondo y tipografía */
        * { box-sizing: border-box; }
        html, body { height: 100%; }
        body {
        margin: 0;
        font-family: "Segoe UI", Roboto, system-ui, -apple-system, Helvetica, Arial, sans-serif;
        color: #25313c;
        background: linear-gradient(135deg, #74ebd5 0%, #9face6 100%);
        display: flex; align-items: center; justify-content: center;
        padding: 24px;
        }

        /* Tarjeta glass */
        .card {
        width: 100%; max-width: 460px;
        background: rgba(255, 255, 255, 0.78);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border: 1px solid rgba(255,255,255,0.6);
        border-radius: 20px;
        box-shadow: 0 12px 28px rgba(0,0,0,0.15);
        padding: 28px;
        text-align: center;
        animation: fadeIn .6s ease;
        }

        h1 {
        font-size: 1.6rem;
        margin: 0 0 10px;
        color: #2c3e50;
        }

        .sub {
        color: #5f6c7b;
        margin-bottom: 18px;
        font-size: .95rem;
        }

        .result {
        margin: 18px 0 8px;
        font-size: 1.15rem;
        }

        .badge {
        display: inline-block;
        padding: 6px 10px;
        border-radius: 999px;
        background: rgba(106,130,251,0.12);
        color: #3b5bfd;
        font-weight: 600;
        font-size: .85rem;
        margin-bottom: 10px;
        }

        .big {
        font-size: 2rem;
        font-weight: 800;
        letter-spacing: .3px;
        color: #1f2d3a;
        margin: 6px 0 14px;
        }

        .fromto {
        display: inline-flex; gap: 8px; align-items: center; 
        color: #5f6c7b; font-size: .95rem;
        }

        .pill {
        padding: 4px 8px; border-radius: 999px; background: #f0f3ff; color: #3b5bfd;
        border: 1px solid #e0e6ff; font-weight: 600;
        }

        .actions {
        margin-top: 18px; display: flex; gap: 10px; justify-content: center;
        }

        .btn {
        appearance: none; border: 0; cursor: pointer;
        padding: 12px 16px; border-radius: 12px;
        font-weight: 600; font-size: 1rem;
        transition: transform .12s ease, box-shadow .2s ease, background .2s ease;
        }

        .btn-primary {
        color: #fff;
        background: linear-gradient(135deg, #6a82fb, #fc5c7d);
        box-shadow: 0 8px 18px rgba(0,0,0,0.18);
        }
        .btn-primary:hover { transform: translateY(-1px); box-shadow: 0 10px 22px rgba(0,0,0,0.2); }
        .btn-primary:active { transform: translateY(0); }

        .btn-ghost {
        background: rgba(255,255,255,0.7);
        border: 1px solid rgba(0,0,0,0.06);
        color: #2c3e50;
        }
        .btn-ghost:hover { background: rgba(255,255,255,0.9); }

        @keyframes fadeIn {
        from { opacity: 0; transform: translateY(8px); }
        to   { opacity: 1; transform: translateY(0); }
        }

        /* Responsive ajuste menor */
        @media (max-width: 420px) {
        .big { font-size: 1.7rem; }
        }
    </style>
</head>
<body>
    <main class="card" role="main" aria-labelledby="title">
        <h1 id="title">Resultado de conversión</h1>
        <p class="sub">Conversión realizada correctamente.</p>

        <div class="badge">Temperatura convertida</div>

        <div class="result">Valor introducido</div>
        <div class="big"><?php echo htmlspecialchars($input_formatted) . " " . htmlspecialchars($from_unit); ?></div>

        <div class="result">Equivale a</div>
        <div class="big"><?php echo htmlspecialchars($result_formatted) . " " . htmlspecialchars($to_unit); ?></div>

        <div class="fromto" aria-label="Dirección de conversión">
        <span class="pill"><?php echo htmlspecialchars($from_unit); ?></span>
        <span>→</span>
        <span class="pill"><?php echo htmlspecialchars($to_unit); ?></span>
        </div>

        <div class="actions">
            <form action="form.php" method="get" style="display:inline;">
                <input type="hidden" name="t" value="<?php echo htmlspecialchars($input_formatted); ?>">
                <input type="hidden" name="to" value="<?php echo htmlspecialchars($convert_to); ?>">
                <button class="btn btn-primary" type="submit">Nueva conversión</button>
            </form>
        </div>
    </main>
    </body>
</html>