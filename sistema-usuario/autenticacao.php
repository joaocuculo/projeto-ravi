<?php
    if (isset($_POST['entrar'])) {
        
        $email = $_POST['email'];
        $senha = $_POST['senha'];

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

        header("location: usuarios/principal.php");

        } else {
                $mensagem = "Usuário/Senha inválidos";
                header("location: index.php?mensagem=$mensagem");
        }
    } 
?>