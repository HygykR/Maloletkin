<?php

class User{
    private $name;
    private $animals = [];
    public function __construct($name){
        $this->name = $name;
    }
    public function getName() {
        return $this->name;
    }
    public function sayAboutMe(){
        echo "Меня зовут: $this->name <br>";
        echo "Мои животные: <br>";
        foreach($this->animals as $animal){
            $animal->sayHello();
            echo '<br>';
        }
    }
    public function addAnimal($animal){
        $this->animals[] = $animal;
    }
    private function setName($newName){
        if($newName){
            $this->name = $newName;
            return true;
        }
        return false;
    }

}