<?php
echo '<h1>Задание 1</h1>';
$radius = 5;
$circumference = 2 * pi() * $radius;
echo "Длина окружности: " . $circumference;
?>

<?php
echo '<h1>Задание 2</h1>';
$radius = 5;
$area = pi() * pow($radius, 2);
echo "Площадь круга: " . $area;
?>

<?php
echo '<h1>Задание 3</h1>';
$triangleArea = function($a, $b, $c) {
    $p = ($a + $b + $c) / 2;
    return sqrt($p * ($p - $a) * ($p - $b) * ($p - $c));
};

$a = 3; $b = 4; $c = 5;
echo "Площадь треугольника: " . $triangleArea($a, $b, $c);
?>

<?php
echo '<h1>Задание 4</h1>';
$triangleArea = function($a, $b, $c) {
    if ($a + $b <= $c || $a + $c <= $b || $b + $c <= $a) {
        return 0;
    }
    
    $p = ($a + $b + $c) / 2;
    return sqrt($p * ($p - $a) * ($p - $b) * ($p - $c));
};
echo $triangleArea(3, 4, 5);
echo $triangleArea(1, 1, 3);
?>

<?php
echo '<h1>Задание 5</h1>';
$num1 = 10;
$num2 = 5;

if ($num1 > $num2) {
    echo "Первое число больше второго";
} elseif ($num1 < $num2) {
    echo "Первое число меньше второго";
} else {
    echo "Числа равны";
}
?>

<?php
echo '<h1>Задание 6</h1>';
$string = "Это пример строки для проверки длины";

if (strlen($string) > 79) {
    echo "String is long";
} elseif (strlen($string) < 32) {
    echo "String is short";
} else {
    echo "Length of String OK";
}
?>

<?php
echo '<h1>Задание 7</h1>';
$money = 75;
$breadPrice = 50;

if ($money > $breadPrice) {
    $change = $money - $breadPrice;
    echo "Денег хватает. Остаток: " . $change . " рублей";
} elseif ($money < $breadPrice) {
    $shortage = $breadPrice - $money;
    echo "Денег не хватает. Не хватает: " . $shortage . " рублей";
} else {
    echo "Денег ровно на хлеб, без сдачи";
}
?>