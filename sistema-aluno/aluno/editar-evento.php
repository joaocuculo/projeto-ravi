<?php

//Incluir o arquivo com a conexao com o banco de dados
include_once './conexao-agenda.php';

//Receber os dados enviados pelo javascript
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$query_edit_event = "UPDATE events SET title=:title, color=:color, start=:start, end=:end, conteudo=:conteudo, formaPag=:formaPag, aluno_id=:aluno_id, professor_id=:professor_id, valorTotal=:valorTotal WHERE id=:id";

$edit_event = $conn->prepare($query_edit_event);

$edit_event->bindParam(':title', $dados['edit_title']);
$edit_event->bindParam(':color', $dados['edit_color']);
$edit_event->bindParam(':start', $dados['edit_start']);
$edit_event->bindParam(':end', $dados['edit_end']);
$edit_event->bindParam(':conteudo', $dados['edit_conteudo']);
$edit_event->bindParam(':formaPag', $dados['edit_formaPag']);
$edit_event->bindParam(':aluno_id', $dados['edit_aluno_id']);
$edit_event->bindParam(':professor_id', $dados['edit_professor_id']);
$edit_event->bindParam(':valorTotal', $dados['edit_valorTotalHidden']);
$edit_event->bindParam(':id', $dados['edit_id']);

if ($edit_event->execute()) {
    $retorna = ['status' => true, 'msg' => 'Evento editado com sucesso!', 'id' => $dados['edit_id'], 'title' => $dados['edit_title'], 'color' => $dados['edit_color'], 'start' => $dados['edit_start'], 'end' => $dados['edit_end'], 'conteudo' => $dados['edit_conteudo'], 'formaPag' => $dados['edit_formaPag'], 'aluno_id' => $dados['edit_aluno_id'], 'professor_id' => $dados['edit_professor_id'], 'valorTotal' => $dados['edit_valorTotalHidden']];
} else {
    $retorna = ['status' => false, 'msg' => 'Erro: Evento não editado!'];
}

echo json_encode($retorna);
