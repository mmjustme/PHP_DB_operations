<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>OOP</h1>

    <?php

    // $brand = "Volvo";
    // $color = "Green";

    // function gertCarInfo($brand, $color)
    // {
    //     echo 'Brand: ' . $brand . ', Color: ' . $color;
    // }

    // echo gertCarInfo($brand, $color);

    require_once "Classes/Car.php";
    $car05 = new Car("Toyota","black");
    echo"<br>";
    echo $car05->vehicleType;
    echo"<br>";
    echo $car05->getCarInfo();
    ?>
</body>

</html>