<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];

    try {
        require_once "dbh.inc.php";
        require_once "login_model.inc.php";
        require_once "login_contr.inc.php";

        # Error handlers
        $errors = [];
        # використовуємо ф-ї з contr файлу
        if (is_input_empty($username, $pwd)) {
            $errors["empty_input"] = "Fill in all fields!";
        }

        $result = get_user($pdo, $username);

        if (is_username_wrong($result)) {
            $errors["login_incorrect"] = "Incorrect login info!";
        }

        if (!is_username_wrong($result) && is_pwd_wrong($pwd, $result["pwd"])) {
            $errors["login_incorrect"] = "Incorrect login info!";
        }

        require_once "config_session.inc.php";

        if ($errors) {
            $_SESSION["errors_signup"] = $errors;
            header("Location: ../index.php");
            die();
        }

        # інтегруємо id юзера в session id щоб потім його використовувати
        # це лише для інфо
        $newSessionId = session_create_id();
        # поєднуємо через "_" новий id сесії з id юзера
        $sessionId =  $newSessionId . "_" . $result["id"];
        # оновулюємо session_id на той що ми вище вказали
        session_id($sessionId);
        # потрібно оновити config оск кожні 30хв ми скидаємо id 
        # і в оновленому id вже не буде логіки вище (тобто без user id)

        

    } catch (PDOExeption $e) {
        die("Query failed: " .  $e->getMessage());
    }
} else {
    header("Location: ../index.php");
    die();
}
