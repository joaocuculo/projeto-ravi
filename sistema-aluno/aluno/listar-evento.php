<?php

    include_once './conexao-agenda.php';

    //query para recuperar os eventos
    $query_events = "SELECT id, title, color, start, end, obs, formaPag FROM events";

    //prepara a query
    $result_events = $conn->prepare($query_events);

    //executando a query
    $result_events->execute();

    //criar array que recebe os eventos
    $eventos = [];

    //percorre a lista de registros retornado do banco de dados
    while($row_events = $result_events->fetch(PDO::FETCH_ASSOC)) {
        //extrair o array
        extract($row_events);
        
        $eventos[] = [
            'id' => $id,
            'title' => $title,
            'color' => $color,
            'start' => $start,
            'end' => $end,
            'obs' => $obs,
            'formaPag' => $formaPag
        ];
    }

    echo json_encode($eventos);
