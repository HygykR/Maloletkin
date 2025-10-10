<?php
echo '<h1>Тема: оператор match</h1>';
echo '<h2>Задание 1</h2>';

if (isset($_POST['digit'])) {
    $digit = $_POST['digit'];

        $word = match ($digit) {
            '0' => 'zero',
            '1' => 'one',
            '2' => 'two',
            '3' => 'three',
            '4' => 'four',
            '5' => 'five',
            '6' => 'six',
            '7' => 'seven',
            '8' => 'eight',
            '9' => 'nine',
            default => 'ничего не совпало',
        };
        echo $word;
    } else {
        echo 'Введите цифру от 0 до 9.';
    }
?>

<br><br>
<form method="post">
    <label for="digit">Введите цифру (0-9): </label>
    <input type="text" id="x" name="digit" maxlength="1" pattern="[0-9]" required> 
    <button type="submit">Отправить</button>
</form>


<?php
echo '<h2>Задание 2</h2>';
$month = 6;

switch ($month) {
    case 1:
        echo "1 января — Новый год ";
        echo "7 января — Рождество ";
        break;
    case 2:
        echo "23 февраля — День защитника Отечества ";
        break;
    case 3:
        echo "8 марта — Международный женский день ";
        break;
    case 4:
        echo "12 апреля — День космонавтики ";
        break;
    case 5:
        echo "1 мая — Праздник Весны и Труда ";
        echo "9 мая — День Победы ";
        break;
    case 6:
        echo "12 июня — День России ";
        break;
    case 7:
        echo "8 июля — День семьи, любви и верности ";
        break;
    case 8:
        echo "22 августа — День Флага России ";
        break;
    case 9:
        echo "1 сентября — День знаний ";
        break;
    case 10:
        echo "4 октября — День учителя ";
        break;
    case 11:
        echo "4 ноября — День народного единства ";
        break;
    case 12:
        echo "31 декабря — Новый год ";
        break;
    default:
        echo "Некорректный номер месяца ";
        break;
}



echo '<h2>Задание 3</h2>';
$number = 27;
$lastDigit = $number % 10;
$squareLastDigit = ($lastDigit * $lastDigit) % 10;
echo "Последняя цифра числа: $lastDigit\n";
echo "Последняя цифра квадрата числа: $squareLastDigit\n";

echo '<h2>Задание 4</h2>';
$k = 16;
$lastDigit = $k % 10;
$lastTwoDigits = $k % 100;
if ($lastTwoDigits >= 11 && $lastTwoDigits <= 14) {
    $word = "лет";
} else {
    if ($lastDigit == 1) {
        $word = "год";
    } elseif ($lastDigit >= 2 and $lastDigit <= 4) {
        $word = "года";
    } else {
        $word = "лет";
    }
}
echo "Мне $k $word";
echo '<br>';

echo '<h2>Задание 5</h2>';
$unit = 3;
$M = 1500; 

switch ($unit) {
    case 1:
        $kg = $M;
        break;
    case 2:
        $kg = $M / 1e6;
        break;
    case 3:
        $kg = $M / 1000;
        break;
    case 4:
        $kg = $M * 1000;
        break;
    case 5:
        $kg = $M * 100;
        break;
    default:
        echo "Неверный номер единицы измерения\n";
        exit;
}
echo "Масса в килограммах: $kg\n";
?>

<?php
$digit = 0;
if(isset($_GET['task1'])){
    $dig = (int) $_GET['digit'];
    $digit = match($dig){
        1 => 'one',
        2 => 'two',
        3 => 'three',
        4 => 'four',
        5 => 'five',
        6 => 'six',
        7 => 'seven',
        8 => 'eight',
        9 => 'nine',
    default => 'Нет такой цифры',
    };
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Оператор Match</h1>
    <h2>Задача 1</h2>
    <form action="">
        <p>Введите цифру:<input type="text" name='digit'></p>
        <p><input type="submit" name="task1"></p>
    </form>
    <p><?= "Цифра называется: $digit" ?></p>
</body>
</html>

<?php

?>