<?php

    require_once('../../conexao.php');

    if (isset($_POST['cadastrar'])) {

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $senhaConf = $_POST['senha-conf'];
        $DN = $_POST['DN'];
        $tel = $_POST['telefone'];
        $CPF = $_POST['CPF'];
        $RG = $_POST['RG'];
        $CEP = $_POST['CEP'];
        $estado = $_POST['estado'];
        $cidade = $_POST['cidade'];
        $endereco = $_POST['endereco'];
        $areaForma = $_POST['area-forma'];
        $diretorio = "uploads/";
        $curriculoDestino = $diretorio . $_FILES['curriculo']['name'];
        $sexo = $_POST['sexo'];
        $conteudo = $_POST['conteudo'];
        $valorHora = $_POST['valor-hora'];
        $area_id = $_POST['area_id'];
        $status = 1;

        // VERIFICANDO SENHA
        if ($senhaConf == $senha) {
            
            // VERIFICANDO SEXO
            switch ($sexo) {
                case 1:
                    $sexo = "masculino";
                    break;
                case 2:    
                    $sexo = "feminino";
                    break;
                case 3:
                    $sexo = "outro";
                    break;
                case 4:
                    $sexo = "none";        
                    break;
            }

            // VERIFICANDO IDADE
            function calcularIdade($data){
    
                $idade = 0;
                
                $data_nascimento = date('Y-m-d', strtotime($data));
                $data = explode("-",$data_nascimento);
                $anoNasc = $data[0];
                $mesNasc = $data[1];
                $diaNasc = $data[2];
    
                $anoAtual = date("Y");
                $mesAtual = date("m");
                $diaAtual = date("d");
    
                $idade = $anoAtual - $anoNasc;
                if ($mesAtual < $mesNasc){
                    $idade -= 1;
                } elseif ( ($mesAtual == $mesNasc) && ($diaAtual <= $diaNasc) ){
                    $idade -= 1;
                }
    
                return $idade;
            }

            $nomeCurriculo = "";
            if (move_uploaded_file($_FILES['curriculo']['tmp_name'], $curriculoDestino)) {
                $nomeCurriculo = $_FILES['curriculo']['name'];
            }
    
            if (calcularIdade($_POST['DN']) > 130) {
                $mensagem = "Há algo de errado com sua idade.";
            } elseif (calcularIdade($_POST['DN']) >= 18) {
                $sql = "insert into professor (nome, email, senha, dn, endereco, cep, estado, cidade, telefone, cpf, rg, sexo, areaFormacao, curriculo, conteudo, valorHora, area_id, status) values ('$nome', '$email', '$senha', '$DN', '$endereco', '$CEP', '$estado', '$cidade', '$tel', '$CPF', '$RG', '$sexo', '$areaForma', '$nomeCurriculo', '$conteudo', '$valorHora', '$area_id', '$status')";

                mysqli_query($conexao, $sql);

                $mensagem = "Cadastrado com sucesso!";
            } else {
                $mensagem = "É necessário ser maior de idade para se tornar nosso professor.";
            }
        } else {
            $mensagem = "As senhas inseridas são diferentes.";
        }  
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
    <?php require_once("../template-prof/menu1.php") ?>

    <main>
        <div class="container">
            <form method="post" name="form" enctype="multipart/form-data">
                <div class="form-title">
                    <h1>Cadastro do Professor</h1>
                </div>

                <?php if (isset($mensagem)) { ?>
                    <div class="mensagem">
                        <?= $mensagem ?>
                    </div>
                <?php } ?>

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
                            <input type="tel" name="telefone" id="telefone" placeholder="(xx) x xxxx-xxxx" minlength="15" maxlength="16" required>
                        </div>
                        <div class="input-box input-meio">
                            <label for="CPF">CPF</label>
                            <input type="text" name="CPF" id="CPF" placeholder="Digite seu CPF" autocomplete="off" minlength="14" maxlength="14" required>
                        </div>
                        <div class="input-box input-meio">
                            <label for="RG">RG</label>
                            <input type="text" name="RG" id="RG" placeholder="Digite seu RG" maxlength="14" required>
                        </div>
                        <div class="input-box input-meio">
                            <label for="CEP">CEP</label>
                            <input type="text" name="CEP" id="CEP" placeholder="Digite seu CEP" minlength="9" maxlength="9" required>
                        </div>
                        <div class="input-box input-meio">
                            <label for="estado">Estado</label>
                            <select name="estado" id="estado" required onchange="buscaCidades(this.value)">
                                <option value="">Selecione o Estado</option>
                                <option value="AC">Acre</option>
                                <option value="AL">Alagoas</option>
                                <option value="AP">Amapá</option>
                                <option value="AM">Amazonas</option>
                                <option value="BA">Bahia</option>
                                <option value="CE">Ceará</option>
                                <option value="DF">Distrito Federal</option>
                                <option value="ES">Espírito Santo</option>
                                <option value="GO">Goiás</option>
                                <option value="MA">Maranhão</option>
                                <option value="MT">Mato Grosso</option>
                                <option value="MS">Mato Grosso do Sul</option>
                                <option value="MG">Minas Gerais</option>
                                <option value="PA">Pará</option>
                                <option value="PB">Paraíba</option>
                                <option value="PR">Paraná</option>
                                <option value="PE">Pernambuco</option>
                                <option value="PI">Piauí</option>
                                <option value="RJ">Rio de Janeiro</option>
                                <option value="RN">Rio Grande do Norte</option>
                                <option value="RS">Rio Grande do Sul</option>
                                <option value="RO">Rondônia</option>
                                <option value="RR">Roraima</option>
                                <option value="SC">Santa Catarina</option>
                                <option value="SP">São Paulo</option>
                                <option value="SE">Sergipe</option>
                                <option value="TO">Tocantins</option>
                            </select>
                        </div>
                        <div class="input-box input-meio">
                            <label for="cidade">Cidade</label>
                            <select name="cidade" id="cidade" required>
                            </select>
                        </div>
                    </div>
                    <div class="input-box">
                        <label for="endereco">Endereço</label>
                        <input type="text" name="endereco" id="endereco" placeholder="Digite seu endereço" required>
                    </div>
                    <div class="input-box">
                        <label for="area-forma">Área de Formação</label>
                        <input type="text" name="area-forma" id="area-forma" placeholder="Digite sua(s) área(s) de formação" required>
                    </div>
                    <div class="input-box">
                        <label for="conteudo">Conteúdo</label>
                        <textarea name="conteudo" id="conteudo" placeholder="Digite conteúdos que tem conhecimento" rows="4" required></textarea>
                    </div>
                    <div class="input-box">
                        <label for="area_id">Área</label>
                        <select name="area_id" id="area_id" required>
                            <option value="">Selecione a área em que o conteúdo se enquadra</option>
                            <?php
                                $sql = "select * from area order by nome";
                                $resultado = mysqli_query($conexao, $sql);
                                while ($linha = mysqli_fetch_array($resultado)):
                                    $id = $linha['id'];
                                    $nome = $linha['nome'];

                                    echo "<option value='{$id}'>{$nome}</option>";
                                endwhile;    
                            ?>
                        </select>
                    </div>
                    <div class="input-box">
                        <label for="valor-hora">Valor Hora/Aula</label>
                        <input type="textarea" name="valor-hora" id="valor-hora" placeholder="Digite o valor de suas aulas por horas ministradas" required>
                    </div>
                    <div class="input-box">
                        <label for="curriculo">Currículo</label>
                        <input type="file" class="input-curriculo" name="curriculo" id="curriculo" required>
                    </div>
                    
                    <div class="inputs-sexo">
                        <div class="title-sexo">
                            <label>Sexo</label>
                        </div>

                        <div class="sexo-group">
                        <div class="sexo-input">
                                <input type="radio" name="sexo" id="masc" value="1">
                                <label for="masc">Masculino</label>
                            </div>
                            <div class="sexo-input">
                                <input type="radio" name="sexo" id="fem" value="2">
                                <label for="fem">Feminino</label>
                            </div>
                            <div class="sexo-input">
                                <input type="radio" name="sexo" id="outro" value="3">
                                <label for="outro">Outro</label>
                            </div>
                            <div class="sexo-input">
                                <input type="radio" name="sexo" id="none" value="4" checked>
                                <label for="none">Prefiro não dizer</label>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="cad-btn" name="cadastrar">Cadastrar</button>

            </form>
        </div>
    </main>

    <?php require_once("../template-prof/rodape2.php") ?>

    <script src="../../assets/js/menu-show.js"></script>
    <script src="../../assets/js/mostrar-senha.js"></script>
    <script src="../../assets/js/mascaras.js"></script>
</body>
</html>