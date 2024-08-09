<?php
# підключаємо для сесії
require_once "includes/config_session.inc.php";
# підключаємо для показу помилок
require_once "includes/views/signup_view.inc.php";
require_once "includes/views/login_view.inc.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href="./css/global.css">
    <title>Signup</title>
</head>

<body>

    <h3>
        <?php
        output_username();
        ?>
    </h3>

    <!-- зверни увагу на php сигнтаксис, де if в <? php ?> далі форма і закриваюча дужка з if в <? php ?> -->
    <!-- умова додана щоб відображати логінація лише коли ми НЕ залогінені -->
    <?php if (!isset($_SESSION["user_id"])) { ?>
        <h3>Login</h3>
        <form action="./includes/login.inc.php" method="post">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="pwd" placeholder="Password">
            <button>Login</button>
        </form>

    <?php } ?>

    <h3>Login</h3>
    <form action="./includes/login.inc.php" method="post">
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="pwd" placeholder="Password">
        <button>Login</button>
    </form>

    <?php
    check_login_errors();
    ?>

    <h3>Signup</h3>
    <form action="includes/signup.inc.php" method="post">
        <?php
        signup_inputs()
        ?>
        <button>Signup</button>
    </form>

    <?php
    check_signup_errors();
    ?>

    <h3>Logout</h3>
    <form action="./includes/logout.inc.php" method="post">
        <button>Logout</button>
    </form>

</body>

</html>