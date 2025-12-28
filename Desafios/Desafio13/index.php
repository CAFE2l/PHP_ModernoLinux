<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caixa Eletrônico</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Estilos Internos */
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f4f4f4;
        }

        /* Logo da Caixa */
        .logo-caixa {
            width: 250px; /* Ajuste o tamanho da logo aqui */
            margin-top: 20px;
        }

        /* Lista de notas e moedas */
        ul {
            list-style-type: none; /* Remove as bolinhas da lista */
            padding: 0;
        }

        ul li {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
            font-size: 1.2em;
            font-weight: bold;
        }

        /* Tamanho das notas e moedas */
        ul li img {
            width: 80px; /* Ajuste o tamanho das notas aqui */
            height: auto;
            margin-right: 15px;
            box-shadow: 2px 2px 5px rgba(0,0,0,0.2);
            border-radius: 4px;
        }

        main {
            margin: 20px auto;
            padding: 20px;
            background: white;
            max-width: 500px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <section>
        <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse4.mm.bing.net%2Fth%2Fid%2FOIP.3-FxMw9pvJQs_O42MidHNAHaCQ%3Fpid%3DApi&f=1&ipt=d7c018d3aaa94cead3283e32a85a75176e2c6ff47b2469fcbfb65f77fd612c3f&ipo=images" alt="Logo Caixa" class="logo-caixa">
    </section>

    <header>
        <h1>Caixa Eletrônico</h1>
    </header>

    <main>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <label for="valor">Qual valor você deseja sacar? (R$)</label>
            <input type="number" name="valor" id="valor" step="0.05" min="0" required>
            <input type="submit" value="Sacar">
        </form>
    </main>

    <section>
    <?php 
    $valor_saque = $_POST['valor'] ?? 0;
    // Transformamos em centavos para evitar erros de precisão matemática
    $resto = $valor_saque * 100; 

    echo "<h2>Saque de R$" . number_format($valor_saque, 2, ',', '.') . " realizado</h2>";
    echo "<p>O caixa eletrônico vai te entregar as seguintes notas:</p>";

    $notas = [
        10000 => "../../Imagens/100-reais.jpg",
        5000  => "../../Imagens/50-reais.jpg",
        2000  => "../../Imagens/20-reais.jpg",
        1000  => "../../Imagens/10-reais.jpg",
        500   => "../../Imagens/5-reais.jpg",
        200   => "../../Imagens/2-reais.jpg",
        100   => "../../Imagens/1-real.jpg",
        50    => "../../Imagens/50cents.png",
        25    => "../../Imagens/25cents.jpg",
        10    => "../../Imagens/10cents.jpg",
        5     => "../../Imagens/5cents.jpg"
    ];

    echo "<ul>";
    foreach ($notas as $valor_cedula => $caminho_imagem) {
        // Quantas notas cabem no resto?
        $quantidade = intdiv($resto, $valor_cedula); 

        if ($quantidade > 0) {
            // Escreve o LI dentro do loop para aparecerem todos!
            echo "<li><img src='$caminho_imagem'> x$quantidade</li>";
            // Atualiza o que sobra para a próxima nota
            $resto %= $valor_cedula; 
        }
    }
    echo "</ul>";
    ?>
</section>
</body>
</html>