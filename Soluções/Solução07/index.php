<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        $minimo = 1610;
        $salario = $_GET['sal'] ?? $minimo;
    ?>

    <header>
        <h1>Informe seu salário</h1>
    </header>
    <main>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="get">
            <label for="sal">Salário (R$)</label>
            <input type="number" name="sal" id="sal" value ="<?= $salario ?>" step="0.01" required>
            <p>Considerando o salário mínimno de <strong>R$<?= number_format($minimo, 2, ',', '.') ?></strong></p>
            <input type="submit" value="Calcular">
        </form>
    </main>

    <section>
        <h2>Resultado Final</h2>
        <?php 
            $tot = intdiv($salario, $minimo);
            $diff = $salario % $minimo;        

            echo "<p>Quem recebe um salário de R$".number_format($salario, 2, ',', '.')." equivale a $tot salários mínimos +<strong> R$".number_format($diff, 2, ',', '.')."</strong></p>"
        ?>
    </section>
</body>
</html>