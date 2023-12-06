<?php
$questao = $_POST['questao']; // Pega o número da questão do POST

// Lê o contagem.json atual
$contagemFile = '/var/www/simuladosatc.com/config/contagem.json';
$contagemData = json_decode(file_get_contents($contagemFile), true);

// Atualiza a contagem da questão para 0
$contagemData[$questao] = 0;

// Salva os dados de volta no contagem.json
file_put_contents($contagemFile, json_encode($contagemData));

// Responde com sucesso para o cliente
http_response_code(200);
?>
