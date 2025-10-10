<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>32875</title>
</head>
<body>
    <?php
    $rectSquare = 0;
    if(isset($_GET['rect'])) {
        $rectSquare = $_GET['len'] * $_GET['width'];
    }
    ?>
    <h1>Решение задач</h1>
    <h2>Задача 1 площадь прямоугольника</h2>
    <form action="">
        <p>Введите длину: <input type = "text" name = "len"></p>
        <p>Введите ширину: <input type = "text" name = "width"></p>
        <input type="submit" value="OK" name="rect">

    </form>
    <p>
        <?= "Площадь прямоугольника = $rectSquare" ?>
    </p>
    <h2>Задача 2</h1>
    <?php
    $rectSquare = 0;
    $cubeVol = 0;
    if(isset($_GET['rect'])) {
        $rectSquare = $_GET['len'] * $_GET['width'];
    }
    $rectSquare = 0;
    $cubeVol = 0;
    if(isset($_GET['cube'])) {
        $cubeVol = $_GET['length']**3;
    }
    ?>
    <h1>Решение задач</h1>
    <h2>Задача 2 объем прямоугольника</h2>
    <form action="">
        <p>Введите длину: <input type = "text" name = "lenght"></p>
        <p>Введите ширину: <input type = "text" name = "width"></p>
        <input type="submit" value="OK" name="cube">
    </form>
</body>
</html>