<?php
session_start(); // Inicia a sessão

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["equipe"])) {
    $equipeSelecionada = $_POST["equipe"];

    // Validar e sanitizar a entrada, você pode ajustar conforme necessário
    $equipeSelecionada = filter_var($equipeSelecionada, FILTER_SANITIZE_STRING);

    list($equipeLetra, $equipeNumero) = explode(":", $equipeSelecionada);

    // Define o nome da sessão como o identificador da equipe
    $nomeSessao = "EquipeSession_" . $equipeNumero;
    session_name($nomeSessao);

    // Salvar a equipe escolhida como identificador na sessão
    $_SESSION["equipe_identificador"] = $equipeSelecionada;
    $_SESSION["equipe_numero"] = $equipeNumero;

    // Redirecionar para enviar.php
    header("Location: /alunos/index.php");
    exit; // Certifique-se de usar exit após o redirecionamento
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css"> <!-- Arquivo de estilo externo -->
    <title>Seleção de Equipe</title>
    <style>
        body {
            background-image: url('https://wallpaperaccess.com/full/1216317.png');
            background-repeat: no-repeat;
            background-size: cover;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
        }

        h1 {
            font-size: 24px;
            color: #333;
        }

        select {
            padding: 8px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Selecione sua equipe</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <select name="equipe">
                <?php
                for ($i = 1; $i <= 26; $i++) {
                    $equipe = chr(64 + $i) . ":" . str_pad($i, 2, '0', STR_PAD_LEFT);
                    echo "<option value='" . htmlspecialchars($equipe, ENT_QUOTES) . "'>$equipe</option>";
                }
                ?>
            </select>
            <button type="submit">Selecionar</button>
        </form>
    </div>
</body>

</html>
