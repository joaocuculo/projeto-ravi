<?php

    require_once('../verifica-autenticacao.php');
    
    require_once('../../conexao.php');
    
    $sql = "SELECT * FROM aluno";
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
    <?php require_once("../template-usuario/menu2.php") ?>

    <main class="container">
        <section class="relatorio-box">
            <h2>Relatório de Alunos</h2>

            <div class="table-roll-y table-roll-x">
                <table>
                    <thead>
                        <tr id="cabecalho-relatorio">
                            <th>ID</th>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Data de Nascimento</th>
                            <th>Cidade</th>
                            <th>Estado</th>
                            <th>Telefone</th>
                            <th>CPF</th>
                            <th>Data Cadastro</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($linha = mysqli_fetch_array($resultado)) { 
                            $dn = new DateTime($linha['dn']);
                            $dataCad = new DateTime($linha['dataCad']);
                            if ($linha['status'] == 1) {
                                $status = "Ativo";
                            } else {
                                $status = "Inativo";
                            }
                            ?>
                        <tr>
                            <td class="td-espaco"><?= $linha['id'] ?></td>
                            <td class="td-espaco"><?= $linha['nome'] ?></td>
                            <td class="td-espaco"><?= $linha['email'] ?></td>
                            <td class="td-espaco"><?= $dn->format('d/m/Y') ?></td>
                            <td class="td-espaco"><?= $linha['cidade'] ?></td>
                            <td class="td-espaco"><?= $linha['estado'] ?></td>
                            <td class="td-espaco"><?= $linha['telefone'] ?></td>
                            <td class="td-espaco"><?= $linha['cpf'] ?></td>
                            <td class="td-espaco"><?= $dataCad->format('d/m/Y H:i:s') ?></td>
                            <td class="td-espaco"><?= $status ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </section>        
    </main>
    
    <?php require_once("../template-usuario/rodape1.php") ?>
    
    <script src="../../assets/js/menu-show.js"></script>
</body>
</html>