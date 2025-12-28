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
        $dividendo = 7;
        $divisor = 3;
    
    ?>
    <header>
        <h1>
            Anatomia de uma divisão
        </h1>
    </header>
   
    <section>
        <h2>Estrutura de Divisão</h2>
        <?php 
            echo "<ul>";
            echo "<li>Dividendo: <strong>$dividendo</strong></li>";
            echo "<li>Divisor: <strong>$divisor</strong></li>";
            echo "<li>Quociente: <strong>" . intdiv($dividendo, $divisor) . "</strong></li>";
            echo "<li>Resto: <strong>" . ($dividendo % $divisor) . "</strong></li>";
            echo "</ul>";
        ?>
    </section>
</body>
</html>