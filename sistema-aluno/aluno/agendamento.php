<?php

    require_once('../verifica-autenticacao.php');

    require_once('../../conexao.php');

    $sql = "select * from professor where id = " . $_GET['id'];    
    $resultado = mysqli_query($conexao, $sql);
    $linha = mysqli_fetch_array($resultado);
    
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="shortcut icon" href="../../assets/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../../assets/css/header-footer.css">
    <link rel="stylesheet" href="../../assets/css/agendamento.css">
    <link rel="stylesheet" href="../../assets/css/calendario.css">
    <script src="https://kit.fontawesome.com/9b546460e1.js" crossorigin="anonymous"></script>
    <title>Ravi</title>
</head>
<body>
    <?php require_once("../template-aluno/menu2.php") ?>

    <main>
        <section class="prof-box">
            <div class="perfil">
                <div class="perfil-foto">
                    <img src="../../assets/img/user-image.png">
                    <h2><?= $linha['nome'] ?></h2>
                </div>
                <div class="formacao-box">
                    <div class="formacao-item">
                        <div>
                            <h2>Formação</h2>
                            <p><?= $linha['conteudo'] ?></p>
                        </div>
                        <div>
                            <h2>Valor/Hora</h2>
                            <p>R$<?= $linha['valorHora'] ?></p>
                        </div>
                    </div>
                    <a href="<?= $linha['curriculo'] ?>" download>Ver currículo</a> <!-- dar uma olhada aqui -->
                </div>
            </div>
        </section>

        <section class="calendario">
            <h1>Agendamento das Aulas</h1>
            <span id="msg"></span>
            <div id='calendar'></div>
        </section>

        <!-- Modal Visualizar -->
        <div class="modal fade" id="visualizarModal" tabindex="-1" aria-labelledby="visualizarModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="visualizarModalLabel">Visualizar Evento</h1>
                    <h1 class="modal-title fs-5" id="editarModalLabel" style="display: none;">Editar Evento</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <span id="msgViewEvento"></span>

                    <div id="visualizarEvento">
                        <dl class="row">
                            <dt class="col-sm-3">ID: </dt>
                            <dd class="col-sm-9" id="visualizar-id"></dd>
                            <dt class="col-sm-3">Título: </dt>
                            <dd class="col-sm-9" id="visualizar-title"></dd>
                            <dt class="col-sm-3">Observação: </dt>
                            <dd class="col-sm-9" id="visualizar-obs"></dd>
                            <dt class="col-sm-3">Início: </dt>
                            <dd class="col-sm-9" id="visualizar-start"></dd>
                            <dt class="col-sm-3">Fim: </dt>
                            <dd class="col-sm-9" id="visualizar-end"></dd>
                        </dl>
                        
                        <div class="modal-footer">
                            <button type="button" id="btnViewEditEvento" class="btn btn-warning">Editar</button>
                            <button type="button" id="btnApagarEvento" class="btn btn-danger">Excluir</button>
                        </div>
                    </div>

                    <!-- Tela de Editar -->
                    <div id="editarEvento" style="display: none;">
                        <span id="msgEditEvento"></span>

                        <form method="POST" id="formEditEvento">

                            <input type="hidden" name="edit_id" id="edit_id">

                            <div class="row mb-3">
                                <label for="edit_title" class="col-sm-2 col-form-label">Título</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="edit_title" name="edit_title" placeholder="Título do Evento">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="edit_obs" class="col-sm-2 col-form-label">Obs</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="edit_obs" name="edit_obs" placeholder="Observação do Evento">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="edit_start" class="col-sm-2 col-form-label">Início</label>
                                <div class="col-sm-10">
                                <input type="datetime-local" class="form-control" id="edit_start" name="edit_start">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="edit_end" class="col-sm-2 col-form-label">Fim</label>
                                <div class="col-sm-10">
                                <input type="datetime-local" class="form-control" id="edit_end" name="edit_end">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="edit_color" class="col-sm-2 col-form-label">Cor</label>
                                <div class="col-sm-10">
                                    <select name="edit_color" class="form-control" id="edit_color">
                                        <option value="">Selecione</option>
                                        <option style="color:#40bf00;" value="#40bf00">Verde</option>
                                        <option style="color:#bf0000;" value="#bf0000">Vermelho</option>
                                        <option style="color:#0003bf;" value="#0003bf">Azul</option>
                                        <option style="color:#fad902;" value="#fad902">Amarelo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" name="btnViewEvento" id="btnViewEvento" class="btn btn-secondary">Cancelar</button>
                                <button type="submit" name="btnEditEvento" id="btnEditEvento" class="btn btn-primary">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div>

        <!-- Modal Cadastrar -->
        <div class="modal fade" id="cadastrarModal" tabindex="-1" aria-labelledby="cadastrarModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="cadastrarModalLabel">Cadastrar Evento</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <span id="msgCadEvento"></span>

                    <form method="POST" id="formCadEvento">
                        <div class="row mb-3">
                            <label for="cad_title" class="col-sm-2 col-form-label">Título</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="cad_title" name="cad_title" placeholder="Título do Evento">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="cad_obs" class="col-sm-2 col-form-label">Obs</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="cad_obs" name="cad_obs" placeholder="Observação do Evento">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="cad_start" class="col-sm-2 col-form-label">Início</label>
                            <div class="col-sm-10">
                            <input type="datetime-local" class="form-control" id="cad_start" name="cad_start">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="cad_end" class="col-sm-2 col-form-label">Fim</label>
                            <div class="col-sm-10">
                            <input type="datetime-local" class="form-control" id="cad_end" name="cad_end">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="cad_color" class="col-sm-2 col-form-label">Cor</label>
                            <div class="col-sm-10">
                                <select name="cad_color" class="form-control" id="cad_color">
                                    <option value="">Selecione</option>
                                    <option style="color:#40bf00;" value="#40bf00">Verde</option>
                                    <option style="color:#bf0000;" value="#bf0000">Vermelho</option>
                                    <option style="color:#0003bf;" value="#0003bf">Azul</option>
                                    <option style="color:#fad902;" value="#fad902">Amarelo</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="btnCadEvento" id="btnCadEvento" class="btn btn-success">Cadastrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <?php require_once("../template-aluno/rodape1.php") ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="../../assets/js/index.global.min.js"></script>
    <script src="../../assets/js/core/locales-all.global.min.js"></script>
    <script src="../../assets/js/menu-show.js"></script>
    <script src="../../assets/js/calendario.js"></script>
</body>
</html>