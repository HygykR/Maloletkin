<?php
function getArrayfamily($arr, $minPrice, $maxPrice){
  $result = [];
  foreach ($arr as $candy){
    if($candy['price'] >= $minPrice && $candy['price'] <= $maxPrice){
      $priceForWeight = ($candy['price'] * $candy['weight']) / 1000;
      $priceInc = 0;
      if($priceForWeight > 0){
        $priceInc = (($candy['priceForPack'] - $priceForWeight) / $priceForWeight) * 100;
        $priceInc = round($priceInc, 1);
      }
      $result[] = [
        'title' => $candy['title'],
        'weight' => $candy['weight'],
        'priceForPack' => $candy['priceForPack'],
        'priceInc' => $priceInc
      ];  
    }
  }
  return $result;
}
$arr = [
  [
    'title' => 'Минка',
    'art' => 10002512,
    'price' => 350,
    'weight' => 500,
    'priceForPack' => 100,
  ],
  [
    'title' => 'Ромашка',
    'art' => 10002513,
    'price' => 450,
    'weight' => 300,
    'priceForPack' => 150,
  ],
  [
    'title' => 'Василек',
    'art' => 10002513,
    'price' => 250,
    'weight' => 540,
    'priceForPack' => 120,
  ],
];
$result = getArrayfamily($arr, 300, 500);
echo 'Конфеты с ценой за кг от 300 до 500р: ';
print_r($result);
?>
