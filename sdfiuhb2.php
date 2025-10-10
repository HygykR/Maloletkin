<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>опыилвапл</title>
</head>
<body>
    <?php
    echo "<h1>Задание 1</h1>";
    $startNumber = 2;
    $multiplier = 3;
    $quantity = 5;
        for($i = 0, $sum = $startNumber; $i < $quantity; $i++, $num *= $multiplier) {
            echo $num . "";
            $num *= $multiplier;
        }
        
        echo '<h1>Второе задание</h1>';
        $lastNumber = 10;
        $sum = 0;
        for($i = 1; $i <= $lastNumber; $i++) {
            $sum += $i;
        }
        echo $sum;

        echo '<h1>Задание 3</h1>';
        $lastNumber = 6;
        $multiplicationResult = 1;
        for($i = 2; $i <= $lastNumber; $i += 2) {
            $multiplicationResult *= $i;
        }
        echo $multiplicationResult;

        echo '<h1>Задание 4</h1>';
        $distance = 10;
        $total = 0;
        for($day = 1; $day <= 7; $day++) {
            $total += $distance;
            $distance *= 1.1; // +10%
        }
        echo $total;

        echo '<h1>Задание 5</h1>';
        for($rabbits = 0; $rabbits <= 64/4; $rabbits++) {
            $geese = 64/2 - 2*$rabbits;
            if ($geese >= 0) {
                echo "Кроликов: $rabbits, гусей: $geese";
            }
        }
    ?>
</body>
</html>