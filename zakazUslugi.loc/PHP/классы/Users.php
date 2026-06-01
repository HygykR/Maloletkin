<?php
class User {
    protected $name;
    protected $role;

    public function __construct($name, $role){
        $this->name = $name;
        $this->role = $role;
    }
    
    public function getName() {
        return $this->name;
    }
    
    public function getRole() {
        return $this->role;
    }
    
    public function sayAboutMe(){
        echo "Имя: " . $this->name  . ", Роль: " . $this->role . "<br>";
    }
}

// Заменяем require_once на автозагрузчик
spl_autoload_register(function($className) {
    // Преобразуем имя класса в имя файла
    $filename = strtolower($className) . '.php';
    
    if(file_exists($filename)) {
        require_once($filename);
    } else {
        // Если файл не найден в текущей директории, можно поискать в других
        die("Класс $className не найден в файле $filename");
    }
});

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'] ?? '';
    $group = $_POST['group'] ?? '';
    
    if(!empty($name) && !empty($group)) {
        $json = file_get_contents('users1.json');
        $array = json_decode($json, true);
        
        $array['users'][] = [
            'Name' => $name,
            'Group' => $group
        ];
        
        file_put_contents('users1.json', json_encode($array, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        echo "<div style='color:green; margin:10px 0;'>Студент добавлен!</div>";
    }
}
?>

<form method="post">
    <label>Имя студента:</label>
    <input type="text" name="name" required><br>
    <label>Группа:</label>
    <input type="text" name="group" required><br>
    <button type="submit">Добавить студента</button>
</form>

<?php
$json = file_get_contents('users1.json');
$array = json_decode($json, true);

if($array === null) {
    die("Ошибка чтения файла или файл пустой");
}

$users = [];

foreach($array['users'] as $u){
    if(isset($u['Group'])){
        $users[] = new Student($u['Name'], $u['Group']);
    } elseif(isset($u['Subject'])){
        $users[] = new Teacher($u['Name'], $u['Subject']);
    } elseif(isset($u['Position']) && isset($u['Duties'])){
        $users[] = new Manager($u['Name'], $u['Position'], $u['Duties']);
    }
}

echo "<h3>Информация о всех пользователях:</h3><br>";

// Добавляем ссылку "Удалить" к каждому пользователю
foreach($users as $index => $user) {
    echo $user->sayAboutMe();
    // Ссылка "Удалить" с GET-параметром индекса
    echo " [<a href='?delete_index=$index' onclick='return confirm(\"Вы уверены?\")'>Удалить</a>]";
    echo "<br><br>";
}

// Проверяем GET-запрос на удаление
if(isset($_GET['delete_index'])) {
    $deleteIndex = (int)$_GET['delete_index'];
    
    if(isset($users[$deleteIndex])) {
        // Удаляем пользователя из массива
        unset($users[$deleteIndex]);
        $users = array_values($users); // Переиндексация
        
        // Обновляем данные для сохранения
        $newData = [];
        foreach($users as $user){
            if($user instanceof Student){
                $newData[] = [
                    'Name' => $user->getName(),
                    'Group' => $user->getGroup()
                ];
            } elseif($user instanceof Teacher){
                $newData[] = [
                    'Name' => $user->getName(),
                    'Subject' => $user->getSubjects()
                ];
            } elseif($user instanceof Manager){
                $newData[] = [
                    'Name' => $user->getName(),
                    'Position' => $user->getPosition(),
                    'Duties' => $user->getDuties()
                ];
            }
        }
        
        // Записываем в users1.json
        file_put_contents('users1.json', json_encode(['users' => $newData], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        
        echo "<div style='color:red; margin:10px 0;'>Пользователь удален!</div>";
        
        // Обновляем массив из файла
        $json = file_get_contents('users1.json');
        $array = json_decode($json, true);
        
        // Пересоздаем массив пользователей
        $users = [];
        foreach($array['users'] as $u){
            if(isset($u['Group'])){
                $users[] = new Student($u['Name'], $u['Group']);
            } elseif(isset($u['Subject'])){
                $users[] = new Teacher($u['Name'], $u['Subject']);
            } elseif(isset($u['Position']) && isset($u['Duties'])){
                $users[] = new Manager($u['Name'], $u['Position'], $u['Duties']);
            }
        }
    }
}

// Обновляем users1.json
$newDataForFile = [];
foreach($users as $user){
    if($user instanceof Student){
        $newDataForFile[] = [
            'Name' => $user->getName(),
            'Group' => $user->getGroup()
        ];
    } elseif($user instanceof Teacher){
        $newDataForFile[] = [
            'Name' => $user->getName(),
            'Subject' => $user->getSubjects()
        ];
    } elseif($user instanceof Manager){
        $newDataForFile[] = [
            'Name' => $user->getName(),
            'Position' => $user->getPosition(),
            'Duties' => $user->getDuties()
        ];
    }
}

file_put_contents('users1.json', json_encode(['users' => $newDataForFile], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
?>

<?php
if(file_exists('users1.json')) {
    $json_original = file_get_contents('Users.json');
    $original_data = json_decode($json_original, true);
    
    $new_students = [];
    foreach($users as $user){
        if($user instanceof Student){
            $new_students[] = [
                'Name' => $user->getName(),
                'Group' => $user->getGroup()
            ];
        }
    }
    
    $original_data['students'] = $new_students;
    
    file_put_contents('Users.json', json_encode($original_data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    echo "<div style='color:blue; margin:10px 0;'>Файл Users.json обновлен</div>";
}
?>