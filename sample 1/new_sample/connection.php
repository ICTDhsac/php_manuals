<?php

    define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_PASSWORD", "");
    define("DB_DATABASE", "mydb");

    $connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

    if ($connection->connect_error) {
        echo $connection->connect_error;
    }
    else{
        echo "Connected Successfully";
    }

    function fetch_all($query){
        $data = [];
        global $connection;
        $result = $connection->query($query);
        while($row = mysqli_fetch_assoc($result)){
            $data[] = $row;
        }
        return $data;
    }

    function fetch_record($query){
        global $connection;
        $result = $connection->query($query);
        return mysqli_fetch_assoc($result);
    }

    function insert($query){
        global $connection;
        $result = $connection->query($query);
        var_dump($result);

    }

    function run_mysql($query){
        global $connection;
        $result = $connection->query($query);
        echo("Affected rows: " . $connection->affected_rows);
        return $result;

    }

?>