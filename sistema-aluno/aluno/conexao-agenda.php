<?php

//inicio da conexao com o banco de dados utilizando PDO
$host = "127.0.0.1";
$user = "root";
$pass = "";
$dbname = "ravi";
$port = 3306;

try {
    //conexao com a porta
    //$conn = new PDO("mysql:host=$host;port=$port;dbname=" . $dbname, $user, $pass);

    //conexao sem a porta
    $conn = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);
    //echo "Conexao com o banco de dados realizado com sucesso.";
} catch (PDOException $err) {
    die("Erro: Conexao com o banco de dados não realizado com sucesso. Erro gerado " . $err->getMessage());
}
//fim da conexao com o banco de dados utilizando PDO
