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

    } else if(isset($_GET["signup"]) && $_GET["signup"] === "success") {
        # при успішнову ств юзера ми передапвали в дрес строці signup=success
        # тут ми й перевіряємо це і виводимо повідомлення нижче
        echo '<br>';
        echo '<p>Signup success!</p>';
    }
}