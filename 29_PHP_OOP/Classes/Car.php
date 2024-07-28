<?php

class Car
{
    # Properties / Fields

    # protected - даний клас та підкласи будуть мати доступ до змінних
    # private - доступ до змінних є лише в даного класу
    # public - доступ до змінної є в усіх    
    # важливо робити змінні private, protected і лише в конкретних випадках public    
    private $brand;
    private $color;
    public $vehicleType = "car";

    # Constructor
    public function __construct($brand, $color = "none")
    {
        $this->brand = $brand;
        $this->color = $color;
    }

    # Methods
    public function getCarInfo()
    {
        # створення власних методів через $this що звертається до класу
        return 'Brand: ' . $this->brand . ', Color: ' . $this->color;
    }
}

# приклади створення класів, виведемо на index.php тому тут закоментовано
$car01 = new Car("Volvo", "white");
# зверення до змінної класу
# оскільки vehicleType - public ми маємо можливість звернутися
echo $car01->vehicleType; // car
echo "<br>";
# інші параметри private і звернення викличе помилку
// echo $car01->brand; // Uncaught Error: Cannot access private property Car

$car02 = new Car("BMW","black");
echo $car02->getCarInfo(); // Brand: BMW, Color: black
echo "<br>";

# стоверно без color, створиться за замовчуванням "none" як ми вказали в конструкторі
# в іншому випадку буде помилка
$car03 = new Car("Toyota");
# зверення до методу класу
echo "car03 - ", $car03->getCarInfo(); // Brand: Toyota, Color: none

