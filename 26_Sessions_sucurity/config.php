<?php
# дані налаштування запобігають різним вразливостям сесії 
# і будуть створенгі до початку сесії
ini_set("session.use_only_cookies", 1);
ini_set("session.use_strict_mode", 1);

# змінна створить певні налаштування при створенні сесії
session_set_cookie_params([
    # час який наші дані будуть актуальні 30хв в сек
    "lifetime" => 1800,
    # стосуються кокретного домену, в нас це localhost
    "domain" => "localhost",
    # озн і усі інші сторінки після localhost
    "path" => "/",
    # тільки безпечні сайти https (not http)
    "secure" => true,
    # заборонить любі скрипти зі сторони клієнта
    "httponly" => true,
]);

# старт сесії генерує перне значення
session_start();
# ми візьмемо його і перегенеруємо на бульш безпечну версію
# також важливо перегенеровувати це час від часу 
# тому далі для цього буде певний блок коду 
// session_regenerate_id(true);

# перша перевірка чи є дана змінна last_regeneration через isset
# якщо ні, отже це перша сесія, і ми попадаємо в перший if
# де ми регенеруємо session_regenerate_id і створюємо нашу змінну last_regeneration

# надалі ми вже попадемо в else блок оск last_regeneration вже створена

if(!isset($_SESSION["last_regeneration"])) {
    session_regenerate_id(true);
    // змінна буде = теперешньому часу, 
    // це дасть зрозуміти який період вже існує last_regeneration
    $_SESSION["last_regeneration"] = time();
} else {
    // час через який ми перегенеруємо id
    $interval = 60 * 30; // 60 сек * 30 = 30хв

    // теперешній час - час створення last_regeneration 
    // напр. 22:42-22:00=42хв, 42хв >= 30хв отже перегенеруємо session_regenerate_id
    // і знову задамао теперешній час
    if(time() - $_SESSION["last_regeneration"] >= $interval){
        session_regenerate_id(true);
        $_SESSION["last_regeneration"] = time();
    }
}


