<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <?php
        function sectionBasket($arr) {
            $count = 0;
            foreach ($arr as $student) {
                if ($student['height'] > 170) {
                    $count++;
                }
            }
            return $count;
        }
        $arr = [
            [
                'name' => 'Вася',
                'surname' => 'Иванов',
                'height' => 185,
                'weight' => 78
            ],
            [
                'name' => 'Петя',
                'surname' => 'Петров',
                'height' => 168,
                'weight' => 65
            ],
            [
                'name' => 'Маша',
                'surname' => 'Сидорова',
                'height' => 175,
                'weight' => 60
            ],
            [
                'name' => 'Коля',
                'surname' => 'Козлов',
                'height' => 172,
                'weight' => 70
            ],
            [
                'name' => 'Саша',
                'surname' => 'Смирнов',
                'height' => 160,
                'weight' => 55
            ]
        ];
        $result = sectionBasket($arr);
        echo "<h3>Результат:</h3>";
        echo "Количество учеников, подходящих для баскетбольной секции (рост > 170 см): <strong>$result</strong><br><br>";
        echo "<h3>Список учеников:</h3>";
        echo "<table border='1' cellpadding='5'>";
        echo "<tr><th>Имя</th><th>Фамилия</th><th>Рост</th><th>Вес</th><th>Подходит</th></tr>";
        foreach ($arr as $student) {
            $suitable = $student['height'] > 170 ? 'Да' : 'Нет';
            echo "<tr>";
            echo "<td>{$student['name']}</td>";
            echo "<td>{$student['surname']}</td>";
            echo "<td>{$student['height']} см</td>";
            echo "<td>{$student['weight']} кг</td>";
            echo "<td>{$suitable}</td>";
            echo "</tr>";
        }
        echo "</table>";
        ?>
    </body>
</html>
