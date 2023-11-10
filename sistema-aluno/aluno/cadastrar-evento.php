<?php

//Incluir o arquivo com a conexao com o banco de dados
include_once './conexao-agenda.php';

//Receber os dados enviados pelo javascript
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$query_cad_event = "INSERT INTO events (title, color, start, end) VALUES (:title, :color, :start, :end)";

$cad_event = $conn->prepare($query_cad_event);

$cad_event->bindParam(':title', $dados['cad-title']);
$cad_event->bindParam(':color', $dados['cad-color']);
$cad_event->bindParam(':start', $dados['cad-start']);
$cad_event->bindParam(':end', $dados['cad-end']);

if ($cad_event->execute()) {
    $retorna = ['status' => true, 'msg' => 'Evento cadastrado com sucesso!', 'id' => $conn->lastInsertId(), 'title' => $dados['cad-title'], 'color' => $dados['cad-color'], 'start' => $dados['cad-start'], 'end' => $dados['cad-end']];
} else {
    $retorna = ['status' => false, 'msg' => 'Erro: Evento não cadastrado!'];
}

echo json_encode($retorna);
