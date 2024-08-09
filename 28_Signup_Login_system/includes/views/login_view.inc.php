<?php

declare(strict_types=1);

function check_login_errors(){
    if(isset($_SESSION["errors_login"])){
        $errors = $_SESSION["errors_login"];

        echo "<br>";
        
        foreach($errors as $error){
            echo "<p class='form-error'>" . $error . '</p>';
        };
        
        unset($_SESSION["errors_login"]);
    } else if(isset($_GET["login"]) && isset($_GET["login"]) === "success"){
        echo "<br>";
        echo "<p class='form-success'>Login success</p>";
    }
}

# якщо існує user_id, отже юзер залогінений
# і ми можемо змінювати контетн який покахуємо
function output_username(){
    if(isset($_SESSION["user_id"])){
        echo "You are logged in as ". $_SESSION["user_username"];
    } else {
        echo "You are not logged in";
    }
}