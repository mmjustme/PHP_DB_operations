<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $email = $_POST["email"];

    try {        
       require_once "dbh.inc.php";
        
        $query = "INSERT INTO users (username, pwd, email)
        VALUES (:username, :pwd, :email);";

        $stmt = $pdo->prepare($query);

        # hash password
        $options = ["cost"=> 12];        
        $hasedPwd = password_hash($pwd, PASSWORD_BCRYPT, $options);
       
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":pwd", $hasedPwd);
        $stmt->bindParam(":email", $email);
      
        $stmt->execute();
          
        $pdo = null; 
        $stmt = null;
        
        header("Location: ../index.php");
      
        die();        
    } catch (PDOExeption $e) {        
        die("Query failed: " . $e->getMessage());
    }

} else {    
    header("Location: ../index.php");
};