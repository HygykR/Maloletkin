<?php

class Bird extends Animal{
    public $wingspan;
    public function __construct($height, $weight, $type, $wingspan){
        parent::__construct($height, $weight, $type);
        $this->wingspan = $wingspan;
    }
    public function sayhello(){
        parent::sayHello();
        echo ", у меня крылья $this->wingspan см";
    }
}