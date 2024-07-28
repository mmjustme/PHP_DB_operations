<?php
require_once "./includes/views/signup_view.inc.php";
require_once "./includes/config_session.inc.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Document</title>
</head>

<body>
    <h1>Signup</h1>
    <form action="./includes/signup.inc.php">
        <label for="Username">Username</label>
        <input type="text" name="username">

        <label for="Username">Password</label>
        <input type="text" name="pwd">

        <label for="Username">Email</label>
        <input type="text" name="email">
        <button>Signup</button>
    </form>

    <h1>Login</h1>
    <form action="./includes/login.inc.php">
        <label for="Username">Username</label>
        <input type="text" name="username">

        <label for="Username">Password</label>
        <input type="text" name="pwd">

        <label for="Username">Email</label>
        <input type="text" name="email">
        <button>Login</button>
    </form>

    <?php
    check_signup_errors();
    ?>
</body>

</html>