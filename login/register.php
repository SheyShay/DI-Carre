<?php
require_once('./functionSQL.php');

if(!empty($_POST)){
    $return = sqlAddLogin($_POST['login-pseudo'], $_POST['login-email'], $_POST['login-pwd']);
}

?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>DI² - Register</title>
    </head>

    <body>
        <form action="./register.php" method="POST">
            <div>
                <input type="text" name="login-pseudo" placeholder="Pseudo" required>
                <label for="login-pseudo">Pseudo</label>

                <input type="email" name="login-email" placeholder="Email" required>
                <label for="login-email">Email</label>

                <input type="password" name="login-pwd" placeholder="Password" required>
                <label for="login-pwd">Password</label>

                <input type="submit" value="Register">
            </div>
        </form>
    </body>
</html>