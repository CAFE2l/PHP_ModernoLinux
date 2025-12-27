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
        <h1>Anatomia de uma divisão</h1>
    </header>
    <main>
        <form action="<?= $_SERVER['PHP_SELF']; ?>" method="get">
            <label for="dividendo">Dividendo</label>
            <input type="number" name="dividendo" id="dividendo" required>

            <label for="divisor">Divisor</label>
            <input type="number" name="divisor" id="divisor" required>

            <input type="submit" value="Analisar">
        </form>
    </main>

    <section>
        <h2>Estrutura da Divisão</h2>
        <?php 
            $dividendo = $_GET['dividendo'] ?? 0;
            $divisor = $_GET['divisor'] ?? 1;

            $quociente = intdiv($dividendo, $divisor);
            $resto = $dividendo % $divisor;

            echo "<p>Analisando a divisão de <strong>$dividendo</strong> por <strong>$divisor</strong>:</p>";
            echo "<ul>
                    <li>O quociente é <strong>$quociente</strong></li>
                    <li>O resto é <strong>$resto</strong></li>
                  </ul>";
            ?>  
    </section>
</body>
</html>