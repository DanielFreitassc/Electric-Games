<?php 
    $questoes = [];

    foreach($_POST as $questao => $respostas) {
        $questoes[$questao] = $respostas;
    }

    array_unshift($questoes);

    $jsonQuestoes = json_encode($questoes);
    $caminho = "gabarito.json";

    if(file_put_contents($caminho, $jsonQuestoes)){
        $_SESSION['msg'] = "Salvo com sucesso";
        header("location: receber.php");
    }else{
        echo "Erro ao salvar";
    }
?>