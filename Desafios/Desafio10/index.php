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
        <h1>Calculando sua idade</h1>
    </header>
    <main>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <label for="nascimento">Em que ano você nasceu?</label>
            <input type="number" name="nascimento" id="nascimento" required>

            <label for="futuro">Quer saber sua idade em que ano? (atualmente estamos em <strong>2025</strong>)</label>
            <input type="number" name="futuro" id="futuro" required>
            <input type="submit" value="Qual será minha idade?">
        </form>
    </main>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nascimento = intval($_POST['nascimento']);
        $futuro = intval($_POST['futuro']);
        $idade = $futuro - $nascimento;

    }
    
    ?>

    <section>
        <h2>Resultado</h2>
        <p>Quem nasceu em <?= $nascimento ?> vai ter <?= abs($idade) ?> anos em <?= $futuro ?>.</p>
    </section>
</body>
</html>