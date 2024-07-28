<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];

    try {
        # додаємо окрім БД "MVC" патерн, тобто signup_model, signup_contr
        # розділяємо на окремі файли функції для БД, обробка форм, вивід інфо юзеру 
        # порядок важливий models одразу після БД, view, тоді contr
        # тут view зараз не потрібні
        require_once "dbh.inc.php";
        require_once "models/signup_model.inc.php";
        require_once "controllers/signup_contr.inc.php";

        # ERROR HANDLERS
        # даний масив буде наповнюватися в залежності від помилки
        $errors = [];

        # функції перевірки на помилки в signup_contr
        if (is_input_empty($username, $pwd, $email)) {
            # наповнюємо $errors = []; помилками як асоц. масив
            $errors["empty_input"] = "Fill in all inputs!";
        }
        if (is_email_invalid($email)) {
            $errors["invalid_email"] = "Invalid Email!";
        }
        if (is_username_taken($pdo, $username)) {
            $errors["username_taken"] = "Username already taken!";
        }
        if (is_email_taken($pdo, $username)) {
            $errors["email_taken"] = "Email already taken!";
        }


        # запускаємо ссесію через даний файл 
        require_once "config_session.inc.php";

        # на даному етапі наш масив $errors або з данними(з помилками) 
        # і це = true, або пустий (тобто без помилок) і це = false
        if ($errors) {
            # для відображання помилок юзеру передаємо помилки в змінну errors_signup  
            # зберігючи в сесії і повертаємо юзера на головну сторінку завершуючи die()
            $_SESSION["errors_signup"] = $errors;
            header("Location: ../index.php");
            die();
        }
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../index.php");
    die();
}
