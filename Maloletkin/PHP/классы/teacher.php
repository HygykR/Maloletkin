<?php

class Teacher extends User{
    private $subjects;

    public function __construct($name, $subject) {
        parent::__construct($name, 'teacher');
        $this->subjects = $subject;
    }
    
    public function getSubjects() {
        return $this->subjects;
    }
    
    public function sayAboutMe() {
        return "Я учитель: {$this->name}, предмет: {$this->subjects}";
    }
}