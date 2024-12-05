<?php

    require('connection.php');
    session_start();

    if(isset($_POST['action']) && $_POST['action'] == 'register') {
        echo "register <br>";
        var_dump($_POST);

        $username = escape_this_string($_POST['username']);
        $password = escape_this_string($_POST['password']);

        $query = "INSERT INTO users (username, password) VALUES ('{$username}','{$password}') ";
        run_mysql_insert($query);

        $_SESSION['message'] = 'User: ' . $username .' registered successfully!';

        header('location: index.php');
    }
?>