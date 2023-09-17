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
    </main>

    <?php require_once("../../template/rodape1.php") ?>

    <script src="../../assets/js/menu-show.js"></script>
</body>
</html>