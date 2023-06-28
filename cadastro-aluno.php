<?php
    if (isset($_POST['cadastrar'])) {

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $senhaConf = $_POST['senha-conf'];
        $DN = new DateTime($_POST['DN']);
        $tel = $_POST['telefone'];
        $CPF = $_POST['CPF'];
        $RG = $_POST['RG'];
        $CEP = $_POST['CEP'];
        $endereco = $_POST['endereco'];
        $sexo = $_POST['sexo'];

        if ($senhaConf != $senha) {
            $mensagem1 = "As senhas inseridas são diferentes!";
        }

        function calcular_idade($DN){
            $hoje = new DateTime();
            
            // verificando o ano de nascimento
            if ($hoje->format('Y') == $DN->format('Y')) {
                $anos = 1;
            } else {
                $anos = $hoje->format('Y') - $DN->format('Y');
            }
            
            // verificando de forma mais precisa os meses e dias
            if ($hoje->format('m') < $DN->format('m')) {
                $anos--;
            } elseif ($hoje->format('m') == $DN->format('m')) {
                if ($hoje->format('d') < $DN->format('d')) {
                    $anos--;
                }
            }

            if ($anos > 130) {
                $mensagem2 = "Há algo de errado com a sua idade!";
            } elseif ($anos >= 18) {
                $mensagem2 = "";
            } else {
                $mensagem2 = "Você é menor de idade!";
            }

            return $mensagem2;
        }

        echo calcular_idade($DN);
        
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/header-footer.css">
    <link rel="stylesheet" href="assets/css/cadastro-pessoas.css">
    <script src="https://kit.fontawesome.com/9b546460e1.js" crossorigin="anonymous"></script>
    <title>Ravi - Cadastro</title>
</head>
<body>
    <?php require_once("menu1.php") ?>

    <main>
        <div class="container">
            <form method="post">
                <div class="form-title">
                    <h1>Cadastro do Aluno</h1>
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
                        <input type="password" name="senha" id="senha" placeholder="Digite sua senha (mínimo 8 caracteres)" minlength="8" required>
                        <i class="fa-solid fa-eye" id="btn-senha" onclick="mostrarSenha()"></i>
                    </div>
                    <div class="input-box">
                        <label for="senha-conf">Confirme sua senha</label>
                        <input type="password" name="senha-conf" id="senha-conf" placeholder="Confirme sua senha" minlength="8" required>
                        <i class="fa-solid fa-eye" id="btn-senha-conf" onclick="mostrarSenhaConf()"></i>
                    </div>
                    <div class="input-box">
                        <label for="DN">Data de nascimento</label>
                        <input type="date" name="DN" id="DN" required>
                    </div>
                    <div class="input-meio-group">
                        <div class="input-box input-meio">
                            <label for="telefone">Telefone</label>
                            <input type="tel" name="telefone" id="telefone" placeholder="(xx) x xxxx-xxxx" minlength="14" maxlength="15" required>
                        </div>
                        <div class="input-box input-meio">
                            <label for="CPF">CPF</label>
                            <input type="text" name="CPF" id="CPF" placeholder="Digite seu CPF" minlength="14" maxlength="14" required>
                        </div>
                        <div class="input-box input-meio">
                            <label for="RG">RG</label>
                            <input type="text" name="RG" id="RG" placeholder="Digite seu RG" required>
                        </div>
                        <div class="input-box input-meio">
                            <label for="CEP">CEP</label>
                            <input type="text" name="CEP" id="CEP" placeholder="Digite seu CEP" required>
                        </div>
                    </div>
                    <div class="input-box">
                        <label for="endereco">Endereço</label>
                        <input type="text" name="endereco" id="endereco" placeholder="Digite seu endereço" required>
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

                <button type="submit" class="cad-btn" name="cadastrar">Cadastrar</button>

                <?php if (isset($_POST['cadastrar'])) { ?>
                <!-- <?= $DN ?> -->
                <?php } ?>

            </form>
        </div>
    </main>

    <?php require_once("rodape.php") ?>

    <script src="assets/js/menu-show.js"></script>
    <script src="assets/js/mostrar-senha.js"></script>
</body>
</html>