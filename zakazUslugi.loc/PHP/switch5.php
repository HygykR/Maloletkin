<?php
echo '<h1>Тема: оператор switch</h1>';
echo '<h2>Задание 1</h2>';
echo '<br>';

if (isset($_POST['number'])) {
    $a = $_POST['number'];
    if (preg_match('/^[0-9]$/', $a)) {
        switch ($a) {
            case '0':
                $b = 'zero';
                break;
            case '1':
                $b = "one";
                break;
            case '2':
                $b = 'two';
                break;
            case '3':
                $b = 'three';
                break;
            case '4':
                $b = 'four';
                break;
            case '5':
                $b = "five";
                break;
            case '6':
                $b = 'six';
                break;
            case '7':
                $b = 'seven';
                break;
            case '8':
                $b = 'eight';
                break;
            case '9':
                $b = 'nine';
                break;
            default:
                $b = 'ничего не совпало';
        }
        echo $b;
    } else {
        echo 'Пожалуйста, введите правильное число от 0 до 9.';
    }
}
?>

<br><br>
<form method="post">
    <label for="number">Введите число от 0 до 9: </label>
    <input type="text" id="x" name="number" maxlength="1" pattern="[0-9]" required>
    <button type="submit">Отправить</button>
</form>


<?php
echo '<h2>задание 2</h2>';
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

$a = 3;
$digit = match($a){
    1 => 'один',
    2 => 'два',
    3 => 'три',
    default => 'Нет такой цифры',
};
?>

