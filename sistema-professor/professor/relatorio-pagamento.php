<?php

    require_once('../verifica-autenticacao.php');
    
    require_once('../../conexao.php');
    
    $sql = "SELECT events.*, aluno.nome
              FROM events
        INNER JOIN aluno ON events.aluno_id = aluno.id
             WHERE professor_id = {$_SESSION['id']}";
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
    <link rel="stylesheet" href="../../assets/css/principal.css">
    <link rel="stylesheet" href="../../assets/css/relatorios.css">
    <script src="https://kit.fontawesome.com/9b546460e1.js" crossorigin="anonymous"></script>
    <title>Ravi - Relatórios</title>
</head>
<body>
    <?php require_once("../template-prof/menu2.php") ?>

    <main class="container">
        <section class="relatorio-box">
            <h2>Relatório de Pagamentos</h2>

            <div class="table-roll-y table-roll-x">
                <table>
                    <thead>
                        <tr id="cabecalho-relatorio">
                            <th>Nome</th>
                            <th>Título</th>
                            <th>Início</th>
                            <th>Fim</th>
                            <th>Valor Total</th>
                            <th>Forma de Pagamento</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($linha = mysqli_fetch_array($resultado)) { 
                            $inicio = new DateTime($linha['start']);
                            $fim = new DateTime($linha['end']);
                        ?>
                        <tr>
                            <td class="td-espaco"><?= $linha['nome'] ?></td>
                            <td class="td-espaco"><?= $linha['title'] ?></td>
                            <td class="td-espaco"><?= $inicio->format('d/m/Y H:i:s') ?></td>
                            <td class="td-espaco"><?= $fim->format('d/m/Y H:i:s') ?></td>
                            <td class="td-espaco">R$<?= $linha['valorTotal'] ?></td>
                            <td class="td-espaco"><?= $linha['formaPag'] ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </section>        
    </main>

    <?php require_once("../template-prof/rodape1.php") ?>

    <script src="../../assets/js/menu-show.js"></script>
</body>
</html>