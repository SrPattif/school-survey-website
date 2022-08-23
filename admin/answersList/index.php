<?php
    include('../../libs/databaseConnection.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trabalho de OT - Painel do Administrador - Lista de Respostas</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Bibliotecas Externas -->
    <script src="https://use.fontawesome.com/8aae9daeac.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>

    <!-- Estilos -->
    <link rel="stylesheet" href="./index.css" />
</head>

<body>
    <?php
        $selectQuery = "SELECT * FROM surveys";

        $queryResult = mysqli_query($connection, $selectQuery);
        $queryQuestionsArray = array();
        while ($rowQuestion = mysqli_fetch_array($queryResult)) {
            $queryQuestionsArray[] = $rowQuestion;
        }

        foreach($queryQuestionsArray as $key => $rowQuestion) {
            $surveyTitle = $rowQuestion['title'];
            $surveyId = $rowQuestion['id'];
            
    ?>

    <div class="card mx-auto mt-5">
        <div class="card-header">
            <h3><?php echo($surveyTitle) ?></h3>
            <small><b>ID:</b> <?php echo($surveyId) ?></small>
        </div>
        <div class="card-body">
            <div class="accordion" id="accordion<?php echo($surveyId); ?>">

                <?php
                    $selectQuery2 = "SELECT * FROM questions WHERE survey_id={$surveyId}";

                    $queryResult2 = mysqli_query($connection, $selectQuery2);
                    $queryQuestionsArray2 = array();
                    while ($rowQuestion2 = mysqli_fetch_array($queryResult2)) {
                        $queryQuestionsArray2[] = $rowQuestion2;
                    }

                    $index = 0;
            
                    foreach($queryQuestionsArray2 as $key2 => $rowQuestion2) {
                        $index++;
                        $question_id = $rowQuestion2['id'];
                        $question_option = $rowQuestion2['description'];

                        ?>

                <div class="card">
                    <div class="card-header" id="heading<?php echo($index); ?>">
                        <h5 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse"
                                data-target="#collapse<?php echo($index); ?>" aria-expanded="true"
                                aria-controls="collapse<?php echo($index); ?>">
                                ID: <small><?php echo($question_id); ?></small> <?php echo($question_option); ?>
                            </button>
                        </h5>
                    </div>

                    <div id="collapse<?php echo($index); ?>" class="collapse"
                        aria-labelledby="heading<?php echo($index); ?>"
                        data-parent="#accordion<?php echo($surveyId); ?>">
                        <div class="card-body">

                            <!--- RESPOSTAS -->


                            <?php
                                $selectAnswers = "SELECT * FROM answers WHERE question_id={$question_id}";

                                $answersResult = mysqli_query($connection, $selectAnswers);
                                $answersArray = array();
                                while ($rowAnswers = mysqli_fetch_array($answersResult)) {
                                    $answersArray[] = $rowAnswers;
                                }

                                $answers_amount = sizeof($answersArray);
                                $answers_options_amount = [];

                                foreach($answersArray as $key3 => $rowAnswers) {
                                    $answer_value = $rowAnswers['answer'];
                                    $amount = 0;
                                    if(isset($answers_options_amount[$answer_value])) {
                                        $amount = $answers_options_amount[$answer_value];
                                    }
                                    $answers_options_amount[$answer_value] = $amount + 1;
                                }
                            ?>
                            <h3><?php echo($answers_amount); ?> respostas</h3>
                            
                            <?php
                                foreach ($answers_options_amount as $key => $value) {
                            ?>
                            <br><span class="badge badge-secondary"> <?php echo($value); ?></span><?php echo($key); ?>
                            <?php
                                }
                            ?>
                            <!--- RESPOSTAS -->

                        </div>
                    </div>
                </div>

                <?php
                    }
                ?>

            </div>
        </div>
    </div>

    <?php
        }
    ?>


    <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
</body>

</html>