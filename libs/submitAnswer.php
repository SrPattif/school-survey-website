<?php
    include('./databaseConnection.php');

    if(!isset($_GET['surveyID'])) {
	    header('location: ../erro/');
	    exit();
    }

    $surveyID = $_GET['surveyID'];

    $insert = "INSERT INTO answers (`answer_uuid`, `question_id`, `answer`) VALUES ";

    $answerUUID = uniqid();

    $am = 0;
    foreach ($_POST as $questionId => $questionAnswer) {
        $questionAnswer = trim($questionAnswer);
        $questionAnswer = mysqli_real_escape_string($connection, $questionAnswer);

        if($am > 0) $insert = $insert . ", ";
        $am++;
        $insert = $insert . "('{$answerUUID}', {$questionId}, '{$questionAnswer}')";
    }
    $insert = $insert . ";";

    $insertQuery = mysqli_query($connection, $insert);

    if ($insertQuery) {
	    header('location: ../surveySent/?answerUUID=' . $answerUUID);
	    exit();

    } else {
	    header('location: ../erro/');
	    exit();
    }
    
?>