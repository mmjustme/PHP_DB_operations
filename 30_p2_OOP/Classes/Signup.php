<?php

# тепер Signup підклас класу Dbh
# а отже, Signup має можливість звернутися до методів Dbh класу
class Signup extends Dbh
{
    private $username;
    private $pwd;

    public function __construct($username, $pwd)
    {
        $this->username = $username;
        $this->pwd = $pwd;
    }

}