<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>
<body>
    <h1>Edit User</h1>
    <form action="process.php" method="POST">
        <label for="firstName">First Name: 
            <input type="text" name="firstName" value="<?= $_POST['firstName'] ?>">
        </label>
        <label for="lastName">Last Name: 
            <input type="text" name="lastName" value="<?= $_POST['lastName'] ?>">
        </label>
        <input type="hidden" name="id" value="<?= $_POST['id'] ?>">
        <input type="hidden" name="action" value="edit">
        <input type="submit" value="UPDATE">
    </form>
</body>
</html>