<?php
# файл для використання данних юзера

# ввімкнули декларування типів
declare(strict_types=1);


# перевірка на пусті поля
function is_input_empty(string $username, string $pwd, string $email) {
    if(empty($username) || empty($pwd) ||empty($email)){
        return true;
    } else {
        return false;
    }
};

# перевірка на неправильний email
function is_email_invalid(string $email) {
    # вбудована ф-я фільтру, з параметром перевірки email
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        return true;
    } else {
        return false;
    }
};


# перевірка чи вже даний username використовуєтсья
# pdo ми передаємо з signup.inc.php
function is_user_name_taken(object $pdo, string $username) {    
    # щоб перевірити потрібно звернутисчя до БД
    # get_user_name - написаний в signup_model.inc.php
    if(get_user_name($pdo, $username)){
        return true;
    } else {
        return false;
    }
};


function is_email_registered(object $pdo, string $email) {
    if(get_email($pdo, $email)){
        return true;
    } else {
        return false;
    }
};


function create_user(object $pdo, string $username, string $pwd, string $email) {
   set_user($pdo, $username, $pwd, $email);
};