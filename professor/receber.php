<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tela professor</title>
  <style>
    body {
      background:url(https://wallpaperaccess.com/full/1216317.png);
      background-repeat: no-repeat;
      background-size: cover;
      font-family: 'Press Start 2P', cursive;
      color: white;
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
      border: 1px solid black;
      position: relative;
      display: flex;
      justify-content: center;
      align-items: end;
      background-color: green;
      height: 85px;
      width: 85px;
      border-radius: 20%;
      text-align: center;
      line-height: 50px;
    }

    .number {
      margin: 20px;
      font-size: 22px;
      color: #ffffff;
    }

    .botao1 {
      margin-left: -70px;
      min-height: 19px;
      max-height: 20px;
      max-width: 30px;
      min-width: 19px;
      background-color: green;
      border: 2px solid black;
      border-radius: 40%;
    }
    .botao2 {
      min-height: 19px;
      max-height: 20px;
      max-width: 30px;
      min-width: 19px;
      background-color: red;
      border: 2px solid black;
      border-radius: 40%;
    }

    .botao3 {
      min-height: 19px;
      max-height: 20px;
      max-width: 30px;
      min-width: 19px;
      background-color: yellow;
      border: 2px solid black;
      border-radius: 40%;
    }
    .vermelho {
      background-color: red;
    }
    .amarelo {
      background-color: yellow;
    }
    .verde {    
      background-color: green;
    }
    .ver-questao-button {
      margin-top: 7px;
      padding: 3px 8px;
      border: 1px solid green;
      border-radius: 10px;
      background-color: DimGrey;
      color: white;
      font-size: 18px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .ver-questao-button:hover {
      background-color: black;
    }

    .ver-questao-button:focus {
      outline: none;
    }

    .slide-show-button {
      position: fixed;
      top: 20px;
      right: 20px;
      z-index: 9990;
      padding: 3px 6px;
      background-color: #4CAF50;
      color: #fff;
      font-size: 30px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
      font-family: 'Press Start 2P', cursive;
      color: white;
    }

    .slide-show-button:hover {
      background-color: #45a049;
    }
     /* Estilo para o botão "Gabarito" */
    .buttonGabarito {
    background-color: #4CAF50; /* Cor de fundo verde */
    color: white; /* Cor do texto branca */
    padding: 3px 6px; /* Espaçamento interno */
    font-size: 20px; /* Tamanho da fonte */
    border: none; /* Sem borda */
    border-radius: 5px; /* Borda arredondada */
    cursor: pointer; /* Cursor de mão ao passar o mouse */
    transition: background-color 0.3s ease; /* Efeito de transição suave na cor de fundo */
    position: fixed; /* Posição fixa na tela */
    top: 80px; /* Distância do topo */
    right: 15px; /* Distância da direita */
    font-family: 'Press Start 2P', cursive;
      color: white;
    
  }

  /* Estilo de hover (quando o mouse passa por cima) */
  .buttonGabarito:hover {
    background-color: #45a049; /* Cor de fundo ligeiramente mais escura */
  }
  </style>
  <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
</head>

<body>
<audio id="notificationSound" preload="auto">
  <source src="notif.mp3" type="audio/mpeg">
</audio>

<script>
function playNotificationSound() {
  const notificationSound = document.getElementById('notificationSound');
  if (notificationSound) {
    notificationSound.currentTime = 0;
    notificationSound.play();

    const extendedDuration = 5; // Tempo desejado em segundos

    setTimeout(function() {
      notificationSound.pause();
      notificationSound.currentTime = 0;
    }, extendedDuration * 100);

    // Aguarda um pouco antes de recarregar a página
    setTimeout(function() {
      reloadPage();
    }, (extendedDuration + 1) * 65); // Tempo de espera um segundo a mais
  }
}

</script>


  <main>
    <h1>Gerenciamento das questões</h1>
    <a href="gabarito.php" ><button class="buttonGabarito">Gabarito</button></a>
    <section id="questoes"></section>
  </main>
  <button class="slide-show-button">Slide</button>
  <script>
    const secao = document.querySelector('#questoes');
const slideShowButton = document.querySelector('.slide-show-button');

function openFolder(questao) {
  window.location.href = 'busca.php?questao=' + questao;
}

slideShowButton.addEventListener('click', function() {
  window.open('../slide/slide.php', '_blank');
});

function redirectToSlideShow() {
  window.location.href = '../slide/slide.php';
}

for (let i = 1; i <= 40; i++) {
  const div = document.createElement('div');
  div.classList.add('box');
  div.setAttribute('data-box-number', i);
  const p = document.createElement('p');
  p.textContent = i;
  p.classList.add('number');

  const green = document.createElement('div');
  green.classList.add('botao1');
  green.addEventListener('click', function () {
    updateStatus(i, 'green');
    reloadPage();
  });

  const red = document.createElement('div');
  red.classList.add('botao2');
  red.addEventListener('click', function () {
    updateStatus(i, 'red');
    playNotificationSound();
  });

  const yellow = document.createElement('div');
  yellow.classList.add('botao3');
  yellow.addEventListener('click', function () {
    updateStatus(i, 'yellow');
    reloadPage();
  });

  div.appendChild(p);
  div.appendChild(green);
  div.appendChild(red);
  div.appendChild(yellow);

  const verQuestaoButton = document.createElement('button');
  verQuestaoButton.classList.add('ver-questao-button');
  verQuestaoButton.textContent = 'Ver Questão';
  verQuestaoButton.addEventListener('click', function () {
    openFolder(i);

    // Enviar uma solicitação AJAX para atualizar o contagem.json
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'atualizar_contagem.php', true); // Substitua pelo caminho correto para o PHP
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          console.log('Contagem atualizada com sucesso.');
        } else {
          console.log('Erro ao atualizar a contagem.');
        }
      }
    };
    xhr.send(`questao=${i}`);
  });

  const buttonContainer = document.createElement('div');
  buttonContainer.appendChild(verQuestaoButton);

  const container = document.createElement('div');
  container.appendChild(div);
  container.appendChild(buttonContainer);

  secao.appendChild(container);
}


