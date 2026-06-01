<?php
class User {
    private $firstName;
    private $lastName;
    private $email;
    public function __construct($firstName, $lastName, $email) {
        $this->firstName = $this->correctName($firstName);
        $this->lastName = $this->correctName($lastName);
        $this->email = $email;
        if (!$this->isEmailCorrect($email)) {
            echo "Ошибка: Email '$email' некорректен";
        }
    }
    public function getFirstName() {
        return $this->firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }
    public function getEmail() {
        return $this->email;
    }
    public function setFirstName($firstName) {
        $this->firstName = $this->correctName($firstName);
    }
    public function setLastName($lastName) {
        $this->lastName = $this->correctName($lastName);
    }

    public function setEmail($email) {
        $this->email = $email;
        if (!$this->isEmailCorrect($email)) {
            echo "Ошибка: Email '$email' некорректен";
        }
    }
    public function sayAboutMe() {
        echo $this->firstName, " ", $this->lastName, " ";
    }
    private function isEmailCorrect($email) {
        return strpos($email, '@') !== false && strpos($email, '.') !== false;
    }

    private function correctName($name) {
        $name = strip_tags($name);
        if (strlen($name) > 128) {
            return substr($name, 0, 128);
        }
        return $name;
    }
}
echo "Создание пользователей: ";
$user1 = new User("Иван", "Петров", "ivan@example.com");
$user2 = new User("Мария", "Сидорова", "mariaexample.com");

echo "Изменение данных: <br>";
$user1->setFirstName("Алексей");
$user1->setEmail("alexey@example.com");
$user2->setEmail("maria@test.com");
echo "Вывод информации: <br>";
echo "Пользователь 1: <br>", $user1->getFirstName(), " ", $user1->getLastName(), " (", $user1->getEmail(), ")";
echo "Пользователь 2: <br>", $user2->getFirstName(), " ", $user2->getLastName(), " (", $user2->getEmail(), ")";
?>