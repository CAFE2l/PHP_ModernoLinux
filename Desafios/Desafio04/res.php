<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Moedas - Banco Central</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>💱 Conversor de Moedas</h1>
    </header>

    <main>
        <?php
        // Variáveis para armazenar dados
        $valor_brl = '';
        $moeda_selecionada = 'USD';
        $resultado = null;
        $erro = null;
        $cotacao = null;
        $data_cotacao = null;

        // Verifica se o formulário foi enviado
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $valor_brl = $_POST['valor'] ?? 0;
            $moeda_selecionada = $_POST['moeda'] ?? 'USD';

            // Códigos das moedas na API do Banco Central
            $moedas = [
                'USD' => 1,    // Dólar Americano
                'EUR' => 21,   // Euro
                'GBP' => 18,   // Libra Esterlina
                'ARS' => 59,   // Peso Argentino
                'JPY' => 86,   // Iene Japonês
                'CAD' => 218,  // Dólar Canadense
                'CNY' => 222   // Yuan Chinês
            ];

            // Monta a URL da API do Banco Central
            $codigo_moeda = $moedas[$moeda_selecionada];
            $data_hoje = date('m-d-Y'); // Formato MM-DD-YYYY
            
            $url = "https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/CotacaoMoedaDia(moeda=@moeda,dataCotacao=@dataCotacao)?@moeda='{$moeda_selecionada}'&@dataCotacao='{$data_hoje}'&\$format=json";

            // Faz a requisição para a API
            $response = @file_get_contents($url);

            if ($response !== false) {
                $dados = json_decode($response, true);

                // Verifica se retornou dados
                if (isset($dados['value']) && count($dados['value']) > 0) {
                    // Pega a cotação de compra
                    $cotacao = $dados['value'][0]['cotacaoCompra'];
                    $data_cotacao = date('d/m/Y', strtotime($dados['value'][0]['dataHoraCotacao']));
                    
                    // Calcula a conversão
                    $resultado = $valor_brl / $cotacao;
                } else {
                    $erro = "Cotação não disponível para hoje. Tente outra data ou moeda.";
                }
            } else {
                $erro = "Erro ao conectar com a API do Banco Central.";
            }
        }

        // Nomes das moedas para exibição
        $nomes_moedas = [
            'USD' => 'Dólar Americano (USD)',
            'EUR' => 'Euro (EUR)',
            'GBP' => 'Libra Esterlina (GBP)',
            'ARS' => 'Peso Argentino (ARS)',
            'JPY' => 'Iene Japonês (JPY)',
            'CAD' => 'Dólar Canadense (CAD)',
            'CNY' => 'Yuan Chinês (CNY)'
        ];
        ?>

        <form method="POST" action="">
            <label for="valor">Valor em Reais (BRL)</label>
            <input 
                type="number" 
                id="valor" 
                name="valor" 
                step="0.01" 
                min="0" 
                value="<?php echo htmlspecialchars($valor_brl); ?>" 
                placeholder="Ex: 100.00"
                required
            >

            <label for="moeda">Converter para:</label>
            <select id="moeda" name="moeda" required>
                <?php foreach ($nomes_moedas as $codigo => $nome): ?>
                    <option value="<?php echo $codigo; ?>" 
                        <?php echo ($moeda_selecionada === $codigo) ? 'selected' : ''; ?>>
                        <?php echo $nome; ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <input type="submit" value="💰 Converter">
        </form>

        <?php if ($resultado !== null): ?>
            <section class="resultado sucesso">
                <h2>Resultado da Conversão</h2>
                <p class="valor-convertido">
                    R$ <?php echo number_format($valor_brl, 2, ',', '.'); ?> 
                    = 
                    <strong><?php echo $moeda_selecionada; ?> <?php echo number_format($resultado, 2, '.', ','); ?></strong>
                </p>
                <p class="info-cotacao">
                    📊 Cotação: R$ <?php echo number_format($cotacao, 4, ',', '.'); ?><br>
                    📅 Data: <?php echo $data_cotacao; ?>
                </p>
            </section>
        <?php endif; ?>

        <?php if ($erro): ?>
            <section class="resultado erro">
                <h2>⚠️ Atenção</h2>
                <p><?php echo htmlspecialchars($erro); ?></p>
                <p><small>💡 Dica: A API do Banco Central só fornece cotações de dias úteis.</small></p>
            </section>
        <?php endif; ?>

        <article>
            <h3>📌 Informações</h3>
            <p>Este conversor usa cotações oficiais do <strong>Banco Central do Brasil</strong>.</p>
            <p>As cotações são atualizadas apenas em dias úteis, por volta das 13h.</p>
            <p>Valores são baseados na cotação de <strong>compra</strong> da moeda.</p>
        </article>
    </main>

    <footer>
        <p>Dados fornecidos pela API oficial do Banco Central do Brasil</p>
    </footer>
</body>
</html>