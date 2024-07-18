<?php
# файл для відображання пенної інформації на сайті

# ввімкнули декларування типів
declare(strict_types=1);

function check_signup_errors() {
    if(isset($_SESSION["errors_signup"])) {
        # стоврюємо errors щоб вивести в index.php
        # посуті дублюємо наші помилки
        $errors = $_SESSION["errors_signup"];
        
        # виводимо помилки
        echo "<br>";

        foreach ($errors as $error){
            echo '<p class="form-error">' . $error .'</p>';
        }

        # після копії помилок ми очищаємо дані з сесії
        unset($_SESSION["errors_signup"]);
    }
}