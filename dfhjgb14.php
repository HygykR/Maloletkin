<?php
echo '<h1>Анонимные функции</h1>';
echo '<h2>Задание 1</h2>';
$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$evenNumbers = array_filter($numbers, function($number) {
    return $number % 2 == 0;
});
if (empty($evenNumbers)) {
    echo "В массиве нет четных чисел.";
} else {
    echo "Четные числа: ";
    print_r($evenNumbers);
}
?>

<?php
echo '<h2>Задание 2</h2>';
$numbers = [1, 2, 3, 4, 5, -2, -3];
$cubes = array_map(function($number) {
    return $number ** 3;
}, $numbers);
echo "Исходный массив: ";
print_r($numbers);
echo "Массив кубов: ";
print_r($cubes);
?>

<?php
echo '<h2>Задание 3</h2>';
$numbers = [1, 2, 3, 4, 5];
$average = array_sum($numbers) / count($numbers);
$product = array_reduce($numbers, fn($carry, $item) => $carry * $item, 1);
$geometric = pow($product, 1 / count($numbers));
echo "Среднее арифметическое: $average ";
echo "Среднее геометрическое: $geometric ";
?>

<?php
echo '<h2>Задание 4</h2>';
$students = [
    ['name' => 'Вася', 'birth' => 2005, 'height' => 175],
    ['name' => 'Петя', 'birth' => 2004, 'height' => 165],
    ['name' => 'Маша', 'birth' => 2006, 'height' => 180],
    ['name' => 'Даша', 'birth' => 2005, 'height' => 172]
];
$tallStudents = array_filter($students, fn($student) => $student['height'] > 170);
$names = array_column($tallStudents, 'name');
echo "Количество студентов выше 170 см: ", count($tallStudents),  "";
echo "Имена: ", implode(', ', $names), " ";
?>

<?php
echo '<h2>Задание 5</h2>';
$numbers = [1, -2, 0, 3, -1, 0, 5];
$positive = $negative = $zero = 0;
foreach ($numbers as $num) {
    if ($num > 0) $positive++;
    elseif ($num < 0) $negative++;
    else $zero++;
}
echo "Положительных: $positive ";
echo "Отрицательных: $negative ";
echo "Нулевых: $zero ";
?>

<?php
echo '<h2>Задание 6</h2>';
$numbers = [1, 5, 3, 8, 2, 5, 7];
$K = 5;
$less = $equal = $greater = 0;
foreach ($numbers as $num) {
    if ($num < $K) $less++;
    elseif ($num == $K) $equal++;
    else $greater++;
}
echo "Меньше $K: $less ";
echo "Равно $K: $equal ";
echo "Больше $K: $greater ";
?>

<?php
echo '<h2>Задание 7</h2>';
$numbers = [10, 15, 20, 25, 30, 35, 40];
$M = 5;
$L = 15;
$N = 35;
$count = 0;
foreach ($numbers as $num) {
    if ($num % $M == 0 && $num >= $L && $num <= $N) {
        $count++;
    }
}
echo "Количество чисел кратных $M в промежутке [$L, $N]: $count ";
?>

<?php
echo '<h2>Задание 8</h2>';
$numbers = [10, 20, 30, 40, 50, 60, 70, 80, 90, 100];
for ($i = 1; $i < count($numbers); $i *= 2) {
    if (isset($numbers[$i])) {
        echo "Индекс $i: ", $numbers[$i], " ";
    }
}
?>

<?php
echo '<h2>Задание 9</h2>';
function isPrime($n) {
    if ($n < 2) return false;
    for ($i = 2; $i * $i <= $n; $i++) {
        if ($n % $i == 0) return false;
    }
    return true;
}
$numbers = [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13];
$primeCount = 0;
foreach ($numbers as $num) {
    if (isPrime($num)) {
        $primeCount++;
    }
}
echo "Количество простых чисел: $primeCount ";
?>