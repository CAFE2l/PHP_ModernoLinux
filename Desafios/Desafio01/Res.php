<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio 01</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
     <header>
        <h1>Resultado Final</h1>
    </header>
      <section>
        <p>O número informado foi: <?php echo $_GET['num']; ?></p>
        <p>O seu antecessor é: <?php  echo $_GET['num'] - 1 ?></p>
        <p>O seu sucessor é: <?php  echo $_GET['num'] + 1 ?></p>
    </section>
    <p><a href="index.html">Voltar</a></p>
</body>
</html>