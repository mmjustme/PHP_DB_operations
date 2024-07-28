<?php

declare(strict_types=1);

function is_input_empty(string $username, string $pwd, string $email,)
{
    if (empty($username) || empty($pwd) || empty($email)) {
        return true;
    } else {
        return false;
    }
}

function is_email_invalid(string $email)
{
    # filter_var ф-я в php що перевіряє валідність данних
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}


# для даної первірки потібно PDO передаємо аргументом функції з signup.inc.php 
function is_username_taken(object $pdo, string $username)
{
    # для даної первірки потібно звернутится в DB
    # запит буде в signup_models/inc.php
    if (get_username($pdo, $username)) {
        return true;
    } else {
        return false;
    }
}

function is_email_taken(object $pdo, string $email)
{
    if (get_email($pdo, $email)) {
        return true;
    } else {
        return false;
    }
}
