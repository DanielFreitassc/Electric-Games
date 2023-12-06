<?php
$uploadDir = "../alunos/uploads/";

if (is_dir($uploadDir)) {
  $arquivos = scandir($uploadDir);

  foreach ($arquivos as $arquivo) {
    if (!in_array($arquivo, array('.', '..'))) {
      $infoArquivo = explode("_", $arquivo);

      if (count($infoArquivo) >= 3) {
        $equipeIdentificador = $infoArquivo[0];
        $equipePartes = explode(":", $equipeIdentificador);
        $equipeLetra = $equipePartes[0];
        $equipeNumero = $equipePartes[1];
        $questao = $infoArquivo[1];
        $dataModificacao = date('d/m/Y H:i:s', filemtime($uploadDir . $arquivo));

        echo '<div class="file">';
        echo '<img src="file-icon.png" alt="Ícone de arquivo">';
        echo '<div class="file-info">';
        echo '<span class="file-name">' . $arquivo . '</span>';
        echo '<span class="file-details">Equipe: ' . $equipeLetra . ' (Número: ' . $equipeNumero . ') - Questão: ' . $questao . '</span>';
        echo '<span class="file-details">Enviada em: ' . $dataModificacao . '</span>';
        echo '</div>';
        echo '</div>';
      }
    }
  }
} else {
  echo '<span style="color: white;">Nenhum arquivo enviado.</span>';
}
?>


<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["questao"])) {
    $questao = $_GET["questao"];

    // Verifica se a questão é um número válido
    if (is_numeric($questao) && $questao >= 1 && $questao <= 40) {
        $caminhoPasta = "../alunos/uploads/questao{$questao}/";

        if (is_dir($caminhoPasta)) {
            $arquivos = scandir($caminhoPasta);

            foreach ($arquivos as $arquivo) {
                if (!in_array($arquivo, array('.', '..'))) {
                    $caminhoCompleto = $caminhoPasta . $arquivo;
                    $dataModificacao = date('d/m/Y H:i:s', filemtime($caminhoCompleto));

                    echo '<div class="file">';
                    echo '<a href="' . $caminhoCompleto . '">';
                    echo '<img src="file-icon.png" alt="Ícone de arquivo">';
                    echo '<span class="file-name">' . $arquivo . '</span>';
                    echo '<span class="file-date">Enviada em: ' . $dataModificacao . '</span>';
                    echo '</a>';
                    echo '</div>';
                }
            }
        } else {
          echo '<span style="color: white;">A questão: ' . $questao . ' ainda não foi enviada.</span>';
        }
    } else {
        echo 'Questão inválida.';
    }
} else {
    echo 'Questão inválida.';
}
?>

<!DOCTYPE html>
<html lang="pt=br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
  <title>Respostas</title>
  <style>
    h1 {
      margin-top:300px;
      font-size: 50px;
      text-align: center;
      margin-bottom: 5px;
      color:white;
    }

    .file {
      display: flex;
      align-items: center;
      margin-bottom: 10px;
      padding: 10px;
      background-color: #c7ffff;
      border-radius: 4px;
    }

    .file img {
      width: 24px;
      height: 24px;
      margin-right: 10px;
    }

    .file-name {
      flex-grow: 1;
      font-size: 22px;
      color: green;
    }

    .file-date {
      margin-left: 30px;
      font-size: 20px;
      color: red;
    }
    body {
  background-image: url('https://wallpaperaccess.com/full/1216317.png');
  background-repeat: no-repeat;
  background-size: cover;
  
  font-family: 'Press Start 2P','arial', cursive;
}   
  </style>
</head>

<body>
  <main>
    <h1>Respostas</h1>
</body>

</html>
