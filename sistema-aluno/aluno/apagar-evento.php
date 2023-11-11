<?php

//Incluir o arquivo com a conexao com o banco de dados
include_once './conexao-agenda.php';

//Receber o id enviados pelo javascript
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

//Acessa o if quando exitir o id do evento
if (!empty($id)) {
    
    $query_apagar_event = "DELETE FROM events WHERE id=:id";

    $apagar_event = $conn->prepare($query_apagar_event);

    $apagar_event->bindParam(':id', $id);

    if ($apagar_event->execute()) {
        $retorna = ['status' => true, 'msg' => 'Evento excluído com sucesso!'];
    } else {
        $retorna = ['status' => false, 'msg' => 'Erro: Evento não excluído!'];
    }

} else {
    $retorna = ['status' => false, 'msg' => 'Erro: Necessário enviar o id do evento!'];
}

echo json_encode($retorna);