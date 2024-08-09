<?php

declare(strict_types=1);

# виводить дані введені в форму замість юзера
function signup_inputs()
{
    # перевіряємо чи в сесії є signup_data і там є username
    # та чи відсутня помилка username_taken тоді виведемо дані
    if (
        isset($_SESSION["signup_data"]["username"]) &&
        !isset($_SESSION["errors_signup"]["username_taken"]) &&
        !isset($_GET["signup"])
    ) {
        # додаємо value зі значенням яке вводив юзер
        echo '<input type="text" name="username" placeholder="Username" 
            value="' . $_SESSION["signup_data"]["username"] . '">';
    } else {
        # в іншому випадку виводимо базовий інпут
        echo '<input type="text" name="username" placeholder="Username">';
    }

    # дане поле без змін, пароль вводимо в люому випадку знову
    echo '<input type="password" name="pwd" placeholder="Password">';

    # аналогічні дії з Email
    if (
        isset($_SESSION["signup_data"]["email"]) &&
        !isset($_SESSION["errors_signup"]["invalid_email"]) &&
        !isset($_SESSION["errors_signup"]["email_taken"]) &&
        !isset($_GET["signup"])
    ) {
        # додаємо value зі значенням яке вводив юзер
        echo '<input type="text" name="email" placeholder="Email" 
            value="' . $_SESSION["signup_data"]["email"] . '">';
    } else {
        # в іншому випадку виводимо базовий інпут
        echo '<input type="text" name="email" placeholder="Email">';
    }
}

function check_signup_errors()
{
    # в signup.inc.php усі помилки будть в сесії в errors_signup
    # перевіримо чи вони є і виведемо їх
    if (isset($_SESSION["errors_signup"])) {
        # копіюємо дані щоб очистити їх в сессії (для безпеки) 
        $erorrs = $_SESSION["errors_signup"];

        # відображаємо помилки юзеру
        echo "<br>";
        foreach ($erorrs as $erorr) {
            echo "<p class='form-error'>" . $erorr . "</p>";
        }

        # очищаємо сесію
        unset($_SESSION["errors_signup"]);
    } else if (isset($_GET["signup"]) && $_GET["signup"] === "success") {
        # при успішному ств юзера ми вставили параметр "?signup=success"
        # відхоплюємо signup, перевіряємо чи = success і виводимо повідомлення
        echo "<br>";
        echo "<p class='form-success'>Signup success!</p>";
    }
}
