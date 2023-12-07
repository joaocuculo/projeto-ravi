<?php

    require_once('../../conexao.php');

    if (isset($_POST['salvar'])) {

        $id = $_POST['id'];
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
        $curriculo = $_POST['curriculo'];
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

            if (validaCPF($CPF)) {
                
                if (calcularIdade($_POST['DN']) > 130) {
                    $mensagem = "Há algo de errado com sua idade.";
                } elseif (calcularIdade($_POST['DN']) >= 18) {
                    $sql = "UPDATE professor
                               SET nome = '$nome',
                                   email = '$email',
                                   senha = '$senha',
                                   dn = '$DN',
                                   endereco = '$endereco',
                                   cep = '$CEP',
                                   estado = '$estado',
                                   cidade = '$cidade',
                                   telefone = '$tel',
                                   cpf = '$CPF',
                                   rg = '$RG',
                                   sexo = '$sexo',
                                   areaFormacao = '$areaForma',
                                   curriculo = '$curriculo',
                                   conteudo = '$conteudo',
                                   valorHora = '$valorHora',
                                   area_id = '$area_id',
                                   status = '$status'
                             WHERE id = $id";
                    
                    mysqli_query($conexao, $sql);
                    
                    $mensagem = "Editado com sucesso!";
                } else {
                    $mensagem = "É necessário ser maior de idade para se tornar nosso professor.";
                }
            } else {
                $mensagem = "O CPF informado não é válido";
            }
        } else {
            $mensagem = "As senhas inseridas são diferentes.";
        }  
    }

    function validaCPF($cpf)
    {
      // Remove caracteres não numéricos
      $cpf = preg_replace('/[^0-9]/', '', $cpf);
    
      // Verifica se o CPF possui 11 dígitos
      if (strlen($cpf) != 11) {
        return false;
      }
    
      // Verifica se todos os dígitos são iguais
      if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
      }
    
      // Calcula o primeiro dígito verificador
      $soma = 0;
      for ($i = 0; $i < 9; $i++) {
        $soma += $cpf[$i] * (10 - $i);
      }
      $resto = $soma % 11;
      $digito1 = ($resto < 2) ? 0 : 11 - $resto;
    
      // Calcula o segundo dígito verificador
      $soma = 0;
      for ($i = 0; $i < 10; $i++) {
        $soma += $cpf[$i] * (11 - $i);
      }
      $resto = $soma % 11;
      $digito2 = ($resto < 2) ? 0 : 11 - $resto;
    
      // Verifica se os dígitos verificadores estão corretos
      if ($cpf[9] == $digito1 && $cpf[10] == $digito2) {
        return true;
      } else {
        return false;
      }
    }    

    $sql = "SELECT professor.*, professor.nome AS nome_professor, area.nome AS nome_area, area.nome
              FROM professor
        INNER JOIN area ON professor.area_id = area.id
             WHERE professor.id = " . $_GET['id'];
    $resultado = mysqli_query($conexao, $sql);
    $linha = mysqli_fetch_array($resultado);
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
    <title>Ravi - Editar</title>
