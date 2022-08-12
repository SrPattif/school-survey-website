<?php
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASSWORD', '');
    define('DATABASE', 'surveys');

    $connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die ('Não foi possível conectar ao banco de dados.');
?>