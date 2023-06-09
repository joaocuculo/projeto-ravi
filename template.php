<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/header-footer.css">
    <script src="https://kit.fontawesome.com/9b546460e1.js" crossorigin="anonymous"></script>
    <title>Ravi</title>
</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <img src="assets/img/logo-ravi-complete.svg" alt="Ravi">
            </div>

            <div class="menu">
                <ul>
                    <li><a href="index.html">Início</a></li>
                    <li><a href="#">Sobre</a></li>
                    <li><a href="#">Matérias</a></li>
                    <li class="entrar-btn"><a href="login.html">Entrar</a></li>
                    <li class="conta-btn"><a href="cadastro.html">Crie sua conta</a></li>
                </ul>
            </div>

            <div class="menu-responsivo-icon">
                <button onclick="menuShow()"><img class="icon" src="assets/img/menu_white_36dp.svg"></button>
            </div>
        </nav>

        <div class="menu-responsivo">
            <ul>
                <li><a href="#">Início</a></li>
                <li><a href="#">Sobre</a></li>
                <li><a href="#">Matérias</a></li>
                <li class="entrar-btn"><a href="#">Entrar</a></li>
                <li class="conta-btn"><a href="#">Crie sua conta</a></li>
            </ul>
        </div>
    </header>

    <footer>
        <div class="footer-conteudo">
            <div class="footer-logo">
                <img src="assets/img/logo-ravi-complete.svg" alt="Ravi">
            </div>

            <ul class="footer-list">
                <li><a href="#">Início</a></li>
                <li><a href="#">Sobre</a></li>
                <li><a href="#">Matérias</a></li>
                <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
            </ul>
        </div>

            <div class="developers">
                Desenvolvido por Eric Oyama e João Cuculo
            </div>
    </footer>

    <script src="assets/js/template.js"></script>
</body>
</html>