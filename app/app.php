<?php

define('API_BASE', 'https://localhost/nome-do-projeto/api/index.php');
echo '<h3>App</h3><hr>';

$resultado = api_request('status');
echo '<pre>' . $resultado . '</pre>';

function api_request($option) {
    // Constrói a URL com o parâmetro de opção
    $url = API_BASE . '?option=' . $option;

    // Inicializa o cURL
    $client = curl_init($url);
    
    // Configurações do cURL
    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($client, CURLOPT_SSL_VERIFYPEER, false); // Se o localhost estiver usando SSL, ignora verificação de certificado
    
    // Executa o cURL e armazena a resposta
    $response = curl_exec($client);
    
    // Verifica se houve erro na execução do cURL
    if (curl_errno($client)) {
        return 'Erro no cURL: ' . curl_error($client);
    }

    // Fecha o cURL
    curl_close($client);
    
    return $response;
}
