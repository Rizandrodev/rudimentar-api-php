<?php

$data = [];

// Request
if (isset($_GET['option'])) {
    switch ($_GET['option']) {
        case 'status':
            $data['status'] = "SUCCESS"; // Corrigido 'SUCESS' para 'SUCCESS'
            $data['data'] = "API Running OK";
            break;
        default:
            $data['status'] = 'Error';
            $data['data'] = 'Invalid option';
    }
} else {
    $data['status'] = 'Error';
    $data['data'] = 'No option provided';
}

// Executar resposta
response($data);

// Construção do response
function response($data_response) {
    header('Content-Type: application/json'); // Corrigido 'aplication/json'
    echo json_encode($data_response);
}
