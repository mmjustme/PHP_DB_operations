<?php
# підключаємо для сесії
require_once "includes/config_session.inc.php";
# підключаємо для показу помилок
require_once "includes/views/signup_view.inc.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href="css/style2.css">
    <title>Signup</title>
</head>

<body>

    <h3>Login</h3>
    <form action="" method="post">
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="pwd" placeholder="Password">
        <button>Login</button>
    </form>

    <h3>Signup</h3>
    <form action="includes/signup.inc.php" method="post">
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="pwd" placeholder="Password">
        <input type="text" name="email" placeholder="Email">
        <button>Signup</button>
    </form>

    <?php
    check_signup_errors();
    ?>

</body>

</html>