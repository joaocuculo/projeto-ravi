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
    <script src="https://kit.fontawesome.com/9b546460e1.js" crossorigin="anonymous"></script>
    <title>Ravi</title>
</head>
<body>
    <?php require_once("../template-usuario/menu2.php") ?>

    <main class="container">
        <div class="bem-vindo">
            <h2>Seja bem-vindo, Administrador(a) <?= $_SESSION['nome']; ?>. Confira os cadastros</h2>
        </div>

        <section class="adm-agend">
            <div>
                <img src="../../assets/img/undraw_two_factor_authentication_namy.svg">        
            </div>
            <div class="confira-agend">
                <p>Faça o cadastro de administrador</p>
                <a href="cadastro.php" class="agend-btn"><i class="fa-sharp fa-solid fa-circle-arrow-right"></i></a>
            </div>
            <div>
                <img src="../../assets/img/undraw_sign_up_n6im.svg">        
            </div>
            <div class="confira-agend">
                <p>Faça o cadastro de matérias</p>
                <a href="../area/cadastro.php" class="agend-btn"><i class="fa-sharp fa-solid fa-circle-arrow-right"></i></a>
            </div>
        </section>

        <section>
            <div class="bem-vindo">
                <h2>Relatórios</h2>
            </div>
        </section>
    </main>

    <?php require_once("../template-usuario/rodape1.php") ?>

    <script src="../../assets/js/menu-show.js"></script>
</body>
</html>