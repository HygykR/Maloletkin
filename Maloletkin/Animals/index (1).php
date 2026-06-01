<?php
require_once('Animal.php');
require_once('Mammals.php');
require_once('Bird.php');
require_once('NotFlyBird.php');
require_once('User.php');
require_once('ZooKeeper.php');
require_once('Zoo.php');

$zoo = new Zoo("Мой Зоопарк");

$keeper1 = new ZooKeeper("Иван Петров");
$keeper2 = new ZooKeeper("Анна Сидорова"); 
$keeper3 = new ZooKeeper("Сергей Козлов");

$zoo->addKeeper($keeper1);
$zoo->addKeeper($keeper2);
$zoo->addKeeper($keeper3);

$animal1 = new Animal(70, 200, 'Тигр ');
$animal2 = new Animal(3, 10, 'Муравей ');

$bird1 = new Bird(10, 100, 'Воробей ', 20);
$bird2 = new Bird(30, 150, 'Орел ', 180);

$notFlyBird1 = new NotFlyBird(40, 50, 'Пингвин ', 100);
$notFlyBird2 = new NotFlyBird(120, 80, 'Страус ', 200);

$mammal1 = new Mammals(50, 40, 'Мартышка ');
$mammal2 = new Mammals(80, 60, 'Лев ');

$keeper1->addAnimal($animal1);
$keeper1->addAnimal($animal2);

$keeper2->addAnimal($bird1);
$keeper2->addAnimal($bird2);

$keeper3->addAnimal($notFlyBird1);
$keeper3->addAnimal($notFlyBird2);
$keeper3->addAnimal($mammal1);

$zoo->printZoo();

if (file_exists('animals.json')) {
    $jsonData = file_get_contents('animals.json');
    $animalsData = json_decode($jsonData, true);
    
    $zooJson = new Zoo("Зоопарк из JSON");
    
    $keeperJson1 = new ZooKeeper("Алексей Птицын");
    $keeperJson2 = new ZooKeeper("Мария Млекопитающие");
    $keeperJson3 = new ZooKeeper("Олег Разные");
    
    $zooJson->addKeeper($keeperJson1);
    $zooJson->addKeeper($keeperJson2);
    $zooJson->addKeeper($keeperJson3);
    
    foreach ($animalsData as $animalData) {
        $animal = null;
        
        switch ($animalData['class']) {
            case 'Animal':
                $animal = new Animal(
                    $animalData['height'],
                    $animalData['weight'],
                    $animalData['type']
                );
                break;
                
            case 'Bird':
                $animal = new Bird(
                    $animalData['height'],
                    $animalData['weight'],
                    $animalData['type'],
                    $animalData['wingspan']
                );
                break;
                
            case 'NotFlyBird':
                $animal = new NotFlyBird(
                    $animalData['height'],
                    $animalData['weight'],
                    $animalData['type'],
                    $animalData['wingspan']
                );
                break;
                
            case 'Mammals':
                $animal = new Mammals(
                    $animalData['height'],
                    $animalData['weight'],
                    $animalData['type']
                );
                break;
        }
        
        if ($animal) {
            if ($animalData['class'] == 'NotFlyBird') {
                $keeperJson1->addAnimal($animal);
            } elseif ($animalData['class'] == 'Bird') {
                $keeperJson2->addAnimal($animal);
            } elseif ($animalData['class'] == 'Mammals' || $animalData['class'] == 'Animal') {
                $keeperJson3->addAnimal($animal);
            }
        }
    }
    
    $zooJson->printZoo();
    
    echo "<p>Данные успешно загружены из animals.json</p>";
    echo "<p>Всего животных в JSON файле: " . count($animalsData) . "</p>";
} else {
    echo "Файл animals.json не найден. Создайте его с данными животных.</p>";
}

$user1 = new User('Вася');
$user1->addAnimal($bird1);
$user1->addAnimal($mammal1);
$user1->sayAboutMe();