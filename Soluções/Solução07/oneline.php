<?php 
    $salario = 8160;
    $min = 1000;

    $tot = intdiv($salario,$min);

    $diff = $salario % $min;


    echo "Quem ganha $salario o ganha $tot salários mínimos. + $diff reais.";




?> 