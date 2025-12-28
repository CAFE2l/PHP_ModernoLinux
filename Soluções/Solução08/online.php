<?php 
 $num = 64;

 //$rq = sqrt($num);
 $rq = $num ** (1/2);
 $rc = $num ** (1/3);

    echo "A raiz quadrada de $num é " . number_format($rq, 2, ',', '.');
    echo "\n";
    echo "A raiz cúbica de $num é " . number_format($rc, 2, ',', '.');

?>