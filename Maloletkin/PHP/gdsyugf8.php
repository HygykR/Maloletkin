<?php
echo '<h1>Задание 1</h1>';
$array = [
    "monday" => "понедельник ",
    "tuesday" => "вторник ",
    "wednesday" => "среда ",
    "thursday" => "четверг ",
    "friday" => "пятница ",
    "saturday" => "суббота ",
    "sunday" => "воскресенье ",
    "hello" => "привет ",
    "goodbye" => "до свидания ",
    "thank you" => "спасибо "
];
foreach ($array as $english => $russian) {
    echo "$english - $russian <br>";
}
?>

<?php
echo '<h1>Задание 2</h1>';
$dictionary = [
    "monday" => "понедельник",
    "tuesday" => "вторник",
    "wednesday" => "среда",
    "thursday" => "четверг",
    "friday" => "пятница",
    "saturday" => "суббота",
    "sunday" => "воскресенье",
    "hello" => "привет",
    "goodbye" => "до свидания",
    "thank you" => "спасибо"
];
$searchWord = "среда";
function translateToEnglish($dictionary, $rusWord) {
    $englishWords = array_keys($dictionary, $rusWord);
    if (!empty($englishWords)) {
        echo "$rusWord - " . $englishWords[0] . "";
    } else {
        echo "$rusWord - В словаре нет такого слова";
    }
}
translateToEnglish($dictionary, $searchWord);
?>

<?php
echo '<h1>Задание 3</h1>';
$dictionary = [
    "monday " => "понедельник ",
    "tuesday " => "вторник ",
    "wednesday " => "среда ",
    "thursday " => "четверг ",
    "friday " => "пятница ",
    "saturday " => "суббота ",
    "sunday " => "воскресенье ",
    "hello " => "привет ",
    "goodbye " => "до свидания ",
    "thank you " => "спасибо "
];

function bidirectionalTranslate($dictionary, $word) {
    $wordLower = mb_strtolower($word);
    foreach ($dictionary as $eng => $rus) {
        if (mb_strtolower($eng) === $wordLower) {
            echo "$word - $rus";
            return;
        }
    }
    foreach ($dictionary as $eng => $rus) {
        if (mb_strtolower($rus) === $wordLower) {
            echo "$word - $eng";
            return;
        }
    }
    echo "$word - В словаре нет такого слова";
}
bidirectionalTranslate($dictionary, "monday ");
bidirectionalTranslate($dictionary, "пятница ");
bidirectionalTranslate($dictionary, "hello ");
bidirectionalTranslate($dictionary, "привет ");
bidirectionalTranslate($dictionary, "кракозябра ");
?>

<?php
echo '<h1>Задание 5</h1>';
$string = "banana";
$charCount = [];
for ($i = 0; $i < strlen($string); $i++) {
    $char = $string[$i];
    if (isset($charCount[$char])) {
        $charCount[$char]++;
    } else {
        $charCount[$char] = 1;
    }
}
foreach ($charCount as $char => $count) {
    echo "'$char' => $count <br>";
}
?>

<?php
echo '<h1>Задание 6</h1>';

$array = [
    "monday" => "понедельник ",
    "tuesday" => "вторник ",
    "wednesday" => "среда ",
    "thursday" => "четверг ",
    "friday" => "пятница ",
    "saturday" => "суббота ",
    "sunday" => "воскресенье ",
    "hello" => "привет ",
    "goodbye" => "до свидания ",
    "thank you" => "спасибо "
];
$flipped_array = array_flip($array);
foreach ($flipped_array as $russian => $english) {
    echo "$russian - $english <br>";
}
?>