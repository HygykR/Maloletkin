<?php

class Animal
{
    protected  $height;
    private $weight = 50;

    public static $humor = 'небольшой' ;

    public function __construct($height = 80, $weight = 50, public $type = "Тигр"){
        $this->height = $height;
        $this->weight = $weight;
        $this->type = $type;
    }
    public function __destruct(){
       // echo 'Объект удаляется';
    }
    public function say(){
        return 'rrrrrrrrrrrrr';
    }
    public function sayHello(){
        echo "Привет! Я $this->type";
        echo 'У меня ' . self::$humor . ' юмор!';
    }
    public static function getHumor(){
        return self::$humor;
    }
    public static function about($animal){
        return $animal->type;
    }
}

$tiger = new Animal(70,200,'Тигр');
echo Animal::getHumor();
echo Animal::about($tiger);


