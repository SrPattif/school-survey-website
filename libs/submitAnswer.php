<?php
    include('./databaseConnection.php');

    if(!isset($_GET['surveyID'])) {
	    header('location: ../erro/');
	    exit();
    }

    $surveyID = $_GET['surveyID'];

    $insert = "INSERT INTO answers (`answer_uuid`, `question_id`, `answer`, `submit_timestamp`) VALUES ";

    $answerUUID = "survey" . $surveyID . "-";
    $answerUUID .= uniqid();

    $timestamp = time();

    $am = 0;
    foreach ($_POST as $questionId => $questionAnswer) {
        $questionAnswer = trim($questionAnswer);
        $questionAnswer = mysqli_real_escape_string($connection, $questionAnswer);

        if($am > 0) $insert = $insert . ", ";
        $am++;
        $insert = $insert . "('{$answerUUID}', {$questionId}, '{$questionAnswer}', {$timestamp})";
    }
    $insert = $insert . ";";

    $insertQuery = mysqli_query($connection, $insert);

    if ($insertQuery) {
        if($surveyID != "16") {
            header('location: ../surveyAnswer/?surveyID=16');
            exit(); 
        }

	    header('location: ../surveySent/?answerUUID=' . $answerUUID);
	    exit();

    } else {
	    header('location: ../erro/');
	    exit();
    }
    
?>