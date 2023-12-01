<?php

    require_once('../verifica-autenticacao.php');

    require_once('../../conexao.php');

    $sql_prof = "SELECT * FROM professor WHERE id = " . $_SESSION['id'];    
    $resultado_prof = mysqli_query($conexao, $sql_prof);
    $linha_prof = mysqli_fetch_array($resultado_prof);
    
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <title>Ravi</title>
</head>
<body>
    <?php require_once("../template-prof/menu2.php") ?>

    <main>
        <section class="prof-box">
            <div class="perfil">
                <div class="perfil-foto">
                    <img src="../../assets/img/user-image.png">
                    <h2><?= $linha_prof['nome'] ?></h2>
                </div>
                <div class="formacao-box">
                    <div class="formacao-item">
                        <div>
                            <h2>Formação</h2>
                            <p><?= $linha_prof['conteudo'] ?></p>
                            <h5>Conteúdo</h5>
                            <p><?= $linha_prof['conteudo'] ?></p>
                        </div>
                        <div>
                            <h2>Valor/Hora</h2>
                            <p>R$<?= $linha_prof['valorHora'] ?></p>
                        </div>
                    </div>
                    <a href="<?= $linha_prof['curriculo'] ?>" target="_blank">Ver currículo</a>
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
                    <h1 class="modal-title fs-5" id="visualizarModalLabel">Visualizar Aula</h1>
                    <h1 class="modal-title fs-5" id="editarModalLabel" style="display: none;">Editar Aula</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <span id="msgViewEvento"></span>

                    <div id="visualizarEvento">
                        <dl class="row">
                            <input type="hidden" id="visualizar-id">
                            <dt class="col-sm-3">Aluno: </dt>
                            <dd class="col-sm-9" id="visualizar-aluno"></dd>
                            <dt class="col-sm-3">Título: </dt>
                            <dd class="col-sm-9" id="visualizar-title"></dd>
                            <dt class="col-sm-3">Conteúdo: </dt>
                            <dd class="col-sm-9" id="visualizar-conteudo"></dd>
                            <dt class="col-sm-3">Início: </dt>
                            <dd class="col-sm-9" id="visualizar-start"></dd>
                            <dt class="col-sm-3">Fim: </dt>
                            <dd class="col-sm-9" id="visualizar-end"></dd>
                            <dt class="col-sm-3">Total (R$): </dt>
                            <dd class="col-sm-9" id="visualizar-valorTotal"></dd>
                            <dt class="col-sm-3">Pagamento: </dt>
                            <dd class="col-sm-9" id="visualizar-formaPag"></dd>
                        </dl>
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
                    <h1 class="modal-title fs-5" id="cadastrarModalLabel">Cadastrar Aula</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <span id="msgCadEvento"></span>

                    <form method="POST" id="formCadEvento">

                        <input type="hidden" name="cad_aluno_id" id="cad_aluno_id" value="<?= $linha_aluno['id'] ?>">
                        <input type="hidden" name="cad_professor_id" id="cad_professor_id" value="<?= $linha_prof['id'] ?>">

                        <div class="row mb-3">
                            <label for="cad_aluno_nome" class="col-sm-2 col-form-label">Aluno</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="cad_aluno_nome" name="cad_aluno_nome" value="<?= $linha_aluno['nome'] ?>" disabled>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="cad_professor_nome" class="col-sm-2 col-form-label">Professor</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="cad_professor_nome" name="cad_professor_nome" value="<?= $linha_prof['nome'] ?>" disabled>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="cad_title" class="col-sm-2 col-form-label">Título</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="cad_title" name="cad_title" placeholder="Título da Aula">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="cad_conteudo" class="col-sm-2 col-form-label">Conteúdo</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="cad_conteudo" name="cad_conteudo" placeholder="Conteúdo da Aula">
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
                            <input type="datetime-local" class="form-control" id="cad_end" name="cad_end" oninput="calcularValorTotal()">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="cad_color" class="col-sm-2 col-form-label">Cor</label>
                            <div class="col-sm-10">
                                <select name="cad_color" class="form-control" id="cad_color">
                                    <option value="">Selecione</option>
                                    <option style="color:#0d6935;" value="#0d6935">Verde</option>
                                    <option style="color:#961414;" value="#961414">Vermelho</option>
                                    <option style="color:#143896;" value="#143896">Azul</option>
                                    <option style="color:#D18D08;" value="#D18D08">Amarelo</option>
                                    <option style="color:#400d69;" value="#400d69">Roxo</option>
                                    <option style="color:#96144f;" value="#96144f">Rosa</option>
                                    <option style="color:#c75716;" value="#c75716">Laranja</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="cad_valorHora" class="col-sm-2 col-form-label">Valor/Hora</label>
                            <div class="col-sm-4">
                                <input type="number" name="cad_valorHora" class="form-control" id="cad_valorHora" value="<?= $linha_prof['valorHora'] ?>" disabled>
                            </div>

                            <label for="cad_valorTotal" class="col-sm-2 col-form-label">Valor/Total</label>
                            <div class="col-sm-4">
                                <input type="number" name="cad_valorTotal" class="form-control" id="cad_valorTotal" value="" disabled>
                                <input type="hidden" name="cad_valorTotalHidden" id="cad_valorTotalHidden" value="">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="cad_formaPag" class="col-sm-2 col-form-label">Pagamento</label>
                            <div class="col-sm-10">
                                <select name="cad_formaPag" class="form-control" id="cad_formaPag" required>
                                    <option value="">Selecione</option>
                                    <option value="Cartao">Cartão</option>
                                    <option value="Pix">Pix</option>
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

    <?php require_once("../template-prof/rodape1.php") ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="../../assets/js/index.global.min.js"></script>
    <script src="../../assets/js/core/locales-all.global.min.js"></script>
    <script src="../../assets/js/menu-show.js"></script>
    <script src="../../assets/js/calendario_prof.js"></script>
</body>
</html>