<?php
    require_once('../verifica-autenticacao.php');

    require_once('../../conexao.php');

    $sql = "select * from professor
               where       1 = 1
                 and area_id = 2";

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
    <link rel="stylesheet" href="../../assets/css/materias.css">
    <link rel="stylesheet" href="../../assets/css/principal.css">
    <script src="https://kit.fontawesome.com/9b546460e1.js" crossorigin="anonymous"></script>
    <title>Ravi - Português</title>
</head>
<body>
    <?php require_once("../../template/menu-port.php") ?>

    <main>
        <section class="materia" id="portugues">
            <div>
                <img src="../../assets/img/abc-icon-big.png">
            </div>
            <div>
                <h1>Português</h1>
            </div>
            <div class="invisible"><img src="../../assets/img/abc-icon-big.png"></div>
        </section>        
        <section class="prof">
            <div class="conheca">
                <h1>Conheça nossos <span>professores</span></h1>
            </div>
            <div class="card-group">
                <?php while ($linha = mysqli_fetch_array($resultado)) { ?>
                <div class="cards">
                    <h2><?= $linha['nome'] ?></h2>
                    <img src="../../assets/img/user-image.png">
                    <a href="#">Agendar aula</a>
                </div>
                <?php } ?>
            </div>
        </section>

        <section>
            <div class="vire-prof">
                <figure>
                    <img src="../../assets/img/undraw_professor_re_mj1s.svg">
                </figure>
                <section>
                    <div>
                        <h1>Torne-se nosso <span>professor<span></h1>
                    </div>
                    <div>
                        <p>Entre para o nosso time de professores, nos informe sua formação e ganhe uma renda com o Ravi!</p>
                    </div>
                    <a href="../../sistema-professor/professor/cadastro.php"><button class="cad-btn2 cad-btn3">Comece agora</button></a>
                </section>
            </div>
                </main>
        </section>

    <?php require_once("../../template/rodape3.php") ?>

    <script src="../../assets/js/menu-show.js"></script>
</body>
</html>