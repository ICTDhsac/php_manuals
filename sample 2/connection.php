<?php
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    define('DB_DATABASE', 'sampledb');

    $connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

    if($connection->connect_errno) {
        die('Connection error (' . $connection->connect_errno . ') <br />' . $connection->connect_error);
    }

    function run_mysql_insert($query) {
        global $connection;
        $result = $connection->query($query);
        return $result->insert_id;
    }

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

    function run_mysql_edit_delete($query) {
        global $connection;
        $connection->query($query);
        return $connection->affected_rows;
    }

    function escape_this_string($string) {
        global $connection;
        return $connection->real_escape_string($string);
    }

?>