

<!DOCTYPE html>
<html>
  
<head>
  <meta charset="UTF-8">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="message">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $allowedExtensions = array('jpg', 'png', 'jpeg', 'pdf');
          $questao = $_POST["questao"];
          $file = $_FILES["photo"];

          $fileName = $file["name"];
          $fileTmp = $file["tmp_name"];
          $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

          if (!in_array($fileExt, $allowedExtensions)) {
            echo "<span class='error'>Apenas arquivos JPG, PNG, JPEG e PDF são permitidos.</span>";
          } else {
            $uploadDir = __DIR__ . "/uploads/questao" . $questao . "/";
            $uploadPath = $uploadDir . $fileName;

            if (!is_dir($uploadDir)) {
              mkdir($uploadDir, 0777, true); // Cria o diretório e os diretórios pai, se não existirem
            }

            if (move_uploaded_file($fileTmp, $uploadPath)) {
              // Após mover o arquivo, chame a função para atualizar a contagem
              atualizarContagem($questao);
            } else {
              echo "<span class='error'>Ocorreu um erro ao enviar a foto.</span>";
            }
          }
        }
        ?>
      </div>
      
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="script.js"></script>
</body>
</html>
