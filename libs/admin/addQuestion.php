<?php
    include('../../libs/databaseConnection.php');

    if(!isset($_POST['surveyID']) || !isset($_POST['answerName'])) {
?>
    <p>Nem todos os parâmetros foram informados.</p>
<?php
        exit();
    }

    $surveyID = $_POST['surveyID'];
    $answerName = $_POST['answerName'];

    $externalReference = uniqid();

    $insert = "INSERT INTO `questions` (`survey_id`, `external_reference`, `description`) VALUES ({$surveyID}, '{$externalReference}', '{$answerName}');";
    $insertQuery = mysqli_query($connection, $insert);

    if ($insertQuery) {
        $query = "SELECT id FROM questions WHERE external_reference='{$externalReference}';";
        $queryResult = mysqli_query($connection, $query);
        $queryQuestionsArray = array();
        while ($rowQuestion = mysqli_fetch_array($queryResult)) {
            $queryQuestionsArray[] = $rowQuestion;
        }

        $questionID = 0;
        foreach($queryQuestionsArray as $key => $rowQuestion) {
            $questionID = $rowQuestion['id'];
        }

        $insert2 = "INSERT INTO `answer_options` (`question_id`, `option`) VALUES ({$questionID}, 'Me identifico muito'), ({$questionID}, 'Me identifico'), ({$questionID}, 'Geralmente me identifico'), ({$questionID}, 'Não me identifico'), ({$questionID}, 'Definitivamente não me identifico');";
        $insert2Query = mysqli_query($connection, $insert2);

        if($insert2Query) {
            header('location: ../../admin/');
            exit();
        } else {
            header('location: ../../erro/');
	        exit();
        }

    } else {
	    header('location: ../../erro/');
	    exit();
    }
?>

