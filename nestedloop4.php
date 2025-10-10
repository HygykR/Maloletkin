<?php
    $len = 10;
    $width = 7;
    for($i=0; $i<$width; $i++){
        for($j=0; $j<$len; $j++){
            echo 'X';
        }
        echo '<br>';
    }
    echo '<br>'
?>

<?php
    for($i=1; $i<=10; $i++){
        for($j=1; $j<=10; $j++){
            echo $i * $j . " | ";
        }
        echo '<br>';
    }
    echo '<br>'
?>

<?php
    echo '<table border="1" cellspacing="0" cellpading="5">';
    for($i=1; $i<=10; $i++){
        echo "<tr>";
        for($j=1; $j<=10; $j++) {
            echo '<td>' . ($i*$j) . '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
    echo '<br>'
?>

<?php
    echo '<table border="1" cellspacing="0" cellpading="5">';
    for($i=10; $i<=99; $i++) {
        if (($i-10) % 10 == 0) echo '<tr>';
        echo '<td>' . ($i*$i) . '</td>';
        if (($i-10)%10==9) echo '</tr>';
    }
    echo '<br>';
?>

<?php
    $a = 5;
    $b = 10;
    $border = '*';
    $fill = '#';
    for($i = 1; $i <= $a; $i++) {
        for($j = 1; $j <= $b; $j++) {
            if($i == 1 || $i == $a || $j == 1 || $j == $b) {
                echo $border;
            } else {
                echo $fill;
            }
        }
        echo '<br>';
    }
    echo '<br>';
?>

<?php
    $n = 432;
    $product = 1;
    $x = abs($n);
    if($x === 0) {
        $product = 0;
    } else {
        while ($x > 0){
            $product *= $x % 10;
            $x = intdiv($x, 10);
        }
    }
    echo "Произведение цифр числа $n = $product";
    echo '<br>';
?>

<?php
    if(isset($_POST['n'])) {
        $n = (int) $_POST['n'];
        $divisors = [];
        for($i = 1; $i <= $n; $i++) {
         if ($n % $i == 0) {
            $divisors[] = $i;
         }
        }
        echo "<p><b>Делители числа $n:</b> ";
    implode(", ", $divisors);
    echo '</p>';
    }
?>

<form metod='post'>
    Введите число: <input type="number" name="n">
    <button type="submit">Найти делители</button>
    
</form>