<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/header-footer.css">
    <link rel="stylesheet" href="assets/css/cadastro.css">
    <script src="https://kit.fontawesome.com/9b546460e1.js" crossorigin="anonymous"></script>
    <title>Ravi - Cadastro</title>
</head>
<body>
    <?php require_once("template/menu-index.php") ?>

    <main>
        <div class="container">
            <article>
                <div class="cad-image">
                    <img src="assets/img/undraw_education_f8ru.svg">
                </div>
                <div class="comece-estudos">
                    <h1><span>Comece</span> os estudos</h1>
                    <h1>com a <span>gente</span>!</h1>
                </div>
            </article>

            <aside>
                <div class="cad">
                    <div class="cad-title">
                        <h2>Como você quer entrar?</h2>
                    </div>

                    <div class="btns-box">
                            <a href="sistema-aluno" class="cad-btn">
                                <i class="fa-solid fa-user-graduate"></i>
                                Aluno
                            </a>
                            <a href="sistema-professor" class="cad-btn">
                                <i class="fa-solid fa-chalkboard-user"></i>
                                Professor
                            </a>
                    </div>
                </div>
            </aside>
        </div>
    </main>

    <?php require_once("template/rodape-index.php") ?>

    <script src="assets/js/menu-show.js"></script>
</body>
</html>