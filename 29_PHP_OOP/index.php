<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>OOP</h1>

    <h3>Procedural Example</h3>

    <?php
    # function example or procedural 
    $brand = "Volvo";
    $color = "Green";

    function gertCarInfo($brand, $color)
    {
        echo 'Brand: ' . $brand . ', Color: ' . $color;
    }

    echo gertCarInfo($brand, $color);
    ?>

    <h3>OOP Example</h3>

    <?php
    echo "---Car.php","<br>";
    require_once "Classes/Car.php";

    echo "<br>","<br>","<br>";
    $car05 = new Car("Toyota", "black");

    echo "---index.php","<br>";
    # оскіоль
    echo "car05 - vehicleType - ",$car05->vehicleType; // car05 - vehicleType - car
    echo "<br>";
    echo "car05 - ", $car05->getCarInfo(); // car05 - Brand: Toyota, Color: black
    ?>
</body>

</html>