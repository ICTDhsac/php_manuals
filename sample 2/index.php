<?php
    require('connection.php');
    session_start();

    $query = "SELECT * FROM users";
    $users = fetch_all($query);

    $user1 = run_mysql_edit_delete('UPDATE users SET username = "NEO" WHERE id = 3');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Exam</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script src="main.js"></script>
    </head>
    <body>
        <main>

<?php
    if(isset($_SESSION['message'])) { ?>
            <p id="message"> <?= $_SESSION['message']; ?></p>
<?php
        unset($_SESSION['message']);
}   ?>      <section>
                <h1>Registration Form</h1>
                <form action="process.php" method="post">
                    <label for="username">
                        <i>Username:</i>
                        <input type="text" name="username">
                    </label>
                    <label for="password">
                        <i>Password: </i>
                        <input type="password" name="password">
                    </label>
                    <input type="hidden" name="action" value="register">
                    <input type="submit" value="Register">
                </form>
            </section>
            <section>
                <h1>Login Form</h1>
                <form action="process.php" method="post">
                    <label for="username">
                        <i>Username:</i>
                        <input type="text" name="username">
                    </label>
                    <label for="password">
                        <i>Password: </i>
                        <input type="password" name="password">
                    </label>
                        <input type="hidden" name="action" value="login">
                    <input type="submit" value="Login">
                </form>
            </section>
        </main>
        <div>
            <h2>List of Users</h2>
                <ul>
<?php   foreach($users as $user)    {   ?>
                    <li><?= $user['username'] ?></li>
<?php   }   ?>  </ul>
        </div>
    </body>
</html>
