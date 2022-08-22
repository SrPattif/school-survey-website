<?php
    session_start();
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

                <form method="POST" action="../libs/submitAnswer.php?surveyID=<?php echo($surveyID); ?>">

                <?php
                $selectQuery = "SELECT * FROM questions WHERE survey_id='{$surveyID}'";

                $queryResult = mysqli_query($connection, $selectQuery);
                $queryQuestionsArray = array();
                while ($rowQuestion = mysqli_fetch_array($queryResult)) {
                    $queryQuestionsArray[] = $rowQuestion;
                }

                $questionCount = 0;
                foreach($queryQuestionsArray as $key => $rowQuestion) {
                    $questionCount++;
                    $questionId = $rowQuestion['id'];
            ?>

                <div class="question">
                    <div class="title">
                        <span><?php echo($rowQuestion['description']); ?></span>
                    </div>
                    <div class="custom-select">
                    <hr>
                        <?php
                $selectAnswersQuery = "SELECT * FROM answer_options WHERE question_id='{$questionId}'";

                $queryAnswersResult = mysqli_query($connection, $selectAnswersQuery);
                $queryAnswersArray = array();
                while ($rowAnswer = mysqli_fetch_array($queryAnswersResult)) {
                    $queryAnswersArray[] = $rowAnswer;
                }

                $answerId = 0;

                foreach($queryAnswersArray as $key => $rowAnswer) {
                    $answerId++;
            ?>
                        <div class="custom-option" id="<?php echo($questionCount . ',' . $answerId); ?>"
                            onclick="answerClick('<?php echo($questionCount . ',' . $answerId); ?>');">
                            <span><?php echo($rowAnswer['option']); ?></span></div>
                        <hr>
                        <?php
                }
            ?>
                        <input type="hidden" name="<?php echo($questionId); ?>" id="<?php echo($questionCount); ?>">
                    </div>
                </div>

                <?php
                }
            ?>
                <p class="center">Confira se todas as perguntas foram respondidas e envie suas respostas! :-)</p>
                <div class="btnEnviar">
                    <div class="btnText" id="survey-send">
                        <button type="submit"><i class="fa fa-paper-plane icon" aria-hidden="true"></i> Enviar
                            Respostas</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="footer">
            Desenvolvido por Gustavo Antonio<br>
            <a href="https://www.instagram.com/ogustavo.a/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a href="https://twitter.com/srpattif_dev"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            <a href="https://github.com/SrPattif"><i class="fa fa-github" aria-hidden="true"></i></a>
        </div>
    </body>
</body>

<script>
function answerClick(id) { // <questionid>,<answerid>
    var questionId = id.toString().split(',')[0];
    var answerId = id.toString().split(',')[1];

    var answerText = document.getElementById(id).innerHTML;
    document.getElementById(questionId).value = answerText.replace('<span>', '').replace('</span>', '');

    for (let i = 0; i < 10; i++) {
        let questI = document.getElementById(questionId + ',' + i);
        if (questI) {
            questI.classList.remove('selected');

            if (i == answerId) {
                questI.classList.add('selected');
            }
        }
    }
}
</script>

</html>