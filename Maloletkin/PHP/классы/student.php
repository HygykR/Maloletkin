<?php

class Student extends User {
    private $group;

    public function __construct($name, $group) {
        parent:: __construct($name, 'student');
        $this->group = $group;
    }
    
    public function getGroup() {
        return $this->group;
    }
    
    public function sayAboutMe() {
        return "Я студент: {$this->name}, группа: {$this->group}";
    }
}