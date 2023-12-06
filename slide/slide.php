<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Slide</title>
  <style>
   body {
  background: url('https://wallpaperaccess.com/full/1216317.png');
  background-repeat: no-repeat;
  background-size: cover;
  font-family: 'Press Start 2P', cursive;
  color: #ffffff;
}

* {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}

main {
  margin: 1px auto;
  width: 800px;
}

h1 {
  font-size: 30px;
  margin-top: 20px;
  text-align: center;
  color: white;
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8); /* Adiciona um contorno preto */
}

section {
  margin-top: 40px;
  display: grid;
  grid-template-rows: repeat(4, 1fr);
  grid-template-columns: repeat(10, 1fr);
  gap: 10px;
  justify-content: center;
}

.box {
  border: 2px solid black;
  position: relative;
  display: flex;
  justify-content: center;
  align-items: end;
  height: 85px;
  width: 85px;
  border-radius: 20%;
  text-align: center;
  line-height: 50px;
  background-color: green;
}

.number {
  margin: 10px;
  font-size: 24px;
  color: #ffffff;
}

.verde {
  background-color: green;
}

.amarelo {
  background-color: yellow;
}

.vermelho {
  background-color: red;
}

.ver-questao-button {
  margin-top: 10px;
  padding: 3px 8px;
  border: none;
  border-radius: 5px;
  background-color: #ff6b6b;
  color: #fff;
  font-size: 14px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.ver-questao-button:hover {
  background-color: #ff4f4f;
}

.ver-questao-button:focus {
  outline: none;
}

.legenda {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 20px;
}

.legenda-item {
  display: flex;
  align-items: center;
  margin-right: 20px;
}

.legenda-box {
  border: 2px solid black;
  height: 20px;
  width: 20px;
  margin-right: 10px;
  border-radius: 50%;
}

.legenda-text {
  color: white;
  font-size: 14px;
}

  </style>
  <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
</head>

<body>
  <main>
    <h1>RETRO QUIZ</h1>
    <section id="questoes">
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

    // Gerar os mostradores com base nos dados do arquivo JSON
    foreach ($statusData['boxes'] as $box) {
      $number = $box['number'];
      $status = $box['status'];
      $class = getClassByStatus($status);
      echo "<div class=\"box $class\">
              <div class=\"number\">$number</div>
            </div>";
    }
    ?>
    </section>

    <div class="legenda">
      <div class="legenda-item">
        <div class="legenda-box verde"></div>
        <div class="legenda-text">Disponível</div>
      </div>
      <div class="legenda-item">
        <div class="legenda-box amarelo"></div>
        <div class="legenda-text">Em análise</div>
      </div>
      <div class="legenda-item">
        <div class="legenda-box vermelho"></div>
        <div class="legenda-text">Bloqueada</div>
      </div>
    </div>
  </main>
  <script>
   function updateData() {
  // Fazer uma requisição AJAX para obter os dados do servidor
  var xhr = new XMLHttpRequest();
  xhr.open('GET', 'get_status_data.php', true);
  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        // Atualizar a seção com os novos dados
        document.querySelector('#questoes').innerHTML = xhr.responseText;
      } else {
        console.error('Erro ao obter os dados:', xhr.statusText);
      }
      
      // Agendar a próxima atualização após 5 segundos
      setTimeout(updateData, 5000);
    }
  };
  xhr.send();
}

// Iniciar a atualização dos dados quando o DOM estiver pronto
document.addEventListener('DOMContentLoaded', function() {
  updateData();
});

  </script>
</body>
</html>