<?php

require_once('../../conexao.php');

    if (isset($_POST['cadastrar'])) {

        $nome = $_POST['nome']; 

        $sql = "insert into area (nome) value ('$nome')";

        mysqli_query($conexao, $sql);

        $mensagem = "Cadastrado com sucesso";

    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../assets/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../../assets/css/header-footer.css">
    <link rel="stylesheet" href="../../assets/css/cadastro-pessoas.css">
    <script src="https://kit.fontawesome.com/9b546460e1.js" crossorigin="anonymous"></script>
    <title>Ravi - Cadastro</title>
</head>
<body>
    <?php require_once("../../template/menu1.php") ?>

    <main>
        <div class="container">
            <form method="post">
                <div class="form-title">
                    <h1>Cadastro de Área</h1>
                </div>

                <?php if (isset($mensagem)) { ?>
                    <div class="mensagem">
                        <?= $mensagem ?>
                    </div>
                <?php } ?>

                <div class="input-group">
                    <div class="input-box">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" id="nome" placeholder="Digite o nome da área de conhecimento a ser adicionada" required>
                    </div>
                </div>

                <button type="submit" class="cad-btn" name="cadastrar">Cadastrar</button>

            </form>
        </div>
    </main>

    <?php require_once("../../template/rodape.php") ?>

    <script src="../../assets/js/menu-show.js"></script>
    <script src="../../assets/js/mostrar-senha.js"></script>
    <script src="../../assets/js/mascaras.js"></script>
</body>
</html>