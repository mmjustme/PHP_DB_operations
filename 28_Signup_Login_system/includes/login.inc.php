<?php

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];

    try {
        require_once "dbh.inc.php";
        require_once "models/login_model.inc.php";
        require_once "controllers/login_contr.inc.php";

        $errors = [];

        if(is_input_empty($username, $pwd)){
            $errors["empty_input"] = "Fill in all inputs!";
        }
        # функція з login_model
        $result = get_user($pdo, $username);

        if(is_username_wrong($results["username"])){
            $errors["login_incorect"] = "Incorrect login info!";
        }
        if(!is_username_wrong($result) && is_password_wrong($pwd, $result["pwd"])){
            $errors["login_incorect"] = "Incorrect login info!";
        }

        require_once "config_session.inc.php";

        if($errors){
            $_SESSION["errors_login"]= $errors;

            header("Location: ../index.php");
            die();
        }
    } catch (PDOException $e) {
        die("Qeury failed: " . $e->getMessage());
    }
} else {
    header("Location ../index.php");
    die();
}