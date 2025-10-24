<?php
namespace Tests;
use PHPUnit\Framework\TestCase;
require 'Задание 1\index.php';
require 'Задание 2\index.php';


class IndexTest extends TestCase
{
    public function testIndex1(): void
    {
       $str = 'Мат и тут и там';
       $result = palindrom($str);
       self::assertEquals(true,$result);
    }
    public function testIndex1_1(): void
    {
       $str = 'Мат и тут и тfsd fsefdf ';
       $result = palindrom($str);
       self::assertEquals(false,$result);
    }
    public function testIndex2(): void
    {
      $arr = [[
         'name'=>'Вася',
         'surname'=>'Иванов',
         'height'=>185,
         'weight'=> 78
    ],[
         'name'=> 'Коля',
         'surname'=> 'Смирнов',
         'height'=> 168,
         'weight'=> 64
    ],[
         'name'=> 'Андрей',
         'surname'=> 'Петров',
         'height'=> 171,
         'weight'=> 68
    ],[
         'name'=> 'Иван',
         'surname'=>'Сидоров',
         'height'=>  174,
         'eight'=> 71
    ]
       ];
       
       $result = sectionBasket($arr);
       self::assertEquals(3,$result);
    }
}

