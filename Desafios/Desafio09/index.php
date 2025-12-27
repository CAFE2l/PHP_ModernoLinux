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
        <h1>Médias Aritméticas</h1>
    </header>
    <main>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <label for="v1">Valor 1:</label>

            <input type="number" id="v1" name="v1" required>

            <label for="p1">Peso 1:</label>
            <input type="number" id="p1" name="p1" required>

            <label for="v2">Valor 2:</label>
            <input type="number" id="v2" name="v2" required>

            <label for="p2">Peso 2:</label>
            <input type="number" id="p2" name="p2" required>

            <input type="submit" value="Calcular Médias">
        </form>
    </main>
    <strong>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $v1 = floatval($_POST['v1']);
            $p1 = floatval($_POST['p1']);
            $v2 = floatval($_POST['v2']);
            $p2 = floatval($_POST['p2']);
            // Cálculo da média aritmética simples
            $mediaSimples = ($v1 + $v2) / 2;
            // Cálculo da média ponderada
            $mediaPonderada = (($v1 * $p1) + ($v2 * $p2)) / ($p1 + $p2);
            echo "<section>";
            echo "<h2>Cálculo das Médias</h2>";
            echo "<p>Analisando os valores $v1 e $v2:</p>";
            echo "<ul>";
            echo "<li>Média Aritmética Simples: " . number_format($mediaSimples, 2) . "</li>";
            echo "<li>Média Ponderada: " . number_format($mediaPonderada, 2) . "</li>";
            echo "</ul>";
            echo "</section>";
        }
        ?>
    </strong>
   
</body>
</html>