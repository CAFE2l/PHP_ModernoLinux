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
        <h1>Informe seu Salário</h1>
    </header>
    <main>
        <form action="<?=$_SERVER["PHP_SELF"] ?>" method="get">
            <label for="salario">Salário</label>
            <input type="number" name="salario" id="salario" required>
             <p>Considerando o salário mínimo de R$1.621,00 </p>
            <input type="submit" value="Calcular">
        </form>
    </main>

    <section>
        <h1>Resultado Final</h1>
        <p>Quem recebe um salário de <?= number_format($_GET['salario'] ?? 0, 2, ",", ".") ?>, ganha <?= number_format($_GET['salario'] ?? 0 / 1621, 2, ",", ".") ?> salários mínimos + <?= number_format($_GET['salario'] ?? 0 % 1621, 2, ",", ".") ?></p>
    </section>
</body>
</html>