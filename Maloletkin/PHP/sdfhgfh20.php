<?php
class User2 {
    public $firstName, $lastName, $email;
    private $role = 'User';
    
    public function sayAboutMe() {
        echo "$this->firstName $this->lastName";
    }
    
    public static function makeAdmin($user) {
        $user->role = 'Admin';
    }
    
    public static function createAdmin($firstName, $lastName, $email) {
        $admin = new User2();
        $admin->firstName = $firstName;
        $admin->lastName = $lastName;
        $admin->email = $email;
        $admin->role = 'Admin';
        return $admin;
    }
    
    public function getRole() {
        return $this->role;
    }
}

class Student extends User2 {
    private $cource, $groupe;
    private static $numberStudents = 0;
    
    public function __construct($firstName, $lastName, $cource, $groupe) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->cource = $cource;
        $this->groupe = $groupe;
        self::$numberStudents++;
    }
    
    public function __destruct() {
        self::$numberStudents--;
    }
    
    public function getCource() { return $this->cource; }
    public function getGroupe() { return $this->groupe; }
    
    public static function getNumberStudents() {
        return self::$numberStudents;
    }
    
    public static function printStudentInfo($student) {
        echo "{$student->firstName} {$student->lastName}, Курс: {$student->cource}, Группа: {$student->groupe}" . '<br>';
    }
    
    public function sayAboutMe() {
        echo "СТУДЕНТ: $this->firstName $this->lastName, Курс: $this->cource, Группа: $this->groupe" . '<br>';
    }
}
class Teacher extends User2 {
    public $subjects = [];
    
    public function __construct($firstName, $lastName, $subjects) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->subjects = $subjects;
    }
    
    public function sayAboutMe() {
        echo "ПРЕПОДАВАТЕЛЬ: $this->firstName $this->lastName, Предметы: " . implode(', ', $this->subjects) . '<br>';
    }
}
class Manager extends User2 {
    public $position;
    public $jobDuties = [];
    
    public function __construct($firstName, $lastName, $position, $jobDuties) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->position = $position;
        $this->jobDuties = $jobDuties;
    }
    
    public function sayAboutMe() {
        echo "АДМИНИСТРАЦИЯ: $this->firstName $this->lastName, . '<br>' Должность: $this->position, Обязанности: " . implode(', ', $this->jobDuties) . '<br>';
    }
}
$persons = [
    new Student("Алексей", "Иванов", "2", "ИТ-21"),
    new Student("Мария", "Сидорова", "3", "ФИ-31"),
    new Teacher("Ольга", "Петрова", ["Математика", "Физика"]),
    new Teacher("Дмитрий", "Смирнов", ["Информатика"]),
    new Manager("Екатерина", "Козлова", "Директор", ["Управление", "Планирование"]),
    new Manager("Андрей", "Васильев", "Завуч", ["Расписание", "Контроль"]),
    new Student("Ирина", "Антонова", "1", "ЭК-11")
];
usort($persons, function($a, $b) {
    return strcmp($a->firstName, $b->firstName);
});

echo "Все персоны (отсортированы по имени):" . '<br>';
foreach($persons as $person) {
    $person->sayAboutMe();
}
echo "--- РОЗЫГРЫШ ПРИЗА ---";
$winnerIndex = rand(0, count($persons) - 1);
$winner = $persons[$winnerIndex];

echo "ПОБЕДИТЕЛЬ: ";
$winner->sayAboutMe();
?>