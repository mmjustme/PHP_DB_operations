<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $userSearch = $_POST["usersearch"];   

    try {       
        require_once "includes/dbh.inc.php";
        // суть пошуку - знайти коментарі за ім'ям яке введе юзер
        // тому, відхоплюємо userSearch і вставляємо в запит       
        $query = "SELECT * FROM comments WHERE username = :usersearch;";

        $stmt = $pdo->prepare($query);
        
        // оскільки username = :usersearch (див.22 урок Named method) 
        // тут ми вказуємо чому буде = :usersearch
        // тобто значенню яке ввів користувач
        $stmt->bindParam(":usersearch", $userSearch);      
       
        $stmt->execute();

        // в $results будуть наші данні з DB
        // fetchAll() - візьме усі дані які ми отримуємо, 
        // ще є fetch але він отримує лтше 1 шмат інформації нам потрібні усі дані
        // PDO::FETCH_ASSOC - отримати дані через асоціативний масив
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
              
        $pdo = null; 
        $stmt = null;               
    } catch (PDOExeption $e) {        
        die("Query failed: " . $e->getMessage());
    }

} else {    
    header("Location: ../index.php");
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/search.css">
    <title>Document</title>
</head>
<body>
    
    <h3>Search results:</h3>
    
    <?php
        // перевірка якщо відсутні дані (немає коментарів)
        if(empty($results)){
            echo "<div>";
            echo "<p>There were no results!</p>";
            echo "</div>";
        } else {
            // попередній перегляд данних
            // var_dump($results);

            // виводимо дані через loop
            foreach ($results as $row){
                // оскільки дані будуть виводитися в браузері ми викр. htmlspecialchars
                echo "<div>";
                echo "<h4>" . htmlspecialchars($row["username"]) . "</h4>";
                echo "<p>" . htmlspecialchars($row["comment_text"]) . "</p>";
                echo "<p>" . htmlspecialchars($row["created_at"]) . "</p>";
                echo "</div>";
            }
        }
    ?>

</body>
</html>