<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];

    try {
        require_once "../includes/dbh.inc.php";
        require_once "../includes/models/signup_model.inc.php";
        require_once "../includes/controlers/signup_contr.inc.php";

        $errors = [];
        if (is_input_empty($username,  $pwd,  $pwd)) {
            $errors["empty_input"] = "Fill in all fields";
        };
        if (is_email_invalid($email)) {
            $errors["invalid_email"] = "Invalid email";
        }
        if (is_username_takens($pdo,  $username)) {
            $errors["username_taken"] = "Username already taken!";
        }
        if (is_email_taken($pdo, $email)) {
            $errors["email_taken"] = "Email already taken!";
        }

        require_once "../includes/config_session.inc.php";

        if ($errors) {
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
