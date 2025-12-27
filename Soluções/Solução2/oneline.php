<?php 
    $min = 100;
    $max = 10;
    $num= random_int($min, $max);

    //rand() = 1951 - Linear Congruential Generator (LCG)
    //mt_rand() = 1997 - Mersenne Twister Algorithm
    //A partir do PHP 7.1, rand() é um simples apontamento para mt_rand()
    //random_int() - Gera números aleatórios criptograficamente seguros
    echo "Gerando um número aletório entre $min e $max...";
    echo "\n";
    echo "O número sorteado foi: $num";


?>