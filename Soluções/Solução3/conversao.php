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
        <h1>Conversor de Moedas</h1>
    </header>
<main>
    
        <?php
    
    $padrao = numfmt_create("pt_BR", NumberFormatter::CURRENCY);
    echo "Seus R$ " . numfmt_format_currency($padrao, $_GET['din'] ?? 0, "BRL") . "Equivalem a US$ " . numfmt_format_currency($padrao, $_GET['din'] / 5.2, "USD");
    ?>
    <a href="index.html"><button>Voltar</button></a>
</main>
</body>
</html>