<?php

# перевіряємо чи юзер скористався формою

if($_SERVER["REQUEST_METHOD"] === "POST"){
    # відхоплюємо дані з форми
    $username = $_POST["username"];
    $pwd = $_POST["pws"];
    $email = $_POST["email"];

    try {
        require_once "dbh.inc.php";

        

    } catch (PDOExeption $e) {
        die("Query failed: " .  $e->getMessage());
    }

} else {
    # розвертаємо юзера якщо він на цій сторінці не через форму
    header("Location: ../index.php");
    # також зупиняємо код 
    die();
}