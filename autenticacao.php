<?php
    if (isset($_POST['entrar'])) {
        
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $sql = "select *
                    from professor
                   where email = '{$email}'
                     and senha = '{$senha}'";

        require_once("conexao.php");
        $resultado = mysqli_query($conexao, $sql);
        $registros = mysqli_num_rows($resultado);

        if ($registros > 0) {
            $professor = mysqli_fetch_array($resultado);

            session_start();
            $_SESSION['id'] = $professor['id'];
            $_SESSION['nome'] = $professor['nome'];
            $_SESSION['email'] = $professor['email'];

            header("location: sistema-professor/professor/cadastro.php");
        } else {
            $sql = "select *
                        from aluno
                       where email = '{$email}'
                         and senha = '{$senha}'";

            $resultado = mysqli_query($conexao, $sql);
            $registros = mysqli_num_rows($resultado);   
            
            if ($registros > 0) {
                $aluno = mysqli_fetch_array($resultado);

                session_start();
                $_SESSION['id'] = $aluno['id'];
                $_SESSION['nome'] = $aluno['nome'];
                $_SESSION['email'] = $aluno['email'];

                header("location: sistema-professor/aluno/cadastro.php");
            } else {
                $sql = "select *
                            from usuario
                           where email = '{$email}'
                             and senha = '{$senha}'";

                $resultado = mysqli_query($conexao, $sql);
                $registros = mysqli_num_rows($resultado);

                if ($registros > 0) {
                    $usuario = mysqli_fetch_array($resultado);
    
                    session_start();
                    $_SESSION['id'] = $usuario['id'];
                    $_SESSION['nome'] = $usuario['nome'];
                    $_SESSION['email'] = $usuario['email'];
    
                    header("location: sistema-professor/usuario/cadastro.php");
                } else {
                    $mensagem = "Usuário/Senha inválidos";
                    header("location: index.php?mensagem=$mensagem");
                }
            }
        }
    }    
?>