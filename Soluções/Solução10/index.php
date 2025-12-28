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
    $atual = date("Y");
    $nasc = $_GET['nasc'] ?? 2000;
    $ano = $_GET['ano'] ?? $atual;
    
    
    ?>
    <main>
        <h1>Calculando a sua idade</h1>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="get">
            <label for="nasc">Em que ano você nasceu?</label>
            <input type="number" name="nasc" id="nasc" min="1900" max="2024" value="<?= $nasc ?>">
            
            <label for="ano">Quer saber sua idade em que ano? (atualmente estamos em <strong>2025</strong>)</label>
            <input type="number" name="ano" id="ano" min="2024" value="<?= $ano ?>">
            <input type="submit" value="Calcular idade">
        </form>
    </main>
    <section>
        <h2>Resultado</h2>
        <p>Quem nasceu me <?= $_GET['nasc'] ?>, vai ter <?= $_GET['ano'] - $_GET['nasc'] ?> anos em <?= $_GET['ano'] ?></p>
    </section>
</body>
</html>