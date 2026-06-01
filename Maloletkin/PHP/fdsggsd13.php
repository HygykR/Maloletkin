<?php
echo '<h1>Задание 1</h1>';
$numbers = [2.5, -1.7, 3.2, 0, 4.8, -2.1];
foreach ($numbers as $num) {
    echo $num, " ";
    if ($num == 0) break;
}
?>

<?php
echo '<h1>Задание 2</h1>';
$arr = [3, 7, 2, 9, 1, 5];
$minIndex = array_search(min($arr), $arr);
$maxIndex = array_search(max($arr), $arr);
$temp = $arr[$minIndex];
$arr[$minIndex] = $arr[$maxIndex];
$arr[$maxIndex] = $temp;
print_r($arr);
?>

<?php
echo '<h1>Задание 3</h1>';
$arr = [5, 0, 3, 0, 7, 0, 2];
$result = [];
foreach ($arr as $index => $value) {
    if ($value == 0) {
        $result[] = $index;
    }
}
print_r($result);
?>

<?php
echo '<h1>Задание 4</h1>';
$arr = [5, 0, 3, 0, 7, 0, 2];
$arr = array_filter($arr, function($value) {
    return $value != 0;
});
print_r($arr);
?>

<?php
echo '<h1>Задание 5</h1>';
$arr = [5, 0, 3, 0, 7, 0, 2];
foreach ($arr as $key => $value) {
    if ($value == 0) {
        unset($arr[$key]);
    }
}
echo "Массив ДО переиндексации:\n";
print_r($arr);
$arr = array_values($arr);
echo "Массив ПОСЛЕ переиндексации:\n";
print_r($arr);
?>

<?php
echo '<h1>Задание 6</h1>';
$arr = [2, 5, 8, 3, 7, 4, 1, 6, 9];
$oddCount = 0;
foreach ($arr as $number) {
    if ($number % 2 != 0) {
        $oddCount++;
    }
}
$totalCount = count($arr);
$percentage = ($oddCount / $totalCount) * 100;
echo "Массив: ", implode(', ', $arr), " ";
echo "Всего элементов: $totalCount ";
echo "Нечетных чисел: $oddCount ";
echo "Процент нечетных чисел: " . round($percentage, 2), "% ";
?>

<?php
echo '<h1>Задание 7</h1>';
$arr = [1.5, 2.7, 3.2, 4.8, 5.1, 6.9, 7.3, 8.4, 9.6, 10.2];
function isPrime($n) {
    if ($n < 2) return false;
    if ($n == 2) return true;
    if ($n % 2 == 0) return false;
    for ($i = 3; $i <= sqrt($n); $i += 2) {
        if ($n % $i == 0) return false;
    }
    return true;
}
$sum = 0;
foreach ($arr as $index => $value) {
    if (isPrime($index)) {
        $sum += $value;
        echo "Индекс $index (простой): $value";
    }
}
echo "Массив: ", implode(', ', $arr), " ";
echo "Сумма элементов с простыми индексами: $sum";
?>