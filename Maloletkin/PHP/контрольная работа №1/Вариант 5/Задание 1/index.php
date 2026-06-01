<?php
function romeToDec($str) {
    $roman = array(
        'M' => 1000,
        'D' => 500,
        'C' => 100,
        'L' => 50,
        'X' => 10,
        'V' => 5,
        'I' => 1
    );
    
    $result = 0;
    $prevValue = 0;
    for ($i = strlen($str) - 1; $i >= 0; $i--) {
        $currentChar = $str[$i];
        $currentValue = $roman[$currentChar];
        if ($currentValue < $prevValue) {
            $result -= $currentValue;
        } else {
            $result += $currentValue;
        }
        
        $prevValue = $currentValue;
    }
    
    return $result;
}
?>
<form method="post">
    Введите римское число: <input type="text" name="roman_number">
    <input type="submit" value="Преобразовать">
</form>

<?php
if ($_POST && isset($_POST['roman_number'])) {
    $input = strtoupper($_POST['roman_number']);
    $result = romeToDec($input);
    echo "Результат: ", $result;
}
?>