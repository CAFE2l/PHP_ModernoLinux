<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analisador de Número Real</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Analisador de Número Real</h1>
    </header>
    <main>
        <?php
            // 1. Pega o valor ou assume 0
            $valor = $_GET['valor'] ?? 0;

            // 2. TRATAMENTO IMPORTANTE: Troca vírgula por ponto para o PHP entender
            // Se o usuário digitou "10,50", vira "10.50"
            $valor = str_replace(",", ".", $valor);

            // 3. Verifica se é numérico para não dar erro
            if(!is_numeric($valor)) {
                echo "<p>Por favor, digite um número válido.</p>";
            } else {
                // Segurança: Mostra na tela o número original formatado bonitinho
                // O htmlspecialchars evita ataques de script
                echo "<p>Analisando o número <strong>" . number_format($valor, 3, ",", ".") . "</strong></p>";

                $int = (int)$valor;
                
                // Cálculo da fração
                $frac = $valor - $int;

                echo "<ul>";
                echo "<li>Valor inteiro: <strong>" . number_format($int, 0, ",", ".") . "</strong></li>";
                // Mostra a fração com 3 casas decimais
                echo "<li>Valor fracionário: <strong>" . number_format($frac, 3, ",", ".") . "</strong></li>";
                echo "</ul>";
            }
        ?>
        <button onclick="javascript:history.go(-1)">Voltar</button>
    </main>
</body>
</html>