let previousItemCount = null; // Armazenar o número anterior da notificação

  function updateStatus(boxNumber, status) {
    // Enviar uma solicitação AJAX para atualizar o status
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '<?php echo $_SERVER["PHP_SELF"]; ?>', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          const response = JSON.parse(xhr.responseText);
          if (response.success) {
            console.log('Status atualizado com sucesso.');
            const boxElement = document.querySelector(`.box[data-box-number="${boxNumber}"]`);
            const boxClass = getClassByStatus(status);
            if (boxElement) {
              boxElement.classList.remove('verde', 'amarelo', 'vermelho');
              boxElement.classList.add(boxClass);
              const pElement = boxElement.querySelector('.number');
              if (pElement) {
                pElement.classList.remove('verde', 'amarelo', 'vermelho');
                pElement.classList.add(boxClass);
              }
            }

            // Atualizar a notificação
            const itemCount = response.itemCount;
            if (previousItemCount !== itemCount) { // Verificar se o número mudou
              reloadPage(); // Atualizar a página apenas se o número mudou
            }
            
            previousItemCount = itemCount; // Armazenar o número atual da notificação
          } else {
            console.log('Falha ao atualizar o status.');
          }
        } else {
          console.log('Erro na solicitação.');
        }
      }
    };
    xhr.send(`boxNumber=${boxNumber}&status=${status}`);
  }

function getClassByStatus(status) {
  switch (status) {
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

function reloadPage() {
  setTimeout(() => {
    window.location.reload();
  }, 100);
}
window.addEventListener('load', function () {
  function updateNotificationCount() {
    
    // Sincronizar cores iniciais com o JSON
    fetch('/config/status.json')
      .then(response => response.json())
      .then(data => {
        //  Contagem de de notificações /contagem.json
        fetch('/config/contagem.json')
          .then(countResponse => countResponse.json())
          .then(countData => {
            data.boxes.forEach(box => {
              const boxNumber = box.number;
              const status = box.status;
              const boxClass = getClassByStatus(status);
              const boxElement = document.querySelector(`.box[data-box-number="${boxNumber}"]`);
              if (boxElement) {
                boxElement.classList.add(boxClass);
                const pElement = boxElement.querySelector('.number');
                if (pElement) {
                  pElement.classList.add(boxClass);
                }
              }

              // Create and append the item count notification
              const itemCount = countData[boxNumber] || 0; // Acessa o valor correspondente ou 0 se não existir
              const notificationElement = createNotificationElement(itemCount);
              boxElement.appendChild(notificationElement);
            });
          })
          .catch(error => console.error('Erro ao carregar os dados de contagem:', error));
      })
      .catch(error => console.error('Erro ao carregar os dados:', error));
    }

// Chame a função inicialmente
updateNotificationCount();

// Atualize a contagem a cada 5 segundos
setInterval(updateNotificationCount, 5000);
  });

  function createNotificationElement(itemCount) {
    const notification = document.createElement('div');
    notification.textContent = itemCount; // Mostra apenas o número de itens
    notification.style.position = 'absolute';
    notification.style.top = '-10px'; /* Posição vertical ajustada para -30px */
    notification.style.left = '1px'; /* Posição horizontal ajustada para 1px */
    notification.style.width = '30px'; /* Largura definida para criar um círculo */
    notification.style.height = '30px'; /* Altura definida para criar um círculo */
    notification.style.lineHeight = '30px'; /* Centraliza verticalmente o texto */
    notification.style.textAlign = 'center'; /* Centraliza horizontalmente o texto */
    notification.style.background = 'radial-gradient(circle, lime, lime'; /* Gradiente de cores */
    notification.style.color = '#4B0082';
    notification.style.borderRadius = '50%'; /* Define a forma circular */
    notification.style.border = '1px solid black';
    return notification;
  }
</script>
  <?php
  // Ler o arquivo JSON existente
$jsonFile = '/var/www/simuladosatc.com/config/status.json';
$jsonData = file_get_contents($jsonFile);
$statusData = json_decode($jsonData, true);

// Obter os dados enviados via POST
$boxNumber = $_POST['boxNumber'];
$status = $_POST['status'];

// Verificar se o número da caixa já existe no array de boxes
$boxExists = false;
foreach ($statusData['boxes'] as &$box) {
  if ($box['number'] == $boxNumber) {
    $box['status'] = $status;
    $boxExists = true;
    break;
  }
}

// Se o número da caixa não existir, criar um novo objeto para ela
if (!$boxExists && is_numeric($boxNumber)) {
  $newBox = array(
    "number" => $boxNumber,
    "status" => $status
  );
  $statusData['boxes'][] = $newBox;
}

// Converter os dados atualizados em JSON
$updatedJsonData = json_encode($statusData, JSON_PRETTY_PRINT);

// Escrever os dados atualizados no arquivo JSON
file_put_contents($jsonFile, $updatedJsonData);

// Calcular o número de notificações para a caixa atualizada
$itemCount = 0;
foreach ($statusData['boxes'] as $box) {
  if ($box['number'] == $boxNumber) {
    $itemCount = count($box['items']);
    break;
  }
}

// Preparar a resposta JSON com o número de notificações atualizado
$response = array('success' => true, 'itemCount' => $itemCount);
$responseJson = json_encode($response);

// Enviar a resposta de sucesso com o número de notificações
header('Content-Type: application/json');


  ?>
</body>

</html>