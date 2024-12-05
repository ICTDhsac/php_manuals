<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result Page</title>
</head>
<body>
    <h1>First Name: <?= $_SESSION['firstName']; ?></h1>
    <h1>Last Name: <?=  $_SESSION['lastName']; ?></h1>
    <a href="./index.php">Back</a>
</body>
</html>