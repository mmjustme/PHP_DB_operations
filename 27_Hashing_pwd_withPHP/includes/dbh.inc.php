<?php

$dsn = "mysql:host=localhost;dbname=myfirst_db";
$dbusername = "root";
$dbpassword = "";

// pdo - php data object - good method to connect
// also here is "sql-i" 
try {
    // create db object 
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    // error handle
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOExeption $e) {
    echo "Connection failed: " . $e->getMessage();
}

