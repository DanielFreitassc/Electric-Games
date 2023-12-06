<?php
$senhaCorreta = 'XxXxXxXxXxX';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $senha = $_POST['senha'];

    if ($senha === $senhaCorreta) {
        header('Location:../professor/receber.php');
        exit();
    } else {
        $mensagemErro = 'Senha incorreta';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <title>Professor</title>
    <style>
        body {
            background: url(https://images3.alphacoders.com/129/1298880.png);
            background-repeat: no-repeat;
            background-size: cover;
            font-family: 'Press Start 2P', cursive;
            color: #ffffff;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            flex-direction: column;
        }
        #errado {
            margin-top: 10px;
            color: white;
            background-color: red;
            display: inline;
            border:10px;
        }
        #enviar {
            font-family: 'Press Start 2P', cursive;
            display: flex;
            justify-content:center;
            align-items: center;
            margin-top: 10px;
            border-radius: 5px;
            display: block;

            background-color: #5900ff; /* Cor de fundo do botão */
            color: white; /* Cor do texto do botão */
            font-size: 16px; /* Tamanho da fonte do botão */
            padding: 8px 15px; /* Preenchimento interno do botão */
            border: none; /* Remove a borda do botão */
            cursor: pointer;
            margin-left:80px;
              
        }
        #enviar:hover {
         background-color: #4f377c; 
        } 
        #input {
            text-align: center;
            padding: 10px;
            background-color: rgba(229, 221, 236, 0.493);
            border-radius: 50px;
            border:  none;
            cursor: pointer;
            padding: 10px 50px;
            margin-bottom: 10px;
            box-shadow: 3px 2px rgba(0, 0, 0, 0.342);
        } 
    </style>
</head>
<body>
    <form method="POST" action="">
        <input type="password" name="senha" id="input"> 
        <button type="submit" id="enviar">Login</button>
    </form>
    <div id="resposta">
        <?php if (isset($mensagemErro)) : ?>
            <p id="errado" class="error-message"><?php echo $mensagemErro; ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
