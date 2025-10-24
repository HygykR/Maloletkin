




<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
    <body>
        <form action="">
            <label>Введите слово: <input type="text" name="task1"></label><br>
            <input type="submit"><br><br>
        </form>
        <?php
        function palindrom($str) {
            $cleanedStr = str_replace(' ', '', strtolower($str));
            $result = $cleanedStr === strrev($cleanedStr);
            echo "Строка: \"$str\" - ", ($result ? 'палиндром' : 'не палиндром'), "<br>";
            return $result;
        }
        if (isset($_GET['task1']) && !empty(trim($_GET['task1']))) {
            $inputWord = trim($_GET['task1']);
            echo "<h3>Результат проверки:</h3>";
            palindrom($inputWord);
        } else {
            echo "<p>Введите слово в форму выше для проверки</p>";
        }
        ?>
    </body>
    </head>
</html>