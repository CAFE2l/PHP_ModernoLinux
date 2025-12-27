<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <pre>
            <?php 
                setcookie("dia-da-seman", "SEGUNDA", time()  + 3600);

                echo "<h1>Superglobal GET</h1>";
                var_dump($_GET);

                echo "<h1>Superglobal POST</h1>";
                var_dump($_POST);

                echo "<h1>Supergglboal REQUEST</h1>";
                var_dump($_REQUEST);

                echo "<h1>Superglboal ENV</h1>";
                var_dump($_ENV);

                echo "<h1>SuperGlobal SERVER</h1>";
                var_dump($_SERVER);


                echo "<h1>SuperGlobal  GLOBLAS</h1>";
                var_dump($GLOBALS);
            ?>
        </pre>
    </main>
</body>
</html>