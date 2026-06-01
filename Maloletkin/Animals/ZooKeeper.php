<?php

class ZooKeeper {
    private $name;
    private $animals = [];

    public function __construct($name) {
        $this->name = $name;
    }

    public function addAnimal($animal) {
        $this->animals[] = $animal;
    }

    public function printMyAnimals() {
        echo "Смотритель: {$this->name}<br>";
        echo "Животные под наблюдением:<br>";
        
        if (empty($this->animals)) {
            echo "  Нет животных<br>";
        } else {
            foreach ($this->animals as $index => $animal) {
                $number = $index + 1;
                echo "  {$number}. ";
                $animal->sayHello();
                echo "<br>";
            }
        }
        echo "Всего животных: " . count($this->animals) . "<br>";
        echo "---<br>";
    }

    public function getName() {
        return $this->name;
    }

    public function getAnimals() {
        return $this->animals;
    }
}