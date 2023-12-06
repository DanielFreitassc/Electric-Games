<php?

?>
<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            background: url('https://i.pinimg.com/originals/c9/d5/ca/c9d5cad23bb49cccb5f73f81b181c865.gif');
            background-size: cover;
            max-width: 100%;
            height: auto;
            font-family: 'Press Start 2P', 'arial', cursive;
            color: #ffffff;
        }

        /* Estilos para a mensagem de sucesso */
        .success-message {
            background-color: #4CAF50;
            color: white;
            padding: 20px;
            text-align: center;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border-radius: 10px;
            font-size: 24px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* Estilos para o rosto sorridente (emoji) */
        .smiley-face {
            font-size: 48px;
            margin-bottom: 10px;
        }

        /* Estilos para o botão de voltar */
        button {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 20px 40px; /* Aumentando o tamanho do botão */
            border-radius: 10px;
            cursor: pointer;
            font-size: 24px;
            display: flex;
            align-items: center;
        }

        button:hover {
            background-color: #2674b5;
        }

        /* Estilos para as setas */
        .arrow::before {
            content: "\2190"; /* Código de escape para uma seta esquerda */
            margin-right: 10px;
        }
    </style>
</head>
<body>
<?php
session_start();

function atualizarContagem($boxNumber) {
    $contagemFile = '/var/www/simuladosatc.com/config/contagem.json';

    if (file_exists($contagemFile)) {
        $contagemData = json_decode(file_get_contents($contagemFile), true);
    } else {
        $contagemData = array();
    }

    if (array_key_exists($boxNumber, $contagemData)) {
        $contagemData[$boxNumber]++;
    } else {
        $contagemData[$boxNumber] = 1;
    }

    file_put_contents($contagemFile, json_encode($contagemData, JSON_PRETTY_PRINT));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $questao = $_POST["questao"];
    $file = $_FILES["photo"];
    $respostaAluno = $_POST["resposta"];

    $gabaritoFile = '/var/www/simuladosatc.com/professor/gabarito.json';
    $gabarito = json_decode(file_get_contents($gabaritoFile), true);

    if ($respostaAluno === $gabarito["questao" . $questao]) {
        $fileName = $file["name"];
        $fileTmp = $file["tmp_name"];

        $uploadDir = __DIR__ . "/uploads/questao" . $questao . "/";
        $equipeSelecionada = isset($_SESSION['equipe_identificador']) ? $_SESSION['equipe_identificador'] : '';

        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $newFileName = $equipeSelecionada . "_questao" . $questao . "." . $fileExt;

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $uploadPath = $uploadDir . $newFileName;

        if (move_uploaded_file($fileTmp, $uploadPath)) {
            echo "<div class='success-message'>
                <div class='smiley-face'>😄</div>
                Foto enviada com sucesso para a pasta questão" . $questao . ".
            </div>";
            
            // Call the function to update the count after moving the file
            atualizarContagem($questao);
        } else {
            echo "<span class='error'>Ocorreu um erro ao enviar a foto.</span>";
        }
    } else {
        echo "<div class='success-message'>
                <div class='smiley-face'>😄</div>
                Foto enviada com sucesso para a pasta questão" . $questao . ".
            </div>";
    }
}
?>

<!-- Botão de voltar -->
<button onclick="history.back()" class="arrow">Voltar</button>
</body>
</html>

