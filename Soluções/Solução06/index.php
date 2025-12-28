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
        $dividendo = $_GET['d1'] ?? 0;
        $divisor = $_GET['d2'] ?? 1;
    
    ?>
    <header>
        <h1>
            Anatomia de uma divisão
        </h1>
    </header>
    <main>
        <form action="" method="get">
            <label for="d1">Dividendo:</label>
            <input type="number" name="d1" id="d1" required min=0 value="<?= $dividendo ?>">

            <label for="d2">Divisor: </label>
            <input type="number" name="d2" id="d2" required min=1 value="<?= $divisor ?>">

            <input type="submit" value="Analisar">
        </form>
    </main>
    <section>
        <h2>Estrutura de Divisão</h2>
        <?php 
            
        ?>

        <table class="divisao">
            <tr>
                <td><?= $dividendo ?></td>
                <td><?= $divisor ?></td>

            </tr>
            <tr>
                <td><?= intdiv($dividendo, $divisor) ?></td>
                <td><?= $dividendo % $divisor ?></td>
            </tr>
        </table>
    </section>
</body>
</html>