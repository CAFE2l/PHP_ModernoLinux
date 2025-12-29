<?php 
    $saque = 832;
    $resto = $saque;

    //Saque de notas de 100
    $tot100 = floor($resto / 100);

    $resto %= 100;

    //Saque de R$50
    $tot50 = floor($resto / 50);
    $resto %= 50;

    //Saque de R$ 10
    $tot10 = floor($resto / 10);
    $resto %= 10;

    //Saque de R$5
    $tot5 = floor($resto / 5);
    $resto %= 5;

    echo "Seu saque de R$ $saque vai resultar em: $tot100 notas de 100, $tot50 notas de 50, $tot10 notas de 10 e $tot5 notas de 5.
    Faltou $resto reais a sacar";
?>