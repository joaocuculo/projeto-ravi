<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/header-footer.css">
    <link rel="stylesheet" href="assets/css/cadastro-aluno.css">
    <script src="https://kit.fontawesome.com/9b546460e1.js" crossorigin="anonymous"></script>
    <title>Ravi - Cadastro</title>
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
                <li><a href="index.html">Início</a></li>
                <li><a href="#">Sobre</a></li>
                <li><a href="#">Matérias</a></li>
                <li class="entrar-btn"><a href="login.html">Entrar</a></li>
                <li class="conta-btn"><a href="cadastro.html">Crie sua conta</a></li>
            </ul>
        </div>
    </header>

    <main>
        <div class="container">
            <form action="#" method="post">
                <div class="form-title">
                    <h1>Cadastro do Professor</h1>
                </div>

                <div class="input-group">
                    <div class="input-box">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" id="nome" placeholder="Digite seu nome completo" required>
                    </div>
                    <div class="input-box">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="email" placeholder="Digite seu email" required>
                    </div>
                    <div class="input-box">
                        <label for="senha">Senha</label>
                        <input type="password" name="senha" id="senha" placeholder="Digite sua senha" required>
                        <i class="fa-solid fa-eye" id="btn-senha" onclick="mostrarSenha()"></i>
                    </div>
                    <div class="input-box">
                        <label for="senha-conf">Confirme sua senha</label>
                        <input type="password" name="senha-conf" id="senha-conf" placeholder="Confirme sua senha" required>
                        <i class="fa-solid fa-eye" id="btn-senha-conf" onclick="mostrarSenhaConf()"></i>
                    </div>
                    <div class="input-box">
                        <label for="DN">Data de nascimento</label>
                        <input type="date" name="DN" id="DN" required>
                    </div>
                    <div class="input-box">
                        <label for="telefone">Telefone</label>
                        <input type="tel" name="telefone" id="telefone" placeholder="(xx) x xxxx-xxxx" required>
                    </div>
                    <div class="input-box">
                        <label for="CPF">CPF</label>
                        <input type="text" name="CPF" id="CPF" placeholder="Digite seu CPF" required>
                    </div>
                    <div class="input-box">
                        <label for="RG">RG</label>
                        <input type="text" name="RG" id="RG" placeholder="Digite seu RG" required>
                    </div>
                    <div class="input-box">
                        <label for="endereco">Endereço</label>
                        <input type="text" name="endereco" id="endereco" placeholder="Digite seu endereço" required>
                    </div>
                    <div class="input-box">
                        <label for="CEP">CEP</label>
                        <input type="text" name="CEP" id="CEP" placeholder="Digite seu CEP" required>
                    </div>

                    <div class="inputs-sexo">
                        <div class="title-sexo">
                            <label>Sexo</label>
                        </div>

                        <div class="sexo-group">
                            <div class="sexo-input">
                                <input type="radio" name="sexo" id="masc">
                                <label for="masc">Masculino</label>
                            </div>
                            <div class="sexo-input">
                                <input type="radio" name="sexo" id="fem">
                                <label for="fem">Feminino</label>
                            </div>
                            <div class="sexo-input">
                                <input type="radio" name="sexo" id="outro">
                                <label for="outro">Outro</label>
                            </div>
                            <div class="sexo-input">
                                <input type="radio" name="sexo" id="none">
                                <label for="none">Prefiro não dizer</label>
                            </div>
                        </div>
                    </div>
                </div>

                <button class="cad-btn">
                    <a href="#">Cadastrar</a>
                </button>
            </form>
        </div>
    </main>

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
    <script src="assets/js/mostrar-senha.js"></script>
</body>
</html>