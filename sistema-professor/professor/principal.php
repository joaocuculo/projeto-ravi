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
    <?php require_once("../template-prof/menu2.php") ?>

    <main class="container">
        <div class="bem-vindo">
            <h2>Seja bem vindo, <?= $_SESSION['nome']; ?>. Confira as matérias</h2>
        </div>

        <section class="cursos">
            <div class="card-cursos">
                <article class="card">
                    <a href="">
                        <img src="../../assets/img/pi-icon.png">
                        <strong>Matemática</strong>
                        <i class="fa-sharp fa-solid fa-circle-arrow-right" style="color: #000000;"></i>
                    </a>
                </article>
                <article class="card">
                    <a href="" id="port">
                        <img src="../../assets/img/abc-icon.png">
                        <strong>Português</strong>
                        <i class="fa-sharp fa-solid fa-circle-arrow-right" style="color: #000000;"></i>
                    </a>
                </article>
                <article class="card">
                    <a href="" id="fis">
                        <img src="../../assets/img/atom-icon.png">
                        <strong>Física</strong>
                        <i class="fa-sharp fa-solid fa-circle-arrow-right" style="color: #000000;"></i>
                    </a>
                </article>
                <article class="card">
                    <a href="" id="hist">
                        <img src="../../assets/img/ruins-icon.png">
                        <strong>História</strong>
                        <i class="fa-sharp fa-solid fa-circle-arrow-right" style="color: #000000;"></i>
                    </a>    
                </article>
            </div>
        </section>

        <section style="margin-top: -6rem;">
            <div class="bem-vindo">
                <h2>Aulas Agendadas</h2>
            </div>

            <div class="card-agend">
                <?php while ($linha = mysqli_fetch_array($resultado)) { ?>
                    <?php
                        $inicio = new DateTime($linha['start']);
                        $fim = new DateTime($linha['end']);
                    ?>
                    <article style="background-image: linear-gradient(to left, #D9D7CA 0, #D9D7CA 95%, <?= $linha['color'] ?> 5%);">
                        <h3><?= $linha['title'] ?></h3>
                        <h5>Aluno(a) <?= $linha['nome'] ?></h5>
                        <h5>Início: <?= $inicio->format('d/m/Y H:i:s') ?></h5>
                        <h5>Fim: <?= $fim->format('d/m/Y H:i:s') ?></h5>
                    </article>
                <?php } ?>    
            </div>
        </section>
    </main>

    <?php require_once("../template-prof/rodape1.php") ?>

    <script src="../../assets/js/menu-show.js"></script>
</body>
</html>