<?php

//Incluir o arquivo com a conexao com o banco de dados
include_once './conexao-agenda.php';

//Receber os dados enviados pelo javascript
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$consulta_aula = "SELECT start AND end FROM events WHERE start = ':start' AND end = ':end'";
$resultado_aula = $conn->query($consulta_aula);
$linha_aula = mysqli_fetch_array($resultado_aula);

if ($linha_aula == 0) {
    
    $query_cad_event = "INSERT INTO events (title, color, start, end, conteudo, formaPag, aluno_id, professor_id, valorTotal) VALUES (:title, :color, :start, :end, :conteudo, :formaPag, :aluno_id, :professor_id, :valorTotal)";
    
    $cad_event = $conn->prepare($query_cad_event);
    
    $cad_event->bindParam(':title', $dados['cad_title']);
    $cad_event->bindParam(':color', $dados['cad_color']);
    $cad_event->bindParam(':start', $dados['cad_start']);
    $cad_event->bindParam(':end', $dados['cad_end']);
    $cad_event->bindParam(':conteudo', $dados['cad_conteudo']);
    $cad_event->bindParam(':formaPag', $dados['cad_formaPag']);
    $cad_event->bindParam(':aluno_id', $dados['cad_aluno_id']);
    $cad_event->bindParam(':professor_id', $dados['cad_professor_id']);
    $cad_event->bindParam(':valorTotal', $dados['cad_valorTotalHidden']);
    
    if ($cad_event->execute()) {
        $retorna = ['status' => true, 'msg' => 'Evento cadastrado com sucesso!', 'id' => $conn->lastInsertId(), 'title' => $dados['cad_title'], 'color' => $dados['cad_color'], 'start' => $dados['cad_start'], 'end' => $dados['cad_end'], 'conteudo' => $dados['cad_conteudo'], 'formaPag' => $dados['cad_formaPag'], 'aluno_id' => $dados['cad_aluno_id'], 'professor_id' => $dados['cad_professor_id'], 'valorTotal' => $dados['cad_valorTotalHidden']];
    } else {
        $retorna = ['status' => false, 'msg' => 'Erro: Evento não cadastrado!'];
    }
} else {
    $retorna = ['status' => false, 'msg' => 'Erro: Já tem um evento cadastrado nesse horário!'];
}

echo json_encode($retorna);
