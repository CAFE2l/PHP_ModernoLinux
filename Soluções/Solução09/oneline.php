<?php 
    $v1 = 10;
    $v2 = 16;
    $p1 = 2;
    $p2 = 3;
    $ma = ($v1 + $v2) / 2;
    echo "A média entre $v1 e $v2 é $ma";

    $mp = ($v1*$p1 + $v2*$p2) / ($p1 + $p2);

    echo "\n";
    echo "A média ponderada entre $v1 com peso $p1 e $v2 com peso $p2 é $mp";
?>