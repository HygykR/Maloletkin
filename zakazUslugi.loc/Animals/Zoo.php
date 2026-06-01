<?php
require_once 'ZooKeeper.php';

class Zoo {
    private $name;
    private $zooKeepers = [];

    public function __construct($name) {
        $this->name = $name;
    }

    public function addKeeper($keeper) {
        $this->zooKeepers[] = $keeper;
    }

    public function printZoo() {
        echo "<h2>Зоопарк: {$this->name}</h2>";
        echo "========================<br>";
        
        foreach ($this->zooKeepers as $keeper) {
            $keeper->printMyAnimals();
        }
    }

    public function getName() {
        return $this->name;
    }

    public function getKeepers() {
        return $this->zooKeepers;
    }
}