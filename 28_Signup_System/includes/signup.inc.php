<?php

# перевіряємо чи юзер скористався формою

if($_SERVER["REQUEST_METHOD"] === "POST"){
    # відхоплюємо дані з форми
    $username = $_POST["username"];
    $pwd = $_POST["pws"];
    $email = $_POST["email"];

    try {
        require_once "dbh.inc.php";
        # signup_model завжди до signup_contr
        require_once "signup_model.inc.php";
        require_once "signup_contr.inc.php";
    
        # Error handlers
        $errors = [];
        # використовуємо ф-ї з contr файлу
        if(is_input_empty($username, $pwd, $email)){
            $errors["empty_input"]="Fill in all fields!";
        }
        if(is_email_invalid($email)){
            $errors["invalie_email"]="Invalid email!";
        }
        if(is_user_name_taken($pdo, $username)){
            $errors["username_taken"]="Username already taken!";
        }
        if(is_email_registered($pdo,$email)){
            $errors["email_used"]="Email already registered!";
        }


        # запускаємо сесію з налаштуваннями
        require_once "config_session.inc.php";
        # пустий масив = false, не пустий тобто є помилки = true
        if($errors){
            # присвоюємо error_sinup наш масив з помилками і в кукі зберігаємо
            $_SESSION["errors_signup"] = $errors;
            header("Location: ../index.php");
            die();
        }


    } catch (PDOExeption $e) {
        die("Query failed: " .  $e->getMessage());
    }

} else {
    # розвертаємо юзера якщо він на цій сторінці не через форму
    header("Location: ../index.php");
    # також зупиняємо код 
    die();
}