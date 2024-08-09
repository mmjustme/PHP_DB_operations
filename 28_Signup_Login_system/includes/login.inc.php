<?php
declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

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

        if(is_username_wrong($results)){
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
        
        # опціональний метод, перестворення id сесії з використанням id юзера
        $newSessionId = session_create_id();
        $sessionId =  $newSessionId . "_" . $result["id"];
        session_id($sessionId);
        # також слід врахувати що кожні 30 хв буде 
        # перестворюватися сесія згідно config_session, тому там теж додамо даний метод 

        # Login user
        # додаємо юзера в сесію і оск будемо виводити user_username викор htmlspecialchars
        $_SESSION["user_id"] = $result["id"];
        $_SESSION["user_username"] = htmlspecialchars($result["username"]);
        
        # Оновлюємо сесію оск юзер залогінився
        # і оск  $_SESSION["user_id"] вже буде існувати запуститься 
        # regenerate_session_id_loggedin з config_session файлу
        $_SESSION["last_regeneration"] = time();
        
        # Повертаємося на головну з повідомленням login=success і звільняємо ресурси
        header("Location: ../index.php?login=success");
        $pdo=null;
        $stmt=null;

        die();
    } catch (PDOException $e) {
        die("Qeury failed: " . $e->getMessage());
    }
} else {
    header("Location ../index.php");
    die();
}