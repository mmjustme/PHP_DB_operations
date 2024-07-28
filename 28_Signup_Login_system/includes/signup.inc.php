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


    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../index.php");
    die();
}
