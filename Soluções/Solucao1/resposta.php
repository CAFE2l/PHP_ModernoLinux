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
        <h1>Resultado Final</h1>
    </header>
    <main>
        <p>
            <?php 
                $n = $_REQUEST["num"];
                $ant = $n - 1;
                $suc = $n + 1;  

                echo "O antecessor de $n é $ant <br>";
                echo "O sucessor de $n é $suc";
            ?>
        </p>
        <a href="index.html"><button>Voltar</button></a>
    </main>
</body>
</html>