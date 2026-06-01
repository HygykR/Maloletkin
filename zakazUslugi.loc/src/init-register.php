<?php

use src\User;
use src\exceptions\InvalidArgumentException;

$page = 'feedback.php';

require 'init.php';
require_once 'User.php';

$user = new User($request, $db);

$error = null;
$flash = null;

if ($request->isPost) {
    $formData = $request->post()['RegisterForm'] ?? [];
    $user->loadFromForm($formData);

    try {
        $user->validate();

        if ($user->save()) {
            $_SESSION['flash'] = 'Вы успешно зарегистрировались!';
            header('Location: ' . $_SERVER['REQUEST_URI']);
            exit;
        } else {
            $error = "Не удалось сохранить пользователя в базу данных.";
        }
    } catch (InvalidArgumentException $e) {
        $error = $e->getMessage();
    }
}

if (isset($_SESSION['flash'])) {
    $flash = $_SESSION['flash'];
    unset($_SESSION['flash']);
}
