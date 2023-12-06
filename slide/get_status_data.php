<?php
// Ler o arquivo JSON existente
$jsonFile = '/var/www/simuladosatc.com/config/status.json';
$jsonData = file_get_contents($jsonFile);
$statusData = json_decode($jsonData, true);

// Função para obter a classe CSS com base no status
function getClassByStatus($status) {
  switch ($status) {
    case 'green':
      return 'verde';
    case 'yellow':
      return 'amarelo';
    case 'red':
      return 'vermelho';
    default:
      return '';
  }
}

// Gere e retorne o conteúdo HTML atualizado com base nos dados do JSON
foreach ($statusData['boxes'] as $box) {
  $number = $box['number'];
  $status = $box['status'];
  $class = getClassByStatus($status);
  echo "<div class=\"box $class\">
          <div class=\"number\">$number</div>
        </div>";
}
?>