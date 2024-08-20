<?php
try {

    $db_server = 'localhost';
    $user = 'root';
    $database = 'jstophp';
    $password = '';

    $conn = mysqli_connect($db_server, $user, $password, $database);
} catch (mysqli_sql_exception) {
    echo "Couldn't Connect";
}
