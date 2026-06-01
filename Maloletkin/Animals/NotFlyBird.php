<?php

class NotFlyBird extends Bird{
    public function sayhello(){
        parent::sayHello();
        echo ", я не могу летать ):";
    }
}