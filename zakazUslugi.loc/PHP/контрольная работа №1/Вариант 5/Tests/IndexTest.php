<?php
namespace Tests;
use PHPUnit\Framework\TestCase;
require 'Задание 1\index.php';
require 'Задание 2\index.php';


class IndexTest extends TestCase
{
    public function testIndex1(): void
    {
      $string = "XIX";
       
       $result = romeToDec($string);
       self::assertEquals(19,$result);
    }
    public function testIndex2(): void
    {
      $arr = [[
        'title' => 'Мишка',
        'art' => 10002512,
        'price' => 350,
        'weight' => 500,
        'priceForPack' => 190,
      ],[
        'title' => 'Грильяж',
        'art' => 10002516,
        'price' => 460,
        'weight' => 1500,
        'priceForPack' => 680,
      ],[
        'title' => 'Маска',
        'art' => 1000253,
        'price' => 290,
        'weight' => 300,
        'priceForPack' => 130,
      ],[
        'title' => 'Аленка',
        'art' => 10002514,
        'price' => 520,
        'weight' => 250,
        'priceForPack' => 150,
      ],[
        'title' => 'Ромашка',
        'art' => 10002512,
        'price' => 380,
        'weight' => 400,
        'priceForPack' => 185,
      ]
    ];
       
       $result = getArrayCandy($arr, 300, 500);
       self::assertEquals([
        [
         'title' => 'Мишка',
         'weight' => 500,
         'priceForPack' => 190,
         'priceInc' =>8.6
        ],[       
         'title' => 'Грильяж',
         'weight' => 1500,
         'priceForPack' => 680,
         'priceInc' => -1.4
        ],[
         'title' => 'Ромашка',
         'weight' => 400,
         'priceForPack' => 185,
         'priceInc' => 21.7,
        ]
 
       ],$result);
    }
}

