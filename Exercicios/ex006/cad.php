<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Resultado do Processamento</h1>
    </header>
    <main>
        <?php 
            //var_dump($_REQUEST); // $_GET $_POST $_COOKIES
            $nome = $GET['nome'] ?? 'Não informado';
            $sobrenome = $_GET['sobrenome'] ?? 'Não informado';

            echo "<p>É um prazer te conhecer, <strong>$nome $sobrenome</strong>, este é o meu site</p>";
             ?>

            <p><a href="index.html">Voltar</a></p>
    </main>
</body>
</html>