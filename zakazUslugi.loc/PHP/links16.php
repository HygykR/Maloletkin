<?php
echo '<h1>Ссылки</h1>';
$a = 5;
// $b = &$a;
// $b = 10;

function setParam(&$param){
    $param = 10;
}
setParam($a)
?>

<p><?= $a ?></p>
<!-- <p><?= $b ?></p> -->

<?php
echo '<h2>Задание 1</h2>';
echo 'принимающие ссылки: <br>
1 - array_walk() <br>
2 - array_walk_recursive() <br>
3 - arsort() <br>
4 - asort() <br>
5 - krsort() <br>
6 - ksort() <br>
7 - natcasesort() <br>
8 - natsort() <br>
9 - rsort() <br>
10 - sort() <br>
11 - uasort() <br>
12 - uksort() <br>
13 - usort()'
?>

<?php
echo '<h2>Задание 2</h2>';
function cube(&$num) {
    $num = $num ** 3;
}
$number = 5;
echo "Было: $number<br>";
cube($number);
echo "Стало: $number<br>";
?>

<?php
echo '<h2>Задание 3</h2>';
function removeCommas(&$str) {
    $str = str_replace(',', '', $str);
}
$text = "Привет, это, тестовая, строка";
echo "Было: $text<br>";
removeCommas($text);
echo "Стало: $text<br>";
?>

<?php
echo '<h2>Задание 4</h2>';
function reverseWords(&$str) {
    $words = explode(' ', $str);
    foreach ($words as &$word) {
        $word = strrev($word);
    }
    $str = implode(' ', $words);
}
$text = "hello world php";
echo "Было: $text<br>";
reverseWords($text);
echo "Стало: $text<br>";
?>

<?php
echo '<h2>Задание 5</h2>';
function absoluteValues(&$arr) {
    foreach ($arr as &$value) {
        $value = abs($value);
    } 
}
$numbers = [21, -3, 0, -5, -32];
echo "Было: "; print_r($numbers);
absoluteValues($numbers);
echo "Стало: "; print_r($numbers);
?>

<?php
echo '<h2>Задание 6</h2>';
function changeKeys(&$arr) {
    $newArray = [];
    foreach ($arr as $value) {
        $newArray[(string)$value] = $value;
    }
    $arr = $newArray;
}
$numbers = [21, 3, 0, 5, -32];
echo "Было: "; print_r($numbers);
changeKeys($numbers);
echo "Стало: "; print_r($numbers);
?>