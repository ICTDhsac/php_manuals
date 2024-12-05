<?php
    require('connection.php');
    
    // $update_query = run_mysql('UPDATE `users` SET `first_name` = "mark neo" WHERE id = 5');
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>New Connection</title>
        <script src="functions.js"></script>
    </head>
    <body>
        <h1>List of Users</h1>
        <input type="text" name="search" id="search" value="oli">
        <table id="user_table">
            <thead>
                <tr>
                    <th>ID#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                <?php
                    $users = fetch_all('SELECT * from `users`');
                ?>
                const tableBody = document.querySelector('#user_table tbody');
                let row_html = '';

                <?php foreach($users as $user){ ?>

                    row_html += `
                        <tr>
                            <td><?= $user['id'] ?></td>        
                            <td><?= $user['first_name'] ?></td>        
                            <td><?= $user['last_name'] ?></td>        
                        </tr>
                    `;
                <?php } ?>

                tableBody.innerHTML = row_html;
                

                
            });
        </script>
    </body>
</html>
