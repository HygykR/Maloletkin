<?php

class Mammals extends Animal{
    public function sayhello(){
        parent::sayHello();
        echo ", я млекопитающее.";
    }
}