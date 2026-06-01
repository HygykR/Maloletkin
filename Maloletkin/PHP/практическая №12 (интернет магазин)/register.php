<?php
session_start();

$users = json_decode(file_get_contents('users.json'), true);

$message = '';
$showForm = true;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $login = trim($_POST['login']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    if ($password !== $confirm_password) {
        $message = '<div style="color:red">Введенные пароли не совпадают</div>';
    } else {
        $loginExists = false;
        foreach ($users as $user) {
            if ($user['login'] === $login) {
                $loginExists = true;
                break;
            }
        }
        
        if ($loginExists) {
            $message = '<div style="color:red">Этот логин уже занят</div>';
        } else {
            $newUser = [
                'name' => $name,
                'login' => $login,
                'password' => $password,
                'email' => $email,
                'role' => 'user',
                'favourites' => []
            ];
            
            $users[] = $newUser;
            file_put_contents('users.json', json_encode($users, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            
            $message = '<div style="color:green">Регистрация успешна!</div>';
            $showForm = false;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Регистрация</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        form { max-width: 400px; margin: 0 auto; }
        input, button { width: 100%; padding: 10px; margin: 5px 0; }
    </style>
</head>
<body>
    <h1>Регистрация нового пользователя</h1>
    
    <?php echo $message; ?>
    
    <?php if ($showForm): ?>
    <form method="POST">
        <input type="text" name="name" placeholder="Ваше имя" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="login" placeholder="Логин" required>
        <input type="password" name="password" placeholder="Пароль" required>
        <input type="password" name="confirm_password" placeholder="Подтвердите пароль" required>
        <button type="submit">Зарегистрироваться</button>
    </form>
    <?php else: ?>
        <p><a href="index.php">Перейти к товарам</a></p>
    <?php endif; ?>
    
    <p>Уже есть аккаунт? <a href="index.php">Войти</a></p>
</body>
</html>