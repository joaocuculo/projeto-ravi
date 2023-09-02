<?php
    if (isset($_POST['entrar'])) {
        
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $sql = "select *
                    from aluno
                   where email = '{$email}'
                     and senha = '{$senha}'";

        require_once("../conexao.php");
        $resultado = mysqli_query($conexao, $sql);
        $registros = mysqli_num_rows($resultado);

        if ($registros > 0) {
            $aluno = mysqli_fetch_array($resultado);

            session_start();
            $_SESSION['id'] = $aluno['id'];
            $_SESSION['nome'] = $aluno['nome'];
            $_SESSION['email'] = $aluno['email'];

            header("location: aluno/cadastro.php");
        } else {
            $mensagem = "Usuário/Senha inválidos";
            header("location: index.php?mensagem=$mensagem");
        }
    }    
?>