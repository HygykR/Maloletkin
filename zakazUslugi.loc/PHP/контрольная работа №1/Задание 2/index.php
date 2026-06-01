


<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <form method="GET">
            <label>Введите строку с точкой с запятой: <input type="text" name="inputString"></label><br>
            <input type="submit" value="Подсчитать"><br><br>
        </form>
        <?php
        function countLettersAfter($str, $sim) {
            $pos = strpos($str, $sim);
            if ($pos === false) {
                return "Символ '$sim' не найден в строке";
            }
            $count = strlen($str) - $pos - 1;
            return $count;
        }
        if (isset($_GET['inputString']) && !empty(trim($_GET['inputString']))) {
            $inputString = trim($_GET['inputString']);
            $symbol = ';';
            echo "<h3>Результат проверки:</h3>";
            $result = countLettersAfter($inputString, $symbol);
            echo "Строка: \"$inputString\"<br>";
            echo "Количество символов после '$symbol': $result<br>";
        } else {
            echo "<p>Введите строку в форму выше для проверки</p>";
        }
        ?>
    </body>
</html>