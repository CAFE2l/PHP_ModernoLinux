<?php
    $total = 2000000;
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
    echo "$total segundos equivalem a $semana semanas, $dia dias, $hora horas, $minuto minutos e $segundo segundos";
?>