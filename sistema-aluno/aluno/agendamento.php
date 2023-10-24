<?php

    require_once('../verifica-autenticacao.php');

    require_once('../../conexao.php');

    $sql = "select * from professor where id = " . $_GET['id'];    
    $resultado = mysqli_query($conexao, $sql);
    $linha = mysqli_fetch_array($resultado);
    
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../assets/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../../assets/css/header-footer.css">
    <link rel="stylesheet" href="../../assets/css/agendamento.css">
    <script src="https://kit.fontawesome.com/9b546460e1.js" crossorigin="anonymous"></script>
    <title>Ravi</title>
</head>
<body>
    <?php require_once("../template-aluno/menu2.php") ?>

    <main>
        <section class="prof-box">
            <div class="perfil">
                <div class="perfil-foto">
                    <img src="../../assets/img/user-image.png">
                    <h2><?= $linha['nome'] ?></h2>
                </div>
                <div class="formacao-box">
                    <div class="formacao-item">
                        <div>
                            <h2>Formação</h2>
                            <p><?= $linha['conteudo'] ?></p>
                        </div>
                        <div>
                            <h2>Valor/Hora</h2>
                            <p>R$<?= $linha['valorHora'] ?></p>
                        </div>
                    </div>
                    <a href="<?= $linha['curriculo'] ?>" download>Ver currículo</a> <!-- dar uma olhada aqui -->
                </div>
            </div>
        </section>
        <section>
            <!-- plugin do calendario -->
        </section>
    </main>

    <?php require_once("../template-aluno/rodape1.php") ?>

    <script src="../../assets/js/menu-show.js"></script>
</body>
</html>