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

    // потрібно створити getter, setter methods для даного класу

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

    private function isEmptySubmit(){
        if(isset($this->username) && isset($this->pwd)){
            return false;
        } else {
            return true;
        }
    }
    # хороша практика створювати методи приватними і лише потім якщо винекне потреба змінити на публічні
    # оск даний метод буде викор в signup.php він буде publick
    public function signupUser() {
        // error handlers
        if($this->isEmptySubmit()){
            header("Location: " . $_SERVER['DOCUMENT_ROOT'] .  './index.php');
            die();
        }

        //if no error handlers signup user
        $this->insertUser();
    }
}
