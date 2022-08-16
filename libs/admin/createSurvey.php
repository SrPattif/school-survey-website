<?php
    include('../../libs/databaseConnection.php');

    if(!isset($_POST['surveyTitle']) || !isset($_POST['surveyTitleVisible']) || !isset($_POST['surveyDescription'])) {
?>
    <p>Nem todos os parâmetros foram informados.</p>
<?php
        exit();
    }

    $surveyTitle = $_POST['surveyTitle'];
    $surveyTitleVisible = $_POST['surveyTitleVisible'];
    $surveyDescription = $_POST['surveyDescription'];

    $insert = "INSERT INTO `surveys` (`title`, `title_visible`, `description`) VALUES ('{$surveyTitle}', {$surveyTitleVisible}, '{$surveyDescription}');";
    $insertQuery = mysqli_query($connection, $insert);

    if ($insertQuery) {
	    header('location: ../../admin/');
	    exit();

    } else {
	    header('location: ../../erro/');
	    exit();
    }
?>

