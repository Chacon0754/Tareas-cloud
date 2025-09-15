<?php
    /*
        Integrantes:
            Chacón Orduño Martín Eduardo - 351840
            Cruz Juárez Guillermo - 352905
            Ruiz Almeida Josue David - 358472
            Mendoza Escarzaga Erick - 357307
    */
    if (isset($_POST["rows"]) && !is_numeric($_POST["rows"])){
            header("Location: form.php?error=1");
            exit;
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario filas</title>
    <style>
        :root{
            --bg: #f6f7fb;
            --card: #ffffff;
            --text: #1f2937;
            --muted: #6b7280;
            --primary: #2563eb;
            --primary-2: #1e40af;
            --error: #dc2626;
            --border: #e5e7eb;
            --table-head: #f3f4f6;
            --shadow: 0 10px 25px rgba(0,0,0,.07);
            --radius: 16px;
        }
        @media (prefers-color-scheme: dark){
            :root{
                --bg: #0b1220;
                --card: #0f172a;
                --text: #e5e7eb;
                --muted: #9ca3af;
                --primary: #60a5fa;
                --primary-2: #3b82f6;
                --error: #f87171;
                --border: #1f2a44;
                --table-head: #111827;
                --shadow: 0 10px 25px rgba(0,0,0,.45);
            }
        }

        *{box-sizing:border-box}
        html,body{height:100%}
        body{
            margin:0;
            font-family: ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial, "Apple Color Emoji","Segoe UI Emoji";
            background: radial-gradient(1200px 800px at 20% -10%, rgba(37,99,235,.15), transparent 60%),
                        radial-gradient(1000px 600px at 120% 20%, rgba(99,102,241,.12), transparent 60%),
                        var(--bg);
            color: var(--text);

            /* 👇 Cambios clave */
            display:flex;
            flex-direction: column;   /* antes estaba implícito en fila (row) */
            align-items: center;      /* centrado horizontal */
            justify-content: flex-start;
            gap: 28px;                /* espacio entre formulario y tabla */
            padding:40px 16px;
        }


        form{
            width:100%;
            max-width:540px;
            background:var(--card);
            border:1px solid var(--border);
            border-radius: var(--radius);
            padding:20px;
            box-shadow: var(--shadow);
            backdrop-filter: blur(4px);
        }

        form label{
            display:block;
            font-weight:600;
            margin: 0 0 8px 2px;
        }

        #rows{
            width:100%;
            padding:12px 14px;
            border:1px solid var(--border);
            border-radius:12px;
            background:transparent;
            color:var(--text);
            outline: none;
            transition: border-color .2s, box-shadow .2s, transform .04s;
        }
        #rows::placeholder{color:var(--muted)}
        #rows:focus{
            border-color: var(--primary);
            box-shadow: 0 0 0 4px color-mix(in srgb, var(--primary) 18%, transparent);
        }

        input[type="submit"]{
            margin-top:16px;
            display:inline-block;
            background:linear-gradient(180deg, var(--primary), var(--primary-2));
            color:#fff;
            border:0;
            border-radius:12px;
            padding:12px 16px;
            font-weight:700;
            cursor:pointer;
            transition: transform .06s ease, filter .2s ease, box-shadow .2s ease;
            box-shadow: 0 6px 14px rgba(37,99,235,.25);
        }
        input[type="submit"]:hover{ filter:brightness(1.05) }
        input[type="submit"]:active{ transform: translateY(1px) }

        .error-message{
            margin-top:8px;
            font-size:.95rem;
            color: var(--error);
            background: color-mix(in srgb, var(--error) 12%, transparent);
            border:1px solid color-mix(in srgb, var(--error) 30%, transparent);
            padding:10px 12px;
            border-radius:10px;
        }

        .table{
            width:100%;
            max-width:min(1000px, 95vw);
            margin:24px auto 0;
        }

        /* Forzamos estilos sobre el border="1" inline del <table> */
        .table table{
            width:100%;
            border-collapse: collapse;
            border:1px solid var(--border) !important;
            border-radius: 14px;
            overflow:hidden; /* bordes redondeados visibles */
            background: var(--card);
            box-shadow: var(--shadow);
        }
        .table th,
        .table td{
            border:1px solid var(--border) !important;
            padding:12px 14px;
            text-align:left;
        }
        .table th{
            background: var(--table-head);
            position: sticky;
            top: 0;
            z-index: 1;
            font-weight:700;
            letter-spacing:.2px;
        }
        .table tr:nth-child(even) td{
            background: color-mix(in srgb, var(--table-head) 35%, transparent);
        }
        .table tr:hover td{
            background: color-mix(in srgb, var(--primary) 8%, transparent);
        }

        /* Layout helpers */
        form > .error-message:empty{ display:none }

        /* Pequeñas mejoras responsivas */
        @media (max-width: 640px){
            form{ padding:16px }
            .table table{ font-size: .95rem }
        }
    </style>
</head>

<body>
    <form action="form.php" method="post">

        <label for="rows">Número de filas:</label>
        <input type="text" name="rows" placeholder="filas ej= 3" id="rows" required>   
        
        <?php
            if (isset($_GET["error"]) && $_GET["error"] == 1): ?>
                <div class="error-message">
                    Filas debe ser numerico
                </div>
        <?php endif; ?>
            
        <input type="submit" value="Construir"> 
    
    </form>
    <div class="table">
        <?php
            const COLUMNS = 3;
            if (isset($_POST["rows"])){
                echo '<table border="1">';
                echo "<tr>";
                echo "<th>Columna 1</th>";
                echo "<th>Columna 2</th>";
                echo "<th>Columna 3</th>";
                echo "</tr>";
                $rows = $_POST["rows"];
                for ($i = 0; $i < $rows; $i++){
                echo "<tr>";
                    for ($j = 0; $j < COLUMNS; $j++){
                        echo "<td> Fila ". ($i + 1). " Celda ". ($j + 1). "</td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";
            }
        ?>
    </div>
</body>
</html>

