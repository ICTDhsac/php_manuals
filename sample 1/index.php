<?php
    require('connection.php');
    $records = fetch_all("SELECT * FROM users");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <script src="main.js" ></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            document.querySelector("h1").style.color = "red";
            var element = document.querySelector("button");
            element.addEventListener("click", () => {
                var divs = document.querySelectorAll("div");
                divs.forEach((div) => {
                    div.style.background = "yellow";
                });
            });

        });

        function confirmDelete() {
            return confirm("Are you sure you want to delete this user?");
        }
    </script>
</head>
<body>
    <h1>This is my sample Website</h1>
    <h2><?php echo "Hello World!" ?></h2>

    <nav>
        <div>Nav 1</div>
        <div>Nav 2</div>
        <div>Nav 3</div>
        <div>Nav 4</div>
        <div>Nav 5</div>
        <div>Nav 6</div>
    </nav>
    <button>Click Me!</button>
    <form id="add" action="process.php" method="post">
        <label for="first_name">First Name</label>
        <input type="text" name="first_name" />
        <label for="last_name">Last Name</label>
        <input type="text" name="last_name" />
        <input type="hidden" name="action" value="add">
        <input type="submit" value="Send">
    </form>

    <h2>List of Users</h2>
    <?php foreach($records as $record) { ?>
        <div id="users">
            <p>User(<?= $record['id'] ?>): <?= "{$record['first_name']} {$record['last_name']}"; ?></p>
            <!--EDIT USER-->
            <form action="edit.php" method="POST">
                <input type="hidden" name="id" value="<?= $record['id']; ?>">
                <input type="hidden" name="first_name" value="<?= $record['first_name']; ?>">
                <input type="hidden" name="last_name" value="<?= $record['last_name']; ?>">
                <input type="submit" value="Edit">
            </form>
            <!--DELETE USER-->
            <form action="process.php" method="POST" onsubmit="return confirmDelete();">
                <input type="hidden" name="user_id" value="<?= $record['id']; ?>">
                <input type="hidden" name="action" value="x">
                <input class="delete" type="submit" value="x">
            </form>
        </div>
    <?php } ?>

</script>
</body>
</html>
