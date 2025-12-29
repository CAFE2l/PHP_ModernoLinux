<?php 
    $preço = 8732.93;
    $porc = 20;
    $formula = ($preço * $porc) / 100;
    $novo = $preço + $formula;
    echo "$porc% de $preço é igual a $formula e o produto vai custar $novo";
?>