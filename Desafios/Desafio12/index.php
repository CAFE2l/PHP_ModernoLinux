<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Calculadora de Tempo</h1>
    </header>
    <main>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <label for="segundos">Qual é o total de segundos?</label>
            <input type="number" id="segundos" name="segundos" required>        

            <input type="submit" value="Calcular">
        </form>
    </main>

    <section>
        <h2>Totalizando tudo</h2>
        <p>Analisando o valor que você digitou, <?= $_POST['segundos'] ?? 0 ?> equivalem a um total de:</p>
        <?php
            if (isset($_POST['segundos'])) {
                $totalSegundos = (int)$_POST['segundos'];
                $semanas = floor($totalSegundos / 604800);
                $dias = floor($totalSegundos / 86400);
                $horas = floor($totalSegundos / 3600);
                $minutos = floor(($totalSegundos % 3600) / 60);
                $segundosRestantes = $totalSegundos % 60;

                echo "<ul>";
                echo "<li>$semanas semanas</li>";
                echo "<li>$dias dias</li>";
                echo "<li>$horas horas</li>";
                echo "<li>$minutos minutos</li>";
                echo "<li>$segundosRestantes segundos</li>";
                echo "</ul>";
            }

            ?>
    </section>
</body>
</html>