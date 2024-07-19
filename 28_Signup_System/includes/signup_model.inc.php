<?php
# файл для взаємодії з БД, написання queries

# ввімкнули декларування типів
declare(strict_types=1);

# перевіримо ви є вже в БД дане $username
# передавши object $pdo ми отримали доступ до роботи з DB
function get_user_name(object $pdo, string $username) {
    $query = "SELECT username from users WHERE username = :username;";
    
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();
    
    
    # fetch візьме перший результат і поверне його
    # вказуємо що дані будуть в асоціативному масиві
    $result=$stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_email(object $pdo, string $email) {
    $query = "SELECT email from users WHERE email = :email;";
    
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();
        
    $result=$stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function set_user(object $pdo, string $username, string $pwd, string $email) {
    $query = "INSERT INTO users (username, pwd, email) VALUES (:username, :pwd, :email);";
    
    $stmt = $pdo->prepare($query);

    # хешування паролю
    # додаткоий захист при хешуванні паролю
    $options = [
        "cost"=>12
    ];
    $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, $options);
    
    $stmt->bindParam(":username", $username);
    
    # в БД потрібен хешований пароль
    $stmt->bindParam(":pwd", $hashedPwd);
    $stmt->bindParam(":email", $email);
    $stmt->execute();
        
    $result=$stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

