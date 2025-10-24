<?php
//Дана строка. Проверить является ли она палиндромом (читается одинако слева и справа).
//Результат вместе с исходной строкой вывести на экран.
//Реализуйте функцию palindrom($str), принимающую строку и выводящую true,
//если строка палиндром и false, если нет.


function palindrom($str) {
    $cleanStr = str_replace(' ', '', strtolower($str));
    $result = ($cleanStr == strrev($cleanStr));
    echo "Строка: '$str'<br>";
    echo "Результат: ", ($result ? 'true' : 'false') . "<br><br>";
    
    return $result;
}
palindrom("радар");
palindrom("А роза упала на лапу Азора");
palindrom("привет");
palindrom("12321");
?>