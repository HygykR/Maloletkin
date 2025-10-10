<h1>Многомерные массивы</h1>
<?php
$students = [
    ['name' => 'Иванов Иван', 'group' => 'ИВ1к', 'cours' => 1],
    ['name' => 'Сидоров Владимир', 'group' => 'М1к', 'cours' => 3],
    ['name' => 'Петров Петр', 'group' => 'ИВ2к', 'cours' => 2],
    ['name' => 'Ишаков Дмитрий', 'group' => 'МТ2к', 'cours' => 4],
];
foreach($students as $student){
    echo "Имя: {$student['name']}, Группа: {$student['group']}, Курс: {$student['cours']}";
    echo '<br>';
}
?>

<?php
echo '<h1>Задание 1</h1>';
$squares = [];
for ($i = 10; $i <= 99; $i++) {
    $squares[] = $i * $i;
}
$rows = 9;
$cols = 10;
$array2d = [];
$index = 0;
for ($r = 0; $r < $rows; $r++) {
    for ($c = 0; $c < $cols; $c++) {
        $array2d[$r][$c] = $squares[$index++];
    }
}
echo "<table border='1' cellpadding='5' cellspacing='0'>";
foreach ($array2d as $row) {
    echo "<tr>";
    foreach ($row as $value) {
        echo "<td>$value</td>";
    }
    echo "</tr>";
}
echo "</table>";
?>

<?php
echo '<h1>Задание 2</h1>';
$array = [];
for ($i = 0; $i < 5; $i++) {
    for ($j = 0; $j < 4; $j++) {
        $array[$i][$j] = rand(1, 100);
    }
}
$min = $max = $array[0][0];
$minI = $maxI = 0;
$minJ = $maxJ = 0;
for ($i = 0; $i < 5; $i++) {
    for ($j = 0; $j < 4; $j++) {
        if ($array[$i][$j] > $max) {
            $max = $array[$i][$j];
            $maxI = $i;
            $maxJ = $j;
        }
        if ($array[$i][$j] < $min) {
            $min = $array[$i][$j];
            $minI = $i;
            $minJ = $j;
        }
    }
}
echo "Массив: <br>";
foreach ($array as $row) {
    echo implode(" ", $row) . "<br>";
}
echo "Максимальный элемент: $max, позиция: ($maxI, $maxJ), <br>";
echo "Минимальный элемент: $min, позиция: ($minI, $minJ)";
?>