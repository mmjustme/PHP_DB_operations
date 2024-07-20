<?php
# файл для відображання пенної інформації на сайті

# ввімкнули декларування типів
declare(strict_types=1);

# дана функція поверне поля з інпутами, і якщо відсустні помилки інпути будуть вже з даними
# які юзер попередньо вводив, окрім ппаролю 
function signup_inputs(){    
    # при введені в поля невірні дані в сесії будуть дані signup_data які ввів юзер
    # ми перевіримо чи ці дані точно є а саме username, також чи не було помилки username_taken
    if(isset($_SESSION["signup_data"]["username"]) && 
    !isset($_SESSION["errors_signup"]["username_taken"])){
        # тоді ми можемо повернути форму username але вже з данними
        echo '<input type="text" name="username" placeholder="Username"
        value="'. $_SESSION["signup_data"]["username"] .'">';
    } else {
        # блок пвертає звичайну форму без данних
        echo '<input type="text" name="username" placeholder="Username">';
    }
    
    # поле з паролем не змінюємо, тому просто його повертаємо
    echo  '<input type="password" name="pwd" placeholder="Password">';
    
    # аналогічно робимо з email
    if( isset($_SESSION["signup_data"]["email"]) && 
        !isset($_SESSION["errors_signup"]["email_used"]) && 
        !isset($_SESSION["errors_signup"]["invalie_email"])
    )
    {       
        echo '<input type="text" name="email" placeholder="E-mail"
        value="'. $_SESSION["signup_data"]["email"] .'">';
    } else {        
        echo '<input type="text" name="email" placeholder="E-mail">';
    }
}

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