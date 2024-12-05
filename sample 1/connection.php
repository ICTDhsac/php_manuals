<?php

    define("DB_HOST", 'localhost');
    define("DB_USER", 'root');
    define("DB_PASSWORD", '');
    define("DB_DATABASE", 'mydb');

    $connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

    if($connection->connect_errno) {
        die ("Failed to connect to MySQL ({$connection->connect_errno}) $connection->connect_error");
    }
    // else {
    //     echo "Connected Successfully";
    // }

    function fetch_all($query) {
        $data = array();
        global $connection;
        $result = $connection->query($query);
        while($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    function fetch_record($query) {
        global $connection;
        $result = $connection->query($query);
        return mysqli_fetch_assoc($result);
    }

    function run_mysql_query($query) {
        global $connection;
        $result = $connection->query($query);
        return $result->insert_id;
    }

    function run_mysql_edit_delete($query) {
        global $connection;
        $result = $connection->query($query);
        return $result->affected_rows;
    }
?>