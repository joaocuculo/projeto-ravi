<?php

    require_once('../verifica-autenticacao.php');
    
    require_once('../../conexao.php');

    $sql = "SELECT events.*, professor.nome
              FROM events
        INNER JOIN professor ON events.professor_id = professor.id
             WHERE aluno_id = " . $_SESSION['id'];
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
    <?php require_once("../template-aluno/menu2.php") ?>

    <main class="container">
        <div class="bem-vindo">
            <h2>Seja bem vindo, <?= $_SESSION['nome']; ?></h2>
        </div>

        <section class="cursos">
            <div class="card-cursos">
                <article class="card">
                    <a href="../materias/matematica.php">
                        <img src="../../assets/img/pi-icon.png">
                        <strong>Matemática</strong>
                        <i class="fa-sharp fa-solid fa-circle-arrow-right" style="color: #000000;"></i>
                    </a>
                </article>
                <article class="card">
                    <a href="../materias/portugues.php" id="port">
                        <img src="../../assets/img/abc-icon.png">
                        <strong>Português</strong>
                        <i class="fa-sharp fa-solid fa-circle-arrow-right" style="color: #000000;"></i>
                    </a>
                </article>
                <article class="card">
                    <a href="../materias/fisica.php" id="fis">
                        <img src="../../assets/img/atom-icon.png">
                        <strong>Física</strong>
                        <i class="fa-sharp fa-solid fa-circle-arrow-right" style="color: #000000;"></i>
                    </a>
                </article>
                <article class="card">
                    <a href="../materias/historia.php" id="hist">
                        <img src="../../assets/img/ruins-icon.png">
                        <strong>História</strong>
                        <i class="fa-sharp fa-solid fa-circle-arrow-right" style="color: #000000;"></i>
                    </a>    
                </article>
            </div>
        </section>

        <section>
            <div>
                <h2>Aulas Agendadas</h2>
            </div>

            <div>
                <?php while ($linha = mysqli_fetch_array($resultado)) { ?>
                    <article>
                        <h3><?= $linha['title'] ?></h3>
                        <h4>Professor(a) <?= $linha['nome'] ?></h4>
                        <h4><?= $linha['start'] ?> - <?= $linha['end'] ?></h4>
                    </article>
                <?php } ?>    
            </div>
        </section>
    </main>

    <?php require_once("../template-aluno/rodape1.php") ?>

    <script src="../../assets/js/menu-show.js"></script>
</body>
</html>