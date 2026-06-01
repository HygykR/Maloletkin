<?php
echo '<h1>Задание 1</h1>';
$arr = [3, 7, 1, 9, 2, 8];
$min_value = $arr[0];
$max_value = $arr[0];
$min_index = 0;
$max_index = 0;
for ($i = 1; $i < count($arr); $i++) {
    if ($arr[$i] < $min_value) {
        $min_value = $arr[$i];
        $min_index = $i;
    }
    if ($arr[$i] > $max_value) {
        $max_value = $arr[$i];
        $max_index = $i;
    }
}
echo "Минимальный элемент: $min_value, индекс: $min_index";
echo "Максимальный элемент: $max_value, индекс: $max_index";
?>

<?php
echo '<h1>Задание 2</h1>';
$arr = [3, 7, 1, 9, 2, 8];
$sum = 0;
$product = 1;
foreach ($arr as $value) {
    $sum += $value;
    $product *= $value;
}
echo "Сумма элементов: $sum ";
echo "Произведение элементов: $product";
?>

<?php
echo '<h1>Задание 3</h1>';
$arr = [3, 7, 1, 9, 2, 8];
$sum = 0;
$count = count($arr);
foreach ($arr as $value) {
    $sum += $value;
}
$average = $count > 0 ? $sum / $count : 0;
echo "Среднее арифметическое элементов: $average";
?>

<?php
echo '<h1>Задание 4</h1>';
$original = [1.5, -2.3, 0.0, 4.1, -3.6];
$result = [];

foreach ($original as $value) {
    if ($value > 0) {
        $result[] = $value * $value;
    } elseif ($value < 0) {
        $result[] = abs($value);
    } else {
        $result[] = 0;
    }
}
echo "Исходный массив: ";
foreach ($original as $val) {
    echo "$val ";
}
echo "Преобразованный массив: ";
foreach ($result as $val) {
    echo "$val ";
}
?>

<?php
echo '<h1>Задание 5</h1>';
$arr = [10, 20, 30, 40, 50, 60];
for ($i = 0; $i < count($arr); $i += 2) {
    echo $arr[$i] . " ";
}
?>

<?php
echo '<h1>Задание 6</h1>';
$arr = [2, 5, 3, 8, 7, 10];
for ($i = 1; $i < count($arr); $i++) {
    if ($arr[$i] > $arr[$i - 1]) {
        echo $arr[$i] . " ";
    }
}
?>

<?php
echo '<h1>Задание 7</h1>';
$arr = [1, 2, 3, 4, 5];
for ($i = 0; $i < count($arr) - 1; $i += 2) {
    $temp = $arr[$i];
    $arr[$i] = $arr[$i + 1];
    $arr[$i + 1] = $temp;
}
foreach ($arr as $value) {
    echo $value . " ";
}
?>

<?php
echo '<h1>Задание 8</h1>';
$array = [1, 2, 3, 4, 5];
$shiftCount = 1;
$length = count($array);
for ($i = 0; $i < $shiftCount; $i++) {
    $last = $array[$length - 1];
    for ($j = $length - 1; $j > 0; $j--) {
        $array[$j] = $array[$j - 1];
    }
    $array[0] = $last;
}
print_r($array);
?>

<?php
echo '<h1>Задание 9</h1>';
$array = [1, 2, 2, 3, 3, 3, 4, 4, 4, 4];
$countNumbers = array_count_values($array);
$pairCount = 0;
foreach ($countNumbers as $number => $count) {
    if ($count > 1) {
        $pairsForNumber = ($count * ($count - 1)) / 2;
        $pairCount += $pairsForNumber;
    }
}

echo "Всего пар: " . $pairCount;
?>