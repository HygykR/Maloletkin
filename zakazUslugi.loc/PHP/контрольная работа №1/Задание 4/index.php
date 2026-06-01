<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <form method="GET">
            <label>Введите строку с буквами и цифрами: <input type="text" name="task4"></label><br>
            <input type="submit" value="Найти последовательность"><br><br>
        </form>
         <?php
        function getNumSeq($str) {
            $maxLength = 0;
            $currentLength = 0;
            for ($i = 0; $i < strlen($str); $i++) {
                if (ctype_digit($str[$i])) {
                    $currentLength++;
                    if ($currentLength > $maxLength) {
                        $maxLength = $currentLength;
                    }
                } else {
                    $currentLength = 0;
                }
            }
            return $maxLength;
        }
        if (isset($_GET['task4']) && !empty(trim($_GET['task4']))) {
            $inputString = trim($_GET['task4']);
            echo "<h3>Результат проверки:</h3>";
            $result = getNumSeq($inputString);
            echo "Строка: \"$inputString\"<br>";
            echo "Длина наибольшей последовательности цифр: <strong>$result</strong><br>";
        } else {
            echo "<p>Введите строку в форму выше для проверки</p>";
        }
        ?>
    </body>
</html>