<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Moedas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Conversor de Moedas</h1>
    </header>
<main>
    <?php
        // 1. Tratamento da entrada (Vírgula vira ponto)
        $entrada = $_GET['din'] ?? 0;
        // Remove pontos de milhar (se houver) e troca vírgula decimal por ponto
        // Ex: 1.500,50 vira 1500.50
        $valorReal = str_replace(",", ".", str_replace(".", "", $entrada));

        // 2. Datas Corrigidas (m-d-Y)
        $inicio = date("m-d-Y", strtotime("-7 days")); // Tirei o 'i' e coloquei 'd'
        $fim = date("m-d-Y");

        // 3. Montagem da URL
        $url = 'https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/CotacaoDolarPeriodo(dataInicial=@dataInicial,dataFinalCotacao=@dataFinalCotacao)?@dataInicial=\''. $inicio .'\'&@dataFinalCotacao=\''. $fim .'\'&$top=1&$orderby=dataHoraCotacao%20desc&$format=json&$select=cotacaoCompra,dataHoraCotacao';    
    
        // 4. Tratamento de erro caso a API falhe (Internet ou BC fora do ar)
        // O @ na frente esconde avisos se falhar o file_get_contents
        $dados = json_decode(@file_get_contents($url), true);

        // Verifica se pegou os dados antes de tentar ler
        if ($dados && isset($dados["value"][0]["cotacaoCompra"])) {
            $cotacao = $dados["value"][0]["cotacaoCompra"];
            
            // Cálculo
            $valorDolar = $valorReal / $cotacao;

            // Formatação
            $padrao = numfmt_create("pt_BR", NumberFormatter::CURRENCY);
            
            echo "<p>Cotação atual: <strong>" . numfmt_format_currency($padrao, $cotacao, "BRL") . "</strong></p>";
            echo "<p>Seus " . numfmt_format_currency($padrao, $valorReal, "BRL") . " equivalem a <strong>" . numfmt_format_currency($padrao, $valorDolar, "USD") . "</strong></p>";
        } else {
            echo "<p>Não foi possível obter a cotação do Banco Central no momento.</p>";
        }
    ?>
    <button onclick="javascript:history.go(-1)">Voltar</button>
</main>
</body>
</html>