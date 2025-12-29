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
        $total = $_REQUEST['seg']??0;

    ?>
    <main>
        <h1>Calculadora de Tempo</h1>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="get">
            <label for="seg">Qual é o total de segundos?</label>
            <input type="number" name="seg" id="seg" min="0" step="1" required value="<?= $total ?>">
            <input type="submit" value="Calcular">
        </form>
    </main>

    <?php 

    $sobra = $total;
    //Total de Semanas

    $semana = (int)($sobra / 604800);
    $sobra = $sobra % 604800;

    //total de Dias
    $dia = (int)($sobra / 86400);
    $sobra = $sobra % 86400;

    //Total de Horas

    $hora = (int)($sobra / 3600);
    $sobra = $sobra % 3600;

    //Total de Minutos 
    $minuto = (int)($sobra / 60);
    $sobra = $sobra % 60;

    //Total de Segundos
    $segundo = $sobra;
 
    
    ?>
        
    <section>
        <h2>Totalizando tudo</h2>
        <p>Analisando o valor que você digitou, <strong><?= number_format($total, 0,",", ".") ?> de segundos </strong>equivalem a um total de: </p>
        <ul>
            <li><?= $semana ?> Semanas</li>
            <li><?= $dia ?> dias</li>
            <li><?= $hora ?> Horas</li>
            <li><?= $minuto ?> Minutos </li>
            <li><?= $segundo ?> segundos</li>
        </ul>
    </section>
</body>
</html>