<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerador de número aleatórios</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Gerador de número Aleatório</h1>
    </header>
    <main>
        <?php 
            $min = 0;
            $max = 100;
            $num = random_int($min, $max);
            echo "<p>Número aleatório entre $min e $max: <strong>$num</strong></p>";
        ?>
        <button onclick="location.reload()">Gerar outro</button>
    </main>
</body>
</html>