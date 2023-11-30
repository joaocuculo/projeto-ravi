<?php

    require_once('../verifica-autenticacao.php');
    
    require_once('../../conexao.php');
    
    $sql = "SELECT events.*, aluno.nome
              FROM events
        INNER JOIN aluno ON events.aluno_id = aluno.id
             WHERE professor_id = " . $_SESSION['id'];
    $resultado = mysqli_query($conexao, $sql);

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
    <link rel="stylesheet" href="../../assets/css/relatorios.css">
    <script src="https://kit.fontawesome.com/9b546460e1.js" crossorigin="anonymous"></script>
    <title>Ravi - Relatórios</title>
</head>
<body>
    <?php require_once("../template-usuario/menu2.php") ?>

    <main class="container">
        <section class="relatorio-box">
            <input type="text">
        </section>        
    </main>

    <?php require_once("../template-usuario/rodape1.php") ?>

    <script src="../../assets/js/menu-show.js"></script>
</body>
</html>