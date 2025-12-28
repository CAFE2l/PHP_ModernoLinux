<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reajustador de Preços</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .range-container {
            display: flex;
            align-items: center;
            gap: 15px;
            margin: 15px 0;
        }
        
        #valor-reajuste {
            background: #372991;
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-weight: bold;
            min-width: 70px;
            text-align: center;
        }
        
        .resultado {
            background: linear-gradient(135deg, rgba(55, 41, 145, 0.1), rgba(55, 41, 145, 0.05));
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
            border-left: 4px solid #372991;
        }
        
        .diferenca {
            font-size: 1.2em;
            font-weight: bold;
            color: #4CAF50;
        }
        
        .negativo {
            color: #f44336;
        }
    </style>
</head>
<body>
    <header>
        <h1>Reajustador de Preços</h1>
    </header>
    
    <main>
        <form method="post" action="">
            <div class="form-group">
                <label for="preco">Preço do Produto (R$): </label>
                <input type="number" name="preco" id="preco" step="0.01" placeholder="0.00" min="0" 
                       value="<?php echo isset($_POST['preco']) ? htmlspecialchars($_POST['preco']) : ''; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="reajuste">Percentual de Reajuste: </label>
                <div class="range-container">
                    <input type="range" name="reajuste" id="reajuste" min="-100" max="200" step="0.5" 
                           value="<?php echo isset($_POST['reajuste']) ? htmlspecialchars($_POST['reajuste']) : '0'; ?>">
                    <output for="reajuste" id="valor-reajuste">
                        <?php echo isset($_POST['reajuste']) ? number_format($_POST['reajuste'], 1) : '0'; ?>%
                    </output>
                </div>
                <small>Permite reajuste negativo (desconto) até -100% e aumento até 200%</small>
            </div>
            
            <button type="submit" name="calcular">Calcular Reajuste</button>
            
            <!-- Pré-visualização em tempo real -->
            <div id="preview" class="resultado" style="display: none;">
                <h3>Pré-visualização:</h3>
                <p id="preview-text"></p>
            </div>
        </form>
    </main>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['calcular'])) {
        $preco = floatval($_POST['preco'] ?? 0);
        $reajuste = floatval($_POST['reajuste'] ?? 0);
        
        // Validar valores
        if ($preco <= 0) {
            $erro = "Por favor, informe um preço válido maior que zero.";
        } elseif ($reajuste < -100 || $reajuste > 200) {
            $erro = "O percentual de reajuste deve estar entre -100% e 200%.";
        } else {
            // Calcular
            $novoPreco = $preco * (1 + ($reajuste / 100));
            $diferenca = $novoPreco - $preco;
            
            // Formatar
            $precoFormatado = 'R$ ' . number_format($preco, 2, ',', '.');
            $novoPrecoFormatado = 'R$ ' . number_format($novoPreco, 2, ',', '.');
            $reajusteFormatado = number_format($reajuste, 1, ',', '.') . '%';
            $diferencaFormatada = 'R$ ' . number_format($diferenca, 2, ',', '.');
            
            // Determinar se é aumento ou desconto
            $tipo = $reajuste >= 0 ? 'aumento' : 'desconto';
            $classeDiferenca = $reajuste >= 0 ? '' : 'negativo';
        }
    ?>
    <section>
        <h2>Resultado do Reajuste</h2>
        
        <?php if (isset($erro)) { ?>
            <div class="erro">
                <p>⚠️ <?php echo $erro; ?></p>
            </div>
        <?php } else { ?>
            <div class="resultado">
                <p>O produto que custava <strong><?php echo $precoFormatado; ?></strong></p>
                <p>Com <strong><?php echo $reajusteFormatado; ?></strong> de <?php echo $tipo; ?></p>
                <p>Passa a custar: <strong><?php echo $novoPrecoFormatado; ?></strong></p>
                
                <p class="diferenca <?php echo $classeDiferenca; ?>">
                    Diferença: <?php echo $diferencaFormatada; ?>
                    (<?php echo $reajuste >= 0 ? '⏫ Aumento' : '⏬ Desconto'; ?>)
                </p>
                
                <hr>
                <h4>Resumo:</h4>
                <ul>
                    <li>Preço original: <?php echo $precoFormatado; ?></li>
                    <li>Percentual: <?php echo $reajusteFormatado; ?></li>
                    <li>Valor do <?php echo $tipo; ?>: <?php echo $diferencaFormatada; ?></li>
                    <li><strong>Novo preço: <?php echo $novoPrecoFormatado; ?></strong></li>
                </ul>
            </div>
        <?php } ?>
    </section>
    <?php } ?>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const precoInput = document.getElementById('preco');
            const rangeInput = document.getElementById('reajuste');
            const outputElement = document.getElementById('valor-reajuste');
            const previewDiv = document.getElementById('preview');
            const previewText = document.getElementById('preview-text');
            
            function atualizarPreview() {
                const preco = parseFloat(precoInput.value) || 0;
                const reajuste = parseFloat(rangeInput.value) || 0;
                
                if (preco > 0) {
                    const novoPreco = preco * (1 + (reajuste / 100));
                    const diferenca = novoPreco - preco;
                    
                    previewText.innerHTML = `
                        Preço: R$ ${preco.toFixed(2)}<br>
                        Reajuste: ${reajuste.toFixed(1)}%<br>
                        <strong>Novo preço: R$ ${novoPreco.toFixed(2)}</strong><br>
                        Diferença: R$ ${diferenca.toFixed(2)}
                    `;
                    previewDiv.style.display = 'block';
                } else {
                    previewDiv.style.display = 'none';
                }
            }
            
            // Atualizar valor do range
            if (rangeInput && outputElement) {
                outputElement.textContent = rangeInput.value + '%';
                
                rangeInput.addEventListener('input', function() {
                    outputElement.textContent = this.value + '%';
                    atualizarPreview();
                });
            }
            
            // Atualizar preview quando preço mudar
            if (precoInput) {
                precoInput.addEventListener('input', atualizarPreview);
            }
            
            // Inicializar preview se já houver valores
            if (precoInput.value && rangeInput.value) {
                atualizarPreview();
            }
        });
    </script>
</body>
</html>