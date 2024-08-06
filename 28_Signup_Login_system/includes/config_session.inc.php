<?php

ini_set("session.use_only_cookies", 1);
ini_set("session.use_strict_mode", 1);

session_set_cookie_params([
    "lifetime" => 1800,
    "domain" => "localhost",
    "path" => "/",
    "secure" => true,
    "httponly" => true,
]);


session_start();

# опційний метод створення session_id з id юзера
# перевіряємо чи юзер залогінений
if(isset($_SESSION["user_id"])){
    if (!isset($_SESSION["last_regeneration"])) {
        regenerate_session_id_loggedin();
    } else {
        $interval = 60 * 30;
    
        if (time() - $_SESSION["last_regeneration"] >= $interval) {
            regenerate_session_id_loggedin();
        }
    }
}else {
    # блок якщо юзер не залогінений
    if (!isset($_SESSION["last_regeneration"])) {
        regenerate_session_id();
    } else {
        $interval = 60 * 30;
    
        if (time() - $_SESSION["last_regeneration"] >= $interval) {
            regenerate_session_id();
        }
    }
    
}


function regenerate_session_id()
{
    session_regenerate_id(true);
    $_SESSION["last_regeneration"] = time();
}


# суть оновити session_id коли юзер залогінеться
# з використанням id юзера
function regenerate_session_id_loggedin()
{
    session_regenerate_id(true);
    
    # доступ до id юзера
    $userId = $_SESSION["user_id"];
    
    # нова сесія
    $newSessionId = session_create_id();

    # встановлюємо id сесії
    $sessionId =  $newSessionId . "_" .  $userId;

    # session_id перезапустить session_id і час оновиться
    session_id($sessionId);

    $_SESSION["last_regeneration"] = time();
}
