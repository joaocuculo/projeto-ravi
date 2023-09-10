<?php

    require_once('../verifica-autenticacao.php');
    
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../assets/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../../assets/css/header-footer.css">
    <link rel="stylesheet" href="../../assets/css/principal.css">
    <script src="https://kit.fontawesome.com/9b546460e1.js" crossorigin="anonymous"></script>
    <title>Ravi</title>
</head>
<body>
    <?php require_once("../../template/menu2.php") ?>

    <main>
        <a href="../materias/matematica.php">matematica</a>
        <a href="../materias/portugues.php">portugues</a>
        <a href="../materias/fisica.php">fisica</a>
        <a href="../materias/historia.php">historia</a>
    </main>

    <?php require_once("../../template/rodape1.php") ?>

    <script src="../../assets/js/menu-show.js"></script>
</body>
</html>