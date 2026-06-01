<?php
class Car {
    public $firstName;
    public $lastName;
    public $email;
    
    public function sayAboutMe() {
        echo $this->firstName . " " . $this->lastName . "\n";
    }
}
$user1 = new Car();
$user1->firstName = "Иван";
$user1->lastName = "Петров";
$user1->email = "ivan@example.com";

$user2 = new Car();
$user2->firstName = "Мария";
$user2->lastName = "Сидорова";
$user2->email = "maria@example.com";
$user1->sayAboutMe();
$user2->sayAboutMe();
?>

<?php
class Car2 {
    public $brand;
    public $model;
    public $type;
    public $color;
    public $weight;
    public $year;
    public $price;
    
    public function getInfo() {
        echo "Марка: " . $this->brand . "<br>";
        echo "Модель: " . $this->model . "<br>";
        echo "Тип: " . $this->type . "<br>";
        echo "Цвет: " . $this->color . "<br>";
        echo "Вес: " . $this->weight . " кг <br>";
        echo "Год выпуска: " . $this->year . "<br>";
        echo "Цена: $" . $this->price . "<br>";
    }
    
    public function getWeight() {
        return $this->weight;
    }
    
    public function getPrice() {
        return $this->price;
    }
}
$cars = [];

$car1 = new Car2();
$car1->brand = "Ferrari";
$car1->model = "250 GTO";
$car1->type = "Спорткар";
$car1->color = "Красный";
$car1->weight = 1200;
$car1->year = 1962;
$car1->price = 48000000;

$car2 = new Car2();
$car2->brand = "Porsche";
$car2->model = "911 Carrera";
$car2->type = "Спорткар";
$car2->color = "Серебристый";
$car2->weight = 1450;
$car2->year = 1973;
$car2->price = 350000;

$car3 = new Car2();
$car3->brand = "Mercedes-Benz";
$car3->model = "300SL";
$car3->type = "Купе";
$car3->color = "Черный";
$car3->weight = 1300;
$car3->year = 1954;
$car3->price = 1200000;

$car4 = new Car2();
$car4->brand = "Ford";
$car4->model = "Mustang";
$car4->type = "Мускулкар";
$car4->color = "Синий";
$car4->weight = 1600;
$car4->year = 1967;
$car4->price = 250000;

$car5 = new Car2();
$car5->brand = "Chevrolet";
$car5->model = "Corvette";
$car5->type = "Спорткар";
$car5->color = "Белый";
$car5->weight = 1550;
$car5->year = 1963;
$car5->price = 300000;

$cars = [$car1, $car2, $car3, $car4, $car5];
$totalPrice = 0;
foreach ($cars as $car) {
    $totalPrice += $car->getPrice();
}

echo "Общая стоимость коллекции: $" . number_format($totalPrice) . "<br>";
foreach ($cars as $index => $car) {
    echo "\n--- Машина " . ($index + 1) . " ---\n";
    $car->getInfo();
}
?>