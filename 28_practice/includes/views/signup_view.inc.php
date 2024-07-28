<?php

declare(strict_types=1);

function check_signup_errors()
{
    if (isset($_SERVER["errors_signup"])) {
        $errors = $_SERVER["errors_signup"];

        echo "<br>";
        foreach ($errors as $error) {
            echo "<p>" . $error . "<p>";
        }
    }
    unset($_SERVER["errors_signup"]);
}
