<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/header-footer.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <script src="https://kit.fontawesome.com/9b546460e1.js" crossorigin="anonymous"></script>
    <title>Ravi - Login</title>
</head>
<body>
    <?php require_once("menu2.php"); ?>

    <main>
        <div class="container">
            <article>
                <div class="form-image">
                    <img src="assets/img/undraw_online_learning_re_qw08.svg">
                </div>
                <div class="estude-facil">
                    <h1><span>Estude</span> de um</h1>
                    <h1>jeito mais <span>fácil</span>!</h1>
                </div>
            </article>

            <aside>
                <form action="#" method="post">
                    <div class="form-title">
                        <h2>Login</h2>
                    </div>

                    <div class="input-group">
                        <div class="input-box">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" id="email" placeholder="Digite seu email" required>
                        </div>
                        <div class="input-box">
                            <label for="senha">Senha</label>
                            <input type="password" name="senha" id="senha" placeholder="Digite sua senha" required>
                            <i class="fa-solid fa-eye" id="btn-senha" onclick="mostrarSenha()"></i>
                        </div>

                        <div class="nao-possui-conta">
                            <a href="cadastro.html">Não possui uma conta?</a>
                        </div>
                    </div>

                    <div class="entrar-form-btn">
                        <button type="submit">Entrar</button>
                    </div>
                </form>
            </aside>
        </div>
    </main>

    <?php require_once("rodape.php"); ?>

    <script src="assets/js/menu-show.js"></script>
    <script src="assets/js/mostrar-senha.js"></script>
</body>
</html>