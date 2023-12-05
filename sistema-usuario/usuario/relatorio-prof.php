<?php

    require_once('../verifica-autenticacao.php');
    
    require_once('../../conexao.php');

    //Geração de SQL dinamica para relatorio
    $V_WHERE = "";
    if (isset($_POST['pesquisar'])) {
        $V_WHERE = " AND professor.nome LIKE '%" . $_POST['nome'] . "%'";
    }
    
    $sql = "SELECT professor.*, professor.nome AS nome_professor, area.nome AS nome_area, area.nome
              FROM professor
        INNER JOIN area ON professor.area_id = area.id
             WHERE 1 = 1 " . $V_WHERE;
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

    <main class="container-relatorio">
        <section class="relatorio-box-big">
            <h2>Relatório de Professores</h2>

            <div class="input-group">
                <form method="post"class="input-box-search">
                    <div style="display: flex; justify-content: center; align-items: center; gap: .3rem; width: 50%;">
                        <input type="search" name="nome" placeholder="Pesquise o nome do professor" style="width: 80%;">
                        <button type="submit" name="pesquisar" class="conta-btn" style="border: none; border-radius: 10px; width: 20%;"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </form>
            </div>

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
                            <th>Formação</th>
                            <th>Conteúdo</th>
                            <th>Currículo</th>
                            <th>Matéria</th>
                            <th>Valor/Hora</th>
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
                            <td><?= $linha['id'] ?></td>
                            <td><?= $linha['nome_professor'] ?></td>
                            <td><?= $linha['email'] ?></td>
                            <td><?= $dn->format('d/m/Y') ?></td>
                            <td><?= $linha['cidade'] ?></td>
                            <td><?= $linha['estado'] ?></td>
                            <td><?= $linha['telefone'] ?></td>
                            <td><?= $linha['cpf'] ?></td>
                            <td><?= $linha['areaFormacao'] ?></td>
                            <td><?= $linha['conteudo'] ?></td>
                            <td><a href="<?= $linha['curriculo'] ?>"><?= $linha['curriculo'] ?></a></td>
                            <td><?= $linha['nome_area'] ?></td>
                            <td>R$<?= $linha['valorHora'] ?></td>
                            <td><?= $dataCad->format('d/m/Y H:i:s') ?></td>
                            <td><?= $status ?></td>
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