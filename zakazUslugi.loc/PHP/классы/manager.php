<?php

class Manager extends User{
    private $position;
    private $duties;
    
    public function __construct($name, $position, $duties) {
        parent::__construct($name, 'manager');
        $this->position = $position;
        $this->duties = $duties;
    }
    
    public function getPosition() {
        return $this->position;
    }
    
    public function getDuties() {
        return $this->duties;
    }
    
    public function sayAboutMe() {
        return "Я менеджер: {$this->name}, должность: {$this->position}, обязанность: {$this->duties}";
    }
}