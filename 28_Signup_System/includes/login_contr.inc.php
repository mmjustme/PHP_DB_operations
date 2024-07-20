<?php

declare(strict_types=1);

function is_input_empty(string $username, string $pwd)
{
    if (empty($username) || empty($pwd)) {
        return true;
    } else {
        return false;
    }
}

# bool|array = дані можуть прийти і це буде масив
# і не прийти тоді це буде false
function is_username_wrong(bool|array $result)
{
    if (!$result) {
        return true;
    } else {
        return false;
    }
}

function is_pwd_wrong(string $pwd, string $hashedPwd)
{
    if (!password_verify($pwd, $hashedPwd)) {
        return true;
    } else {
        return false;
    }
}
