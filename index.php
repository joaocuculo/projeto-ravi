<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/header-footer.css">
    <script src="https://kit.fontawesome.com/9b546460e1.js" crossorigin="anonymous"></script>
    <title>Ravi - Cadastro</title>
</head>
<body>
    <?php require_once("menu1.php") ?>

    <main>
        <div class="banner">
            <figure>
                <img src="assets/img/undraw_mathematics_-4-otb.svg">
            </figure>
            <section>
                <h1>Inicie seus estudos de um jeito novo!</h1>
                <a href="cadastro.php"><button>Vem participar</button></a>
            </section>
        </div>
        <div class="estude-casa">
            <section>
                <h1><span>Estude</span> de casa com um professor de sua <span>preferência</span>!</h1>
            </section>
            <section>
                <p>Escolha o professor que tem a personalidade, experiência profissional e área de foco que você precisa!</p>
                <a href="cadastro.php"><button>Comece a aprender <i class="fa-solid fa-arrow-right"></i></button></a>
            </section>
        </div>
        <div class="cursos">
            <div>
                <figure>
                    <img src="assets/img/undraw_teacher_re_sico.svg">
                </figure>
                <div>
                    <h1>Escolha a matéria que deseja <span>aprender</span>!</h1>
                </div>
            </div>
            <section>
                <div>
                    <article class="card">
                        <img src="assets/img/pi-icon.png">
                        <strong>Matemática</strong>
                        <a href="#">
                            <i class="fa-sharp fa-solid fa-circle-arrow-right" style="color: #000000;"></i>
                        </a>
                    </article>
                    <article class="card">
                        <img src="assets/img/abc-icon.png">
                        <strong>Português</strong>
                        <a href="#">
                            <i class="fa-sharp fa-solid fa-circle-arrow-right" style="color: #000000;"></i>
                        </a>
                    </article>
                    <article class="card">
                        <img src="assets/img/atom-icon.png">
                        <strong>Física</strong>
                        <a href="#">
                            <i class="fa-sharp fa-solid fa-circle-arrow-right" style="color: #000000;"></i>
                        </a>
                    </article>
                    <article class="card">
                        <img src="assets/img/ruins-icon.png">
                        <strong>História</strong>
                        <a href="#">
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
                    <h1>Torne-se nosso professor</h1>
                </div>
                <div>
                    <p>Entre para o nosso time de professores, nos informe sua formação e ganhe uma renda com o Ravi!</p>
                </div>
                <a href="cadastro-professor.php"><button>Comece agora</button></a>
            </section>
        </div>
    </main>

    <?php require_once("rodape.php") ?>

    <script src="assets/js/menu-show.js"></script>
    <script src="assets/js/mostrar-senha.js"></script>
    <script src="assets/js/mascaras.js"></script>
</body>
</html>