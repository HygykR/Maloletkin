<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <form method="GET">
            <label>Введите слово для удаления: <input type="text" name="wordToDelete"></label><br>
            <input type="submit" value="Удалить слово"><br><br>
        </form>
        <?php
        function delWord($arr, $word) {
            $result = [];
            foreach ($arr as $item) {
                if ($item !== $word) {
                    $result[] = $item;
                }
            }
            return $result;
        }
        $arr = ['яблоко','груша','вишня','кокос','груша','ананас','арбуз','груша','абрикос','груша','малина','кокос'];
        
        if (isset($_GET['wordToDelete']) && !empty(trim($_GET['wordToDelete']))) {
            $wordToDelete = trim($_GET['wordToDelete']);
            
            echo "<h3>Результат:</h3>";
            echo "Исходный массив: ", implode(', ', $arr), "<br>";
            echo "Слово для удаления: <strong>$wordToDelete</strong><br>";
            $resultArray = delWord($arr, $wordToDelete);
            echo "Результат: ", implode(', ', $resultArray), "<br>";
        } else {
            echo "<p>Исходный массив: ", implode(', ', $arr), "</p>";
            echo "<p>Введите слово для удаления в форму выше</p>";
        }
        ?>
    </body>
</html>