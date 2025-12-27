<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Salários Mínimos</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }
        
        header {
            background-color: #4CAF50;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }
        
        main, section {
            background-color: white;
            padding: 20px;
            margin: 20px auto;
            max-width: 600px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        
        label {
            font-weight: bold;
            margin-bottom: 5px;
        }
        
        input[type="number"] {
            padding: 10px;
            border: 2px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }
        
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        
        p {
            margin: 10px 0;
            line-height: 1.6;
        }
        
        section {
            background-color: #e8f5e9;
            border-left: 4px solid #4CAF50;
        }
        
        .note {
            font-size: 14px;
            color: #666;
            font-style: italic;
        }
    </style>
</head>
<body>
    <header>
        <h1>Calculadora de Salários Mínimos</h1>
    </header>
    
    <main>
        <form action="" method="get">
            <label for="salario">Salário (R$)</label>
            <input type="number" name="salario" id="salario" step="0.01" min="0" required>
            <p class="note">Considerando o salário mínimo de R$ 1.621,00</p>
            <input type="submit" value="Calcular">
        </form>
    </main>

    <?php
    if(isset($_GET['salario']) && is_numeric($_GET['salario'])) {
        $salario = (float) $_GET['salario'];
        $salario_minimo = 1621.00;
        
        // Calcula quantos salários mínimos
        $quantidade_salarios = $salario / $salario_minimo;
        
        // Calcula o resto (valor que excede os salários inteiros)
        $resto = fmod($salario, $salario_minimo);
        
        // Formata os valores
        $salario_formatado = number_format($salario, 2, ',', '.');
        $quantidade_formatada = number_format($quantidade_salarios, 2, ',', '.');
        $resto_formatado = number_format($resto, 2, ',', '.');
        
        // Determina quantos salários mínimos inteiros
        $salarios_inteiros = floor($salario / $salario_minimo);
    ?>
    <section>
        <h2>Resultado Final</h2>
        <p>Quem recebe um salário de <strong>R$ <?= $salario_formatado ?></strong>:</p>
        <p>• Ganha aproximadamente <strong><?= $quantidade_formatada ?> salários mínimos</strong></p>
        <p>• Isso equivale a <strong><?= $salarios_inteiros ?> salários mínimos inteiros</strong> (R$ <?= number_format($salarios_inteiros * $salario_minimo, 2, ',', '.') ?>)</p>
        <p>• Mais <strong>R$ <?= $resto_formatado ?></strong> adicionais</p>
        <p class="note">Salário mínimo considerado: R$ <?= number_format($salario_minimo, 2, ',', '.') ?></p>
    </section>
    <?php } ?>
</body>
</html>