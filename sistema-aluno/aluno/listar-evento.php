<?php

    include_once './conexao-agenda.php';

    $professor_id = (int)$_GET['id'];

    //query para recuperar os eventos
    $query_events = "SELECT events.id, title, color, start, end, conteudo, formaPag, aluno_id, professor_id, valorTotal, aluno.nome
                    FROM events 
                    INNER JOIN aluno ON aluno.id = events.aluno_id
                    WHERE professor_id = $professor_id";

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
            'conteudo' => $conteudo,
            'formaPag' => $formaPag,
            'aluno_id' => $aluno_id,
            'professor_id' => $professor_id,
            'valorTotal' => $valorTotal,
            'nome' => $nome
        ];
    }

    echo json_encode($eventos);
