<?php

class Car
{
    // Properties / Fields
    # protected - підкласи будуть мати доступ до змінної
    # private - доступ до змінної є лише в даного класу
    # public - доступ до змінної є в усіх
    private $brand;
    private $color;
    public $vehicleType = "car";

    // Constructor
    public function __construct($brand, $color = "none")
    {
        $this->brand = $brand;
        $this->color = $color;
    }

    // Method

    public function getCarInfo()
    {
        return 'Brand: ' . $this->brand . ', Color: ' . $this->color;
    }
}


// $car01 = new Car("Volvo", "white");
// $car02 = new Car("BMW");

// // echo $car01->vehicleType;
// echo "<br>";
// echo $car01->getCarInfo();
// echo "<br>";
// echo $car01->vehicleType;
