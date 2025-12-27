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
      <h1>Informe um número</h1>    
    </header>
    <main>
        <section>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="numero">Número:</label>
            <input type="number" id="numero" name="numero" required>
            <input type="submit" value="Calcular Raízes">
            </form>
        </section>
    </main>

    <section>
        <h2>Resultado Final</h2>
        <p>Analisando o número <?= $_POST['numero'] ?? 'Nenhum número fornecido' ?>, temos:</p>
        <?php
            if (isset($_POST['numero'])) {
                $numero = $_POST['numero'];
                $raizQuadrada = sqrt($numero);
                $raizCubica = pow($numero, 1/3);
                echo "<ul>";
                echo "<li>Raiz Quadrada: " . number_format($raizQuadrada, 2) . "</li>";
                echo "<li>Raiz Cúbica: " . number_format($raizCubica, 2) . "</li>";
                echo "</ul>";
            }
            ?>
    </section>
</body>
</html>