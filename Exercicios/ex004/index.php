<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tipos Primitivos em PHP</title>
</head>
<body>
    <h1>Teste de tipos primitivos</h1>
    <?php
        //$num = 0b1010;
        //echo "O valor da variável é $num";
        //$valor = 45.2;
        //var_dump($valor);


        //$num = (integer)3e2;
        //echo "<br>O valor é $num";
        //var_dump($num);

        //$casado = true;
        //var_dump($casado);
        //echo "O valor é $casado";

        //$vet = [6, 2,9, 3, 5];
        //print_r($vet);

        class Pessoa{
            private string $nome;

        }


        $p = new Pessoa();
        var_dump($p);
    ?>
</body>
</html>