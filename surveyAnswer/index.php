<?php
    include("../libs/databaseConnection.php");

    $surveyID = 0;
    if(!isset($_GET['surveyID'])) {
        header('location: ../surveyDetails');
        exit();
    } else {
        $surveyID = $_GET['surveyID'];
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisa - Responder</title>

    <!-- Estilos -->
    <link rel="stylesheet" href="./index.css" />

    <!-- Bibliotecas Externas -->
    <script src="https://use.fontawesome.com/8aae9daeac.js"></script>
</head>

<body>

    <body>
        <div class="header">
            Pesquisa
        </div>

        <div class="page-content">
            <?php
                $selectQuery = "SELECT * FROM surveys WHERE id='{$surveyID}'";

                $queryResult = mysqli_query($connection, $selectQuery);
                $queryQuestionsArray = array();
                while ($rowQuestion = mysqli_fetch_array($queryResult)) {
                    $queryQuestionsArray[] = $rowQuestion;
                }

                foreach($queryQuestionsArray as $key => $rowQuestion) {
            ?>
            <div class="survey-greetings">
                <div class="title"><?php echo($rowQuestion['title']); ?></div>
                <div class="description"><?php echo($rowQuestion['description']); ?></div>
            </div>
            <?php
                }
            ?>

            <hr class="greet-hr">

            <?php
                $selectQuery = "SELECT * FROM questions WHERE survey_id='{$surveyID}'";

                $queryResult = mysqli_query($connection, $selectQuery);
                $queryQuestionsArray = array();
                while ($rowQuestion = mysqli_fetch_array($queryResult)) {
                    $queryQuestionsArray[] = $rowQuestion;
                }

                foreach($queryQuestionsArray as $key => $rowQuestion) {
                    $questionId = $rowQuestion['id'];
            ?>

            <div class="question">
                <div class="title">
                    <span><?php echo($rowQuestion['description']); ?></span>
                </div>
                <div class="custom-select">

            <?php
                $selectAnswersQuery = "SELECT * FROM answer_options WHERE question_id='{$questionId}'";

                $queryAnswersResult = mysqli_query($connection, $selectAnswersQuery);
                $queryAnswersArray = array();
                while ($rowAnswer = mysqli_fetch_array($queryAnswersResult)) {
                    $queryAnswersArray[] = $rowAnswer;
                }

                foreach($queryAnswersArray as $key => $rowAnswer) {
            ?>
                <div class="custom-option"><span><?php echo($rowAnswer['option']); ?></span></div>
                    <hr>
            <?php
                }
            ?>
                </div>
            </div>

            <?php
                }
            ?>
        </div>

        <div class="footer">
            Desenvolvido por Gustavo Antonio<br>
            <a href="https://www.instagram.com/ogustavo.a/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a href="https://twitter.com/ogustavo_a"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            <a href="https://github.com/SrPattif"><i class="fa fa-github" aria-hidden="true"></i></a>
        </div>
    </body>
</body>

</html>