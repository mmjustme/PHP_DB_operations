<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style2.css">
    <title>Document</title>
</head>
<body>
    <h1>Work with db, update, delete data</h1>     

    <h3>Change account</h3>
    <form action="includes/userUpdate.inc.php" method="post">       
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="pwd" placeholder="Password">
        <input type="text" name="email" placeholder="E-Mail">
        <button>Update</button>
    </form>

    <h3>Delete account</h3>
    <form action="includes/userDelete.inc.php" method="post">      
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="pwd" placeholder="Password">       
        <button>Delete</button>
    </form>

</body>
</html>