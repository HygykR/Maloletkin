<?php
class User1 {
    public $firstName, $lastName, $email;
    private $role = 'User';
    
    public function sayAboutMe() {
        echo "$this->firstName $this->lastName";
    }
    public static function makeAdmin($user) {
        $user->role = 'Admin';
    }
    public static function createAdmin($firstName, $lastName, $email) {
        $admin = new User1();
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

class Student extends User1 {
    private $cource, $groupe;
    private static $numberStudents = 0;
    
    public function __construct($firstName, $lastName, $cource, $groupe) {
        $this->firstName = $this->correctName($firstName);
        $this->lastName = $this->correctName($lastName);
        $this->cource = $cource;
        $this->groupe = $groupe;
        self::$numberStudents++;
    }
    
    public function __destruct() {
        self::$numberStudents--;
    }
    
    public function getCource() { return $this->cource; }
    public function setCource($cource) { $this->cource = $cource; }
    
    public function getGroupe() { return $this->groupe; }
    public function setGroupe($groupe) { $this->groupe = $groupe; }
    public static function getNumberStudents() {
        return self::$numberStudents;
    }
    public static function printStudentInfo($student) {
        echo "{$student->firstName} {$student->lastName}, Курс: {$student->cource}, Группа: {$student->groupe}" . '<br>';
    }
    
    public function sayAboutMe() {
        parent::sayAboutMe();
        echo "Курс: $this->cource, Группа: $this->groupe" . '<br>';
    }
    
    private function correctName($name) {
        $name = strip_tags($name);
        return substr($name, 0, 128);
    }
}
$students = [];
$students[] = new Student("Мария", "Сидорова", "2", "ИТ-21");
$students[] = new Student("Алексей", "Иванов", "3", "ФИ-31");
$students[] = new Student("Ольга", "Петрова", "1", "ЭК-11");
$students[] = new Student("Дмитрий", "Смирнов", "4", "МТ-41");
$students[] = new Student("Екатерина", "Козлова", "2", "ИТ-22");

echo "Количество студентов: " . Student::getNumberStudents() . '<br>';
unset($students[3]);
unset($students[4]);
echo "После удаления: " . Student::getNumberStudents() . '<br>';
echo "Оставшиеся студенты:" . '<br>';
foreach($students as $student) {
    Student::printStudentInfo($student);
}
User1::makeAdmin($students[0]);
echo "Роль студента {$students[0]->firstName}: " . $students[0]->getRole() . '<br>';
$newAdmin = User1::createAdmin("Андрей", "Админов", "admin@mail.ru");
echo "Новый администратор: {$newAdmin->firstName} {$newAdmin->lastName}, Роль: {$newAdmin->getRole()}";
?>