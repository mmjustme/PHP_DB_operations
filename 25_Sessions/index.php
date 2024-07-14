<?php
    # старт сесшї
    # створює PHPSESSID в браузері в кукі
    session_start();
    # дана змінна буде сторена і запамятається браузером на усіх сторінках
    $_SESSION["username"] = "Dmkur";

    // # видалить в сесї конкретну змінну
    // unset($_SESSION["username"]);

    // # видалить усі дані сесії одразу
    // session_unset();

    # завершує сесії, проте змінна буде доступна 
    # ефект буде при переході на іншу сторінку
    # тому додатково вводимо session_unset();
    session_unset();
    session_destroy();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style4.css">
    <title>Document</title>
</head>
<body>
    <h1>Sessions</h1>     

    <?php
    // дана змінна буде відображатися на сторінці
    // проте основна суть, що на example.php теж, навіть без оголошення
    // на тій сторінці, сесія в браузері памятає змінну через різні сторінки
    echo $_SESSION["username"]

    ?>

</body>
</html>