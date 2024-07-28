<?php

declare(strict_types=1);

function check_signup_errors()
{
    # в signup.inc.php усі помилки будть в сесії в errors_signup
    # перевіримо чи вони є і виведемо їх
    if (isset($_SESSION["errors_signup"])) {
        # копіюємо дані щоб очистити їх в сессії (для безпеки) 
        $erorrs = $_SESSION["errors_signup"];

        # відображаємо помилки юзеру
        echo "<br>";
        foreach ($erorrs as $erorr) {
            echo "<p class='form-error'>" . $erorr . "</p>";
        }

        # очищаємо сесію
        unset($_SESSION["errors_signup"]);
    }
}
