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
        <h1>Analisador de Número Real</h1>
    </header>
    <main>
        <?php
            $num = $_POST['num'] ?? 0;
            echo "<p>Analisando o número <strong>".number_format($num, 3, ",", ".")."</strong> informado pelo usuário.</p>";

            $int = (int)$num; 
            $fra = $num - $int;

            echo "<ul>
                <li>A parte inteira do número é <strong>".number_format($int, 0, ",", ".")."</strong></li>
                <li>A parte fracionária do número é <strong>".number_format($fra, 3, ",", ".")."</strong></li>            
            </ul>";
        ?>
        <a href="index.html"><button>Voltar</button></a>
    </main>
</body>
</html>