<?php
    include('./databaseConnection.php');

    if(empty($_POST['feedback_status'])) {
	    header('location: ../erro/');
	    exit();
    }

    $name = "";
    $feedbackStatus = $_POST['feedback_status'];
    $feedbackDescription = "";
    if(isset($_POST['feedback_description'])) {
        $feedbackDescription = $_POST['feedback_description'];
    }
    if(isset($_POST['name'])) {
        $name = $_POST['name'];
    }

    $insert = "INSERT INTO feedbacks (`name`, `feedback_status`, `feedback_description`) VALUES ('{$name}', {$feedbackStatus}, '{$feedbackDescription}');";
    $insertQuery = mysqli_query($connection, $insert);

    if ($insertQuery) {
        header('location: ../feedbackSent/');
	    exit();

    } else {
        //header('location: ../erro/');
	    exit();
    }
    
?>