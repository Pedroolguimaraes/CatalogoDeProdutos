<?php
// Função simples para testar o backend

header('Content-Type: application/json');

$response = array(
    "message" => "Função PHP funcionando!",
    "status" => "sucesso"
);

echo json_encode($response);
?>
