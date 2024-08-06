<?php

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];

    try {
        require_once "dbh.inc.php";
        require_once "models/login_model.inc.php";
        require_once "controllers/login_contr.inc.php";


    } catch (PDOException $e) {
        die("Qeury failed: " . $e->getMessage());
    }
} else {
    header("Location ../index.php");
    die();
}