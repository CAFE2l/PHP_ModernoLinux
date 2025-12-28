<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <h1>Médias Aritméticas</h1>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="get">
            <label for="v1">Valor 1:</label>
            <input type="number" name="v1" id="v1" required>

            <label for="p1">Peso 1:</label>
            <input type="number" name="p1" id="p1" required>

            <label for="v2">Valor 2:</label>
            <input type="number" name="v2" id="v2" required>

            <label for="p2">Peso 2:</label>
            <input type="number" name="p2" id="p2" required>

            <input type="submit" value="Calcular Médias">
        </form>
    </main>
    <section>
        <h2>Cálculo das Médias</h2>
        <p>Analisando os valores <?= $_GET['v1'] ?> e <?= $_GET['v2'] ?> com pesos <?= $_GET['p1'] ?> e <?= $_GET['p2'] ?></p>

        <ul>
            <li>Média Aritmética Simples: <?= ($_GET['v1'] + $_GET['v2']) / 2 ?></li>
            <li>Média Aritmética Ponderada: <?= ($_GET['v1'] * $_GET['p1'] + $_GET['v2'] * $_GET['p2']) / ($_GET['p1'] + $_GET['p2']) ?></li>
        </ul>
    </section>
</body>
</html>