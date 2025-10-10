<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Формулы</title>
</head>
<body>
    <?php
        echo'<h1>Задание 1</h1>';
        echo'<h1>Формула 1</h1>';
        $a = 3;
        $b = 4;
        $c = 2;
        $d = 6;
        echo "a = $a", '<br>';
        echo "b = $b", '<br>';
        echo "c = $c", '<br>';
        echo "d = $d", '<br>';
        $x = ($a/$c)*($b/$d)-($a*$b-$c/$c*$d);
        echo "Формула: (a/c)*(b/d)-(ab-c/cd)", '<br>';
        echo "Подставим числа: ($a/$c)*($b/$d)-($a*$b-$c/$c*$d)", '<br>';
        echo "Ответ: $x", '<br>';
        echo '<br>'; 

        echo'<h1>Формула 2</h1>';
        $x = 5;
        $y = 3;
        echo "x = $x", '<br>';
        echo "y = $y", '<br>';
        $a = ($x+$y)/($y+1)-($x*$y-12)/(34+$x);
        echo "Формула: (x+y)/(y+1)-(xy-12)/(34+x)", '<br>';
        echo "Подставим числа: ($x+$y)/($y+1)-($x*$y-12)/(34+$x)", '<br>';
        echo "Ответ: $a", '<br>';
        echo '<br>';

        echo'<h1>Формула 3</h1>';
        $x = 2;
        $y = 3;
        echo "x = $x", '<br>';
        echo "y = $y", '<br>';
        $w = (($x+1)/($x-1))**$x+18*$x*$y**2;
        echo  "Формула: ((x+1)/(x-1))**x + 18xy**2", '<br>';
        echo "Подставим числа: (($x+1)/($x-1))**$x+18*$x*$y**2", '<br>';
        echo "Ответ: $w", '<br>';
        echo '<br>';

        echo'<h1>Формула 4</h1>';
        $x = 2;
        $y = 1;
        echo "x = $x", '<br>';
        echo "y = $y", '<br>';
        $l = ((1+(1)/($x**2)))**$x-12*$x**2*$y;
        echo "Формула: ((1+(1)/(x**2)))**x-12*x**2*y", '<br>';
        echo "Подставим числа: ((1+(1)/($x**2)))**$x-12*$x**2*$y", '<br>';
        echo "Ответ: $l", '<br>';
        echo '<br>';

        echo '<h1>Задание 2</h1>';


    ?>
    
</body>
</html>