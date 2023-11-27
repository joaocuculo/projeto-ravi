<?php

//Incluir o arquivo com a conexao com o banco de dados
include_once './conexao-agenda.php';

//Receber os dados enviados pelo javascript
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$query_edit_event = "UPDATE events SET title=:title, color=:color, conteudo=:conteudo, aluno_id=:aluno_id, professor_id=:professor_id WHERE id=:id";

$edit_event = $conn->prepare($query_edit_event);

$edit_event->bindParam(':title', $dados['edit_title']);
$edit_event->bindParam(':color', $dados['edit_color']);
$edit_event->bindParam(':conteudo', $dados['edit_conteudo']);
$edit_event->bindParam(':aluno_id', $dados['edit_aluno_id']);
$edit_event->bindParam(':professor_id', $dados['edit_professor_id']);
$edit_event->bindParam(':id', $dados['edit_id']);

if ($edit_event->execute()) {
    $retorna = ['status' => true, 'msg' => 'Evento editado com sucesso!', 'id' => $dados['edit_id'], 'title' => $dados['edit_title'], 'color' => $dados['edit_color'], 'conteudo' => $dados['edit_conteudo'], 'aluno_id' => $dados['edit_aluno_id'], 'professor_id' => $dados['edit_professor_id']];
} else {
    $retorna = ['status' => false, 'msg' => 'Erro: Evento não editado!'];
}

echo json_encode($retorna);
