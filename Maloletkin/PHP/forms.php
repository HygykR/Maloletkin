<?php
if ($_GET) {
    if (isset($_GET['surname1']) && isset($_GET['name1']) && isset($_GET['patronymic1'])) {
        $surname1 = $_GET['surname1'];
        $name1 = $_GET['name1'];
        $patronymic1 = $_GET['patronymic1'];
        $result1 = "Фамилия: $surname1<br>Имя: $name1<br>Отчество: $patronymic1";
    }
    
    if (isset($_GET['number2'])) {
        $number2 = intval($_GET['number2']);
        $dividers = [];
        for ($i = 1; $i <= $number2; $i++) {
            if ($number2 % $i == 0) {
                $dividers[] = $i;
            }
        }
        $result2 = "Делители числа $number2: " . implode(', ', $dividers);
    }
    
    if (isset($_GET['a3']) && isset($_GET['b3']) && isset($_GET['c3'])) {
        $a3 = floatval($_GET['a3']);
        $b3 = floatval($_GET['b3']);
        $c3 = floatval($_GET['c3']);
        if ($a3 + $b3 > $c3 && $a3 + $c3 > $b3 && $b3 + $c3 > $a3) {
            $p = ($a3 + $b3 + $c3) / 2;
            $area = sqrt($p * ($p - $a3) * ($p - $b3) * ($p - $c3));
            $result3 = "Площадь треугольника: " . round($area, 2);
        } else {
            $result3 = "Треугольник не существует";
        }
    }
    
    if (isset($_GET['a4']) && isset($_GET['b4']) && isset($_GET['c4'])) {
        $a4 = floatval($_GET['a4']);
        $b4 = floatval($_GET['b4']);
        $c4 = floatval($_GET['c4']);
        if ($a4 == 0) {
            $result4 = "Это не квадратное уравнение (a ≠ 0)";
        } else {
            $d = $b4 * $b4 - 4 * $a4 * $c4;
            if ($d > 0) {
                $x1 = (-$b4 + sqrt($d)) / (2 * $a4);
                $x2 = (-$b4 - sqrt($d)) / (2 * $a4);
                $result4 = "Два корня: x₁ = " . round($x1, 2) . ", x₂ = " . round($x2, 2);
            } elseif ($d == 0) {
                $x = -$b4 / (2 * $a4);
                $result4 = "Один корень: x = " . round($x, 2);
            } else {
                $result4 = "Действительных корней нет";
            }
        }
    }
    
    if (isset($_GET['num15']) && isset($_GET['num25']) && isset($_GET['num35'])) {
        $num15 = floatval($_GET['num15']);
        $num25 = floatval($_GET['num25']);
        $num35 = floatval($_GET['num35']);
        $numbers = [$num15, $num25, $num35];
        rsort($numbers);
        $a = $numbers[0];
        $b = $numbers[1];
        $c = $numbers[2];
        if ($a * $a == $b * $b + $c * $c) {
            $result5 = "Числа $num15, $num25, $num35 являются тройкой Пифагора";
        } else {
            $result5 = "Числа $num15, $num25, $num35 НЕ являются тройкой Пифагора";
        }
    }
    
    if (isset($_GET['birthdate6'])) {
        $birthdate6 = $_GET['birthdate6'];
        $date_parts = explode('.', $birthdate6);
        if (count($date_parts) == 3) {
            $day = $date_parts[0];
            $month = $date_parts[1];
            $year = $date_parts[2];
            $today = new DateTime();
            $birthday_this_year = new DateTime(date('Y') . "-$month-$day");
            if ($today > $birthday_this_year) {
                $birthday_this_year->modify('+1 year');
            }
            $interval = $today->diff($birthday_this_year);
            $days_left = $interval->days;
            $result6 = "До вашего дня рождения осталось: $days_left дней";
        }
    }
}

function getValue($field) {
    if (isset($_GET[$field])) {
        return $_GET[$field];
    }
    return '';
}
?>

<h2>1. Фамилия, имя, отчество</h2>
<form method="get">
    Фамилия: <input type="text" name="surname1" value="<?php echo getValue('surname1'); ?>"><br>
    Имя: <input type="text" name="name1" value="<?php echo getValue('name1'); ?>"><br>
    Отчество: <input type="text" name="patronymic1" value="<?php echo getValue('patronymic1'); ?>"><br>
    <input type="submit" value="Отправить">
</form>
<?php if (isset($result1)) echo "<p><strong>Результат:</strong><br>$result1</p>"; ?>
<hr>

<h2>2. Делители числа</h2>
<form method="get">
    Число: <input type="number" name="number2" value="<?php echo getValue('number2'); ?>">
    <input type="submit" value="Найти делители">
</form>
<?php if (isset($result2)) echo "<p><strong>Результат:</strong><br>$result2</p>"; ?>
<hr>

<h2>3. Площадь треугольника</h2>
<form method="get">
    Сторона a: <input type="number" step="0.1" name="a3" value="<?php echo getValue('a3'); ?>"><br>
    Сторона b: <input type="number" step="0.1" name="b3" value="<?php echo getValue('b3'); ?>"><br>
    Сторона c: <input type="number" step="0.1" name="c3" value="<?php echo getValue('c3'); ?>"><br>
    <input type="submit" value="Вычислить площадь">
</form>
<?php if (isset($result3)) echo "<p><strong>Результат:</strong><br>$result3</p>"; ?>
<hr>

<h2>4. Квадратное уравнение</h2>
<form method="get">
    a: <input type="number" step="0.1" name="a4" value="<?php echo getValue('a4'); ?>"><br>
    b: <input type="number" step="0.1" name="b4" value="<?php echo getValue('b4'); ?>"><br>
    c: <input type="number" step="0.1" name="c4" value="<?php echo getValue('c4'); ?>"><br>
    <input type="submit" value="Решить уравнение">
</form>
<?php if (isset($result4)) echo "<p><strong>Результат:</strong><br>$result4</p>"; ?>
<hr>

<h2>5. Тройка Пифагора</h2>
<form method="get">
    Число 1: <input type="number" name="num15" value="<?php echo getValue('num15'); ?>"><br>
    Число 2: <input type="number" name="num25" value="<?php echo getValue('num25'); ?>"><br>
    Число 3: <input type="number" name="num35" value="<?php echo getValue('num35'); ?>"><br>
    <input type="submit" value="Проверить">
</form>
<?php if (isset($result5)) echo "<p><strong>Результат:</strong><br>$result5</p>"; ?>
<hr>

<h2>6. Дни до дня рождения</h2>
<form method="get">
    Дата рождения: <input type="text" name="birthdate6" value="<?php echo getValue('birthdate6'); ?>" placeholder="01.12.1990">
    <input type="submit" value="Рассчитать">
</form>
<?php if (isset($result6)) echo "<p><strong>Результат:</strong><br>$result6</p>"; ?>