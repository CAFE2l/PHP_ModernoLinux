<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Moedas</title>
    <link rel="stylesheet" href="style.css">    
</head>
<body>
    <header>
        <h1>Conversor de Moedas v1.0</h1>
    </header>
    <main>
        <p>Seus <?php echo "R\$" . number_format($_GET['moeda'], 2, ',', '.'); ?> equivalem a <?php echo "US\$" . number_format($_GET['moeda'] * 5.50, 2, '.', ','); ?></p>
        <p><strong>Obs:</strong> O valor do dólar está fixo em R$5,50.</p>
    </main>
    <a href="index.html"><button>Voltar</button></a>
</body>
</html>