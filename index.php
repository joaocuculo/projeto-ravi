<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/header-footer.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <script src="https://kit.fontawesome.com/9b546460e1.js" crossorigin="anonymous"></script>
    <title>Ravi</title>
</head>
<body>
    <?php require_once("template/menu-index.php") ?>

    <main>
        <div class="banner">
            <figure>
                <img src="assets/img/undraw_mathematics_-4-otb.svg">
            </figure>
            <section>
                <h1>Inicie seus estudos de</h1>
                <h1>um jeito novo!</h1>
                <a href="screens/cadastro.php"><button class="cad-btn">Vem participar</button></a>
            </section>
        </div>
        <div class="estude-casa">
            <section>
                <h1><span>Estude</span> de casa com um professor</h1>
                <h1>de sua <span>preferência</span>!</h1>
            </section>
            <section>
                <p>Escolha o professor que tem a personalidade, experiência profissional e área de foco que você precisa!</p>
                <a href="screens/cadastro.php"><button class="cad-btn2">Comece a aprender</button></a>
            </section>
        </div>
        <div class="cursos">
            <div class="escolha">
                <figure>
                    <img src="assets/img/undraw_teacher_re_sico.svg">
                </figure>
                <div>
                    <h1>Escolha a matéria que deseja <span>aprender</span>!</h1>
                </div>
            </div>
            <section>
                <div class="card-cursos">
                    <article class="card">
                        <a href="#">
                            <img src="assets/img/pi-icon.png">
                            <strong>Matemática</strong>
                            <i class="fa-sharp fa-solid fa-circle-arrow-right" style="color: #000000;"></i>
                        </a>
                    </article>
                    <article class="card">
                        <a href="#" id="port">
                            <img src="assets/img/abc-icon.png">
                            <strong>Português</strong>
                            <i class="fa-sharp fa-solid fa-circle-arrow-right" style="color: #000000;"></i>
                        </a>
                    </article>
                    <article class="card">
                        <a href="#" id="fis">
                            <img src="assets/img/atom-icon.png">
                            <strong>Física</strong>
                            <i class="fa-sharp fa-solid fa-circle-arrow-right" style="color: #000000;"></i>
                        </a>
                    </article>
                    <article class="card">
                        <a href="#" id="hist">
                            <img src="assets/img/ruins-icon.png">
                            <strong>História</strong>
                            <i class="fa-sharp fa-solid fa-circle-arrow-right" style="color: #000000;"></i>
                        </a>
                    </article>
                </div>
            </section>
        </div>
        <div class="vire-prof">
            <figure>
                <img src="assets/img/undraw_professor_re_mj1s.svg">
            </figure>
            <section>
                <div>
                    <h1>Torne-se nosso <span>professor<span></h1>
                </div>
                <div>
                    <p>Entre para o nosso time de professores, nos informe sua formação e ganhe uma renda com o Ravi!</p>
                </div>
                <a href="screens/cadastro-prof.php"><button class="cad-btn2 cad-btn3">Comece agora</button></a>
            </section>
        </div>
    </main>

    <?php require_once("template/rodape-index.php") ?>

    <script src="assets/js/menu-show.js"></script>
    <script src="assets/js/mostrar-senha.js"></script>
</body>
</html>