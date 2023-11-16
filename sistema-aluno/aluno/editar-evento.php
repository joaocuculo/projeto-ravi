<?php

//Incluir o arquivo com a conexao com o banco de dados
include_once './conexao-agenda.php';

//Receber os dados enviados pelo javascript
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$query_edit_event = "UPDATE events SET title=:title, color=:color, start=:start, end=:end, obs=:obs, formaPag=:formaPag WHERE id=:id";

$edit_event = $conn->prepare($query_edit_event);

$edit_event->bindParam(':title', $dados['edit_title']);
$edit_event->bindParam(':color', $dados['edit_color']);
$edit_event->bindParam(':start', $dados['edit_start']);
$edit_event->bindParam(':end', $dados['edit_end']);
$edit_event->bindParam(':obs', $dados['edit_obs']);
$edit_event->bindParam(':formaPag', $dados['edit_formaPag']);
$edit_event->bindParam(':id', $dados['edit_id']);

if ($edit_event->execute()) {
    $retorna = ['status' => true, 'msg' => 'Evento editado com sucesso!', 'id' => $dados['edit_id'], 'title' => $dados['edit_title'], 'color' => $dados['edit_color'], 'start' => $dados['edit_start'], 'end' => $dados['edit_end'], 'obs' => $dados['edit_obs'], 'formaPag' => $dados['edit_formaPag']];
} else {
    $retorna = ['status' => false, 'msg' => 'Erro: Evento não editado!'];
}

echo json_encode($retorna);
