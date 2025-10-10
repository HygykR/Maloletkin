<?php
$str = 'Hello!';
for($i=0; $i<mb_strlen($str); $i++){
    echo $str[$i], '<br>';
}
echo $str, '<br>';
echo strlen($str);
?>

<?php
echo '<h2>Задание 1</h2>';
$str = "Hello (world) example";
$result = "";
$start = -1;
$end = -1;
for ($i = 0; $i < strlen($str); $i++) {
    if ($str[$i] == '(') {
        $start = $i;
    } elseif ($str[$i] == ')') {
        $end = $i;
        break;
    }
}
if ($start != -1 && $end != -1 && $start < $end) {
    for ($i = $start + 1; $i < $end; $i++) {
        $result .= $str[$i];
    }
}
echo $result;
?>

<?php
echo '<h2>Задание 2</h2>';
$str = "Меня зовут Владимир.";
$wordCount = 0;
$inWord = false;
for ($i = 0; $i < strlen($str); $i++) {
    if ($str[$i] != ' ' && $str[$i] != '.' && !$inWord) {
        $wordCount++;
        $inWord = true;
    }
    elseif ($str[$i] == ' ') {
        $inWord = false;
    }
    elseif ($str[$i] == '.') {
        break;
    }
}
echo "Количество слов: ", $wordCount;
?>

<?php
echo '<h2>Задание 3</h2>';
$str = "apple window radar deed noon civic";
$currentWord = "";
$result = "";

for ($i = 0; $i < strlen($str); $i++) {
    if ($str[$i] != ' ') {
        $currentWord .= $str[$i];
    }
    if ($str[$i] == ' ' || $i == strlen($str) - 1) {
        if ($currentWord != "") {
            $firstChar = $currentWord[0];
            $lastChar = $currentWord[strlen($currentWord) - 1];
            
            if ($firstChar == $lastChar) {
                $result .= $currentWord . " ";
            }
            $currentWord = "";
        }
    }
}

echo "Слова, начинающиеся и заканчивающиеся на одну букву: ", trim($result);
?>

<?php
echo '<h2>Задание 4</h2>';
$str = "Hello world";
$uniqueChars = "";
$count = 0;

for ($i = 0; $i < strlen($str); $i++) {
    $currentChar = $str[$i];
    $found = false;
    for ($j = 0; $j < strlen($uniqueChars); $j++) {
        if ($uniqueChars[$j] == $currentChar) {
            $found = true;
            break;
        }
    }
    if (!$found) {
        $uniqueChars .= $currentChar;
        $count++;
    }
}

echo "Различные символы: ", $uniqueChars, ' ';
echo "Количество различных символов: ", $count;
?>

<?php
echo '<h2>Задание 5</h2>';
$str = "This is a string with some letters r, k, t for counting";
$countR = 0;
$countK = 0;
$countT = 0;
for ($i = 0; $i < strlen($str); $i++) {
    $char = $str[$i];
    if ($char == 'r' || $char == 'R') {
        $countR++;
    } elseif ($char == 'k' || $char == 'K') {
        $countK++;
    } elseif ($char == 't' || $char == 'T') {
        $countT++;
    }
}
echo "Букв r: ", $countR, "<br>";
echo "Букв k: ", $countK, "<br>";
echo "Букв t: ", $countT, "<br>";
echo "Всего: ", ($countR + $countK + $countT);
?>

<?php
echo '<h2>Задание 6</h2>';
$str = "Пример строки с словами разной длины";
$currentWord = "";
$minLength = PHP_INT_MAX;
$maxLength = 0;
for ($i = 0; $i < strlen($str); $i++) {
    if ($str[$i] != ' ') {
        $currentWord .= $str[$i];
    }
    if ($str[$i] == ' ' || $i == strlen($str) - 1) {
        if ($currentWord != "") {
            $wordLength = strlen($currentWord);
            if ($wordLength < $minLength) {
                $minLength = $wordLength;
            }
            if ($wordLength > $maxLength) {
                $maxLength = $wordLength;
            }
            
            $currentWord = "";
        }
    }
}
echo "Длина самого короткого слова: ", $minLength, "<br>";
echo "Длина самого длинного слова: ", $maxLength;
?>

<?php
echo '<h2>Задание 7</h2>';
$str = "baaaaabraaaacadaaaabraqaaa";
$currentSequence = 0;
$maxSequence = 0;
for ($i = 0; $i < strlen($str); $i++) {
    if ($str[$i] == 'a') {
        $currentSequence++;
    } else {
        if ($currentSequence > $maxSequence) {
            $maxSequence = $currentSequence;
        }
        $currentSequence = 0;
    }
}
if ($currentSequence > $maxSequence) {
    $maxSequence = $currentSequence;
}
echo "Самая длинная последовательность букв 'a': ", $maxSequence;
?>

<?php
echo '<h2>Задание 8</h2>';
$str = "Привет (мир) это (тестовая) строка";
$result = "";
$inBrackets = false;
for ($i = 0; $i < strlen($str); $i++) {
    if ($str[$i] == '(') {
        $inBrackets = true;
        continue;
    }
    if ($str[$i] == ')') {
        $inBrackets = false;
        continue;
    }
    if (!$inBrackets) {
        $result .= $str[$i];
    }
}
echo "Результат: ", $result;
?>