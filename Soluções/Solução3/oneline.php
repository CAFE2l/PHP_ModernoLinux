<?php
    $cotação = 5.56;
    $Real = 1000;
    $Dólar = $Real / $cotação;

    $Dólar = $Real / $cotação;

    //Formatação de moedas com internacionalização
    $padrão = numfmt_create("pt_BR", NumberFormatter::CURRENCY);
    echo "Seus R$".numfmt_format_currency($padrão, $Real, "BRL")." equivalem a US$".numfmt_format_currency($padrão, $Dólar, "USD").".";  