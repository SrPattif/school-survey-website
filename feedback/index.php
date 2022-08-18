<?php
    include("../libs/databaseConnection.php");

    /*
    $query = "SELECT ip FROM feedbacks WHERE `ip`='{$answerUUID}'";
    $result = mysqli_query($connection, $query);
    $rowAmount = mysqli_num_rows($result);

    if($rowAmount == 0) {
        header('location: ../');
        exit();
    }*/
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisa - Responder</title>

    <!-- Estilos -->
    <link rel="stylesheet" href="./index.css" />

    <!-- Bibliotecas Externas -->
    <script src="https://use.fontawesome.com/8aae9daeac.js"></script>

    <title>Trabalho de OT - Pesquisa Enviada</title>
</head>

<body>
    <div class="header">
        Pesquisa
    </div>

    <div class="page-content">
        <div class="central-message">
            <p>Obrigado por se interessar no envio de um feedback!<br><br>Pra prosseguir é simples, você só precisa
                informar o que você achou durante o uso do site!</p>
            <form action="../libs/submitFeedback.php" method="POST">
                <p class="placeholder">Nome</p>
                <input type="text" name="name"><br>
                <p class="placeholder">Como foi sua experiência com o site? <small>obrigatório</small></p>

                <div class="question">
                    <div class="custom-select">
                        <hr>
                        <div class="custom-option" id="feedback-positivo">
                            <span><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Positiva</span>
                        </div>
                        <div class="custom-option" id="feedback-negativo">
                            <span><i class="fa fa-thumbs-o-down" aria-hidden="true"></i> Negativa</span>
                        </div>
                        <hr>
                    </div>
                    <input type="hidden" name="feedback_status" id="feedback-input">
                </div><br>
                <p class="placeholder">Me conte mais, mas só se quiser!</p><br>
                <textarea id="" cols="30" rows="5" name="feedback_description">Adorei o site! 🍪</textarea><br>

                <div class="btnEnviar">
                    <div class="btnText" id="survey-send">
                        <button type="submit"><i class="fa fa-paper-plane icon" aria-hidden="true"></i> Enviar
                            Respostas</button>
                    </div>
                </div>

                <a href="../" class="mainMenu"><i class="fa fa-home" aria-hidden="true"></i> Voltar ao menu
                    principal</a>
            </form>
        </div>
    </div>

    <div class="footer">
        Desenvolvido por Gustavo Antonio<br>
        <a href="https://www.instagram.com/ogustavo.a/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
        <a href="https://twitter.com/srpattif_dev"><i class="fa fa-twitter" aria-hidden="true"></i></a>
        <a href="https://github.com/SrPattif"><i class="fa fa-github" aria-hidden="true"></i></a>
    </div>
</body>

<script>
var positivo = document.getElementById('feedback-positivo');
var negativo = document.getElementById('feedback-negativo');
var feedbackInput = document.getElementById('feedback-input');

positivo.addEventListener('click', () => {
    positivo.classList.add('selected');
    negativo.classList.remove('selected');

    feedbackInput.value = '1';

    positivo.innerHTML = '<span><i class="fa fa-thumbs-up" aria-hidden="true"></i> Positiva</span>';
    negativo.innerHTML = '<span><i class="fa fa-thumbs-o-down" aria-hidden="true"></i> Negativa</span>';
});

negativo.addEventListener('click', () => {
    positivo.classList.remove('selected');
    negativo.classList.add('selected');

    feedbackInput.value = '0';

    positivo.innerHTML = '<span><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Positiva</span>';
    negativo.innerHTML = '<span><i class="fa fa-thumbs-down" aria-hidden="true"></i> Negativa</span>';
});
</script>

</html>