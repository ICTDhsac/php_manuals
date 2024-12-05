<?php
    var_dump($_POST);
    session_start();
    require('connection.php');
    
    // insert data to database
    if(isset($_POST['action']) && $_POST['action'] == "add") {
        $query = "INSERT INTO `users`(`firstName`, `lastName`)
                VALUES ('{$_POST['firstName']}','{$_POST['lastName']}')";
        run_mysql_query($query);

        $_SESSION['firstName'] = $_POST['firstName'];
        $_SESSION['lastName'] = $_POST['lastName'];
        header("location: result.php" );

    // delete data by id on database
    } else if(isset($_POST['action']) && $_POST['action'] == "x") {
        $query = "DELETE FROM `users`
                WHERE `id` = '{$_POST['user_id']}' ";
        run_mysql_edit_delete($query);        
        header("location: index.php");

    //  edit data by id on database
    } else if(isset($_POST['action']) && $_POST['action'] == "edit") {
        $query = "UPDATE `users` 
                SET firstName = '{$_POST['firstName']}', lastName = '{$_POST['lastName']}'
                WHERE id = '{$_POST['id']}' ";
        run_mysql_edit_delete($query);
        header("location: index.php");

    } else {
        session_destroy();
        header("location: index.php");

    }
?>