</head>
<body>
    <?php require_once("../template-prof/menu-cad.php") ?>

    <main>
        <div class="container">
            <form method="post" name="form" enctype="multipart/form-data">
                <div class="form-title">
                    <h1>Editar Professor</h1>
                </div>

                <?php if (isset($mensagem)) { ?>
                    <div class="mensagem">
                        <?= $mensagem ?>
                    </div>
                <?php } ?>

                <div class="input-group">
                    <input type="hidden" name="id" value="<?= $linha['id'] ?>">
                    <div class="input-box">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" id="nome" value="<?= $linha['nome_professor'] ?>" required>
                    </div>
                    <div class="input-box">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="email" value="<?= $linha['email'] ?>" required>
                    </div>
                    <div class="input-box">
                        <label for="senha">Senha</label>
                        <input type="password" name="senha" id="senha" value="<?= $linha['senha'] ?>" minlength="8" required>
                        <i class="fa-solid fa-eye" id="btn-senha" onclick="mostrarSenha()"></i>
                    </div>
                    <div class="input-box">
                        <label for="senha-conf">Confirme sua senha</label>
                        <input type="password" name="senha-conf" id="senha-conf" value="<?= $linha['senha'] ?>" minlength="8" required>
                        <i class="fa-solid fa-eye" id="btn-senha-conf" onclick="mostrarSenhaConf()"></i>
                    </div>
                    <div class="input-box">
                        <label for="DN">Data de nascimento</label>
                        <input type="date" name="DN" id="DN" value="<?= $linha['dn'] ?>" required>
                    </div>
                    <div class="input-meio-group">
                        <div class="input-box input-meio">
                            <label for="telefone">Telefone</label>
                            <input type="tel" name="telefone" id="telefone" value="<?= $linha['telefone'] ?>" minlength="15" maxlength="16" required>
                        </div>
                        <div class="input-box input-meio">
                            <label for="CPF">CPF</label>
                            <input type="text" name="CPF" id="CPF" value="<?= $linha['cpf'] ?>" autocomplete="off" minlength="14" maxlength="14" required>
                        </div>
                        <div class="input-box input-meio">
                            <label for="RG">RG</label>
                            <input type="text" name="RG" id="RG" value="<?= $linha['rg'] ?>" maxlength="14" required>
                        </div>
                        <div class="input-box input-meio">
                            <label for="CEP">CEP</label>
                            <input type="text" name="CEP" id="CEP" value="<?= $linha['cep'] ?>" minlength="9" maxlength="9" required>
                        </div>
                        <div class="input-box input-meio">
                            <label for="estado">Estado</label>
                            <select name="estado" id="estado" value="<?= $linha['estado'] ?>" required>
                                <option value="<?= $linha['estado'] ?>"><?= $linha['estado'] ?></option>
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
                            <input type="text" name="cidade" id="cidade" value="<?= $linha['cidade'] ?>">
                        </div>
                    </div>
                    <div class="input-box">
                        <label for="endereco">Endereço</label>
                        <input type="text" name="endereco" id="endereco" value="<?= $linha['endereco'] ?>" required>
                    </div>
                    <div class="input-box">
                        <label for="area-forma">Área de Formação</label>
                        <input type="text" name="area-forma" id="area-forma" value="<?= $linha['areaFormacao'] ?>" required>
                    </div>
                    <div class="input-box">
                        <label for="conteudo">Conteúdo</label>
                        <textarea name="conteudo" id="conteudo" rows="4" required><?= $linha['conteudo'] ?></textarea>
                    </div>
                    <div class="input-box">
                        <label for="area_id">Área</label>
                        <select name="area_id" id="area_id" required>
                            <option value="<?= $linha['area_id'] ?>"><?= $linha['nome_area'] ?></option>
                            <?php
                                $sql = "SELECT * FROM area ORDER BY nome";
                                $resultado = mysqli_query($conexao, $sql);
                                while ($linha2 = mysqli_fetch_array($resultado)):
                                    $id = $linha2['id'];
                                    $nome = $linha2['nome'];

                                    echo "<option value='{$id}'>{$nome}</option>";
                                endwhile;    
                            ?>
                        </select>
                    </div>
                    <div class="input-box">
                        <label for="valor-hora">Valor Hora/Aula</label>
                        <input type="textarea" name="valor-hora" id="valor-hora" value="<?= $linha['valorHora'] ?>" required>
                    </div>
                    <div class="input-box">
                        <label for="curriculo">Currículo (Lattes)</label>
                        <input type="url" class="input-curriculo" name="curriculo" id="curriculo" value="<?= $linha['curriculo'] ?>" required>
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

                <button type="submit" class="cad-btn" name="salvar">Salvar</button>

            </form>
        </div>
    </main>

    <?php require_once("../template-prof/rodape1.php") ?>

    <script src="../../assets/js/cep.js"></script>
    <script src="../../assets/js/menu-show.js"></script>
    <script src="../../assets/js/mostrar-senha.js"></script>
    <script src="../../assets/js/mascaras.js"></script>
</body>
</html>