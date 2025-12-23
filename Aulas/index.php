<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha Primeira Página PHP</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container {
            background-color: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            text-align: center;
            max-width: 400px;
        }
        h1 {
            color: #764ba2;
            margin-bottom: 10px;
        }
        p {
            color: #555;
            line-height: 1.6;
        }
        .php-info {
            background-color: #f0f2f5;
            padding: 10px;
            border-radius: 8px;
            margin-top: 20px;
            font-weight: bold;
            color: #333;
            border: 1px solid #ddd;
        }
        .botao {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #667eea;
            color: white;
            text-decoration: none;
            border-radius: 25px;
            transition: 0.3s;
        }
        .botao:hover {
            background-color: #5a6fd6;
            transform: scale(1.05);
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Sucesso! 🚀</h1>
        <p>Se você está lendo isso, seu ambiente de desenvolvimento no <strong>Zorin OS</strong> está perfeito.</p>

        <div class="php-info">
            <?php
                // Aqui é código PHP rodando no servidor
                date_default_timezone_set('America/Sao_Paulo');
                echo "Hoje é " . date('d/m/Y') . "<br>";
                echo "Hora atual: " . date('H:i');
            ?>
        </div>

        <a href="https://github.com" target="_blank" class="botao">Ir para o GitHub</a>
    </div>

</body>
</html>