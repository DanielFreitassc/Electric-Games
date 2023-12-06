<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gabarito</title>
    <style>
        body {
            background: url(https://wallpaperaccess.com/full/1216317.png);
            background-repeat: no-repeat;
            background-size: cover;
            font-family: 'Press Start 2P', cursive;
            color: white;
            text-align: center; /* Alinha o conteúdo ao centro */
        }

        form {
            margin: 20px auto;
            width: 800px;
            background: rgba(0, 0, 0, 0.7); /* Fundo semitransparente */
            padding: 20px;
            border-radius: 10px;
        }

        /* Estilo para os botões e campos de questão */
        .questao {
            border: 1px solid black;
            background-color: green;
            color: white;
            padding: 10px;
            margin: 10px;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #4CAF50; /* Cor de fundo verde */
            color: white; /* Cor do texto branca */
            padding: 15px 20px; /* Espaçamento interno */
            font-size: 18px; /* Tamanho da fonte */
            border: none; /* Sem borda */
            border-radius: 5px; /* Borda arredondada */
            cursor: pointer; /* Cursor de mão ao passar o mouse */
            transition: background-color 0.3s ease; /* Efeito de transição suave na cor de fundo */
            margin-top: 20px;
        }

        input[type="submit"]:hover {
            background-color: #45a049; /* Cor de fundo ligeiramente mais escura no hover */
        }
        
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
</head>
<body>
    <form action="salvarGabarito.php" method="post">
        <?php for($i = 1; $i<=40; $i++): ?>
            <div class="questao">
                <?php include("questao.php") ?>
            </div>
        <?php endfor; ?>
        <br>
        <input type="submit" value="Confirmar">
    </form>
</body>
</html>
