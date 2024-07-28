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
        # функції перевірки на помилки в signup_contr
        if (is_input_empty($username, $pwd, $email)) {
        }
        if (is_email_invalid($email)) {
        }
        if (is_username_taken($pdo, $username)) {
        }
        if (is_email_taken($pdo, $username)) {
        }
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../index.php");
    die();
}
