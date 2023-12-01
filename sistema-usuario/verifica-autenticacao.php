<?php

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['id'])) {
    $mensagem = "Sessão expirada. Faça o login novamente.";
    header("location: ../index.php?mensagem={$mensagem}");
}