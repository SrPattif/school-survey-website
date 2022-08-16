<?php
    include("../libs/databaseConnection.php");

    $answerUUID = null;
    if(!isset($_GET['answerUUID'])) {
        header('location: ../');
        exit();
    } else {
        $answerUUID = mysqli_real_escape_string($connection, $_GET['answerUUID']);
    }

    $query = "SELECT id FROM answers WHERE `answer_uuid`='{$answerUUID}'";
    $result = mysqli_query($connection, $query);
    $rowAmount = mysqli_num_rows($result);

    if($rowAmount == 0) {
        header('location: ../');
        exit();
    }
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
            <p>Suas respostas foram enviadas! Obrigado por participar.</p>
            <p>Se você precisar, suas respostas foram registradas com esse codigo:<br><span
                    class="answerCode"><?php echo($answerUUID); ?></span></p>
            <a href="../" class="mainMenu"><i class="fa fa-home" aria-hidden="true"></i> Voltar ao menu principal</a>
        </div>
    </div>

    <div class="footer">
        Desenvolvido por Gustavo Antonio<br>
        <a href="https://www.instagram.com/ogustavo.a/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
        <a href="https://twitter.com/ogustavo_a"><i class="fa fa-twitter" aria-hidden="true"></i></a>
        <a href="https://github.com/SrPattif"><i class="fa fa-github" aria-hidden="true"></i></a>
    </div>
</body>

</html>