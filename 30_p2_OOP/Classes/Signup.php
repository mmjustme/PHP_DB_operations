<?php

# тепер Signup child класу Dbh, тобто Dbh батьківсткий клас для Signup
# а отже, Signup має можливість звернутися до зметодів(навіть protected) Dbh класу
# також важливий порядок файлів в signup.inc.php
class Signup extends Dbh
{
    private $username;
    private $pwd;

    public function __construct($username, $pwd)
    {
        $this->username = $username;
        $this->pwd = $pwd;
    }


    private function connect(){}

    private function insertUser() {
        $query = "INSERT INTO users ('username', 'pwd') VALUES (':username', ':pwd');";

        # якщо є класи з однаковими назвами, замість $this можна викр. parent
        # оскільки connect повертає pdo то ми може звернутися до prepare        
        $stmt=parent::connect()->prepare($query);
        // $stmt=$this->connect()->prepare($query); // викличе помилку оск вже існує метод connect вище

        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":pwd", $this->pwd);
        $stmt->execute();
    }
}
