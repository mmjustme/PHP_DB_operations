<?php

declare(strict_types=1);

# для звернення в БД необхідно PDO його можна підключити окерето
# або перенести через функцію з signup_contr а туди з signup.inc.php
# де файл вже був підключений
function get_username(object $pdo, string $username)
{
    $query = "SELECT username FROM users where username=:username;";

    $stmt=$pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    # оскільки потрібне лише ім'я тут fetch який візьме лише перший результат
    # наприклад fetchAll візьме усі дані
    $username = $stmt->fetch(PDO::FETCH_ASSOC);
    
    # повертаємо ім'я у вигляді ассоціат. масиву
    # якщо ж дані відсутні буде пустий маасив що = false
    return $username;
}

function get_email(object $pdo, string $email)
{
    $query = "SELECT username FROM users where email=:email;";

    $stmt=$pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    # оскільки потрібне лише ім'я тут fetch який візьме лише перший результат
    # наприклад fetchAll візьме усі дані
    $email = $stmt->fetch(PDO::FETCH_ASSOC);
    
    # повертаємо ім'я у вигляді ассоціат. масиву
    # якщо ж дані відсутні буде пустий маасив що = false
    return $email;
}
