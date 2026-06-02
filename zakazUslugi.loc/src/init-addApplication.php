<?php
require 'init.php';

if($user->isGuest){
    header('Location: index.php');
    exit();
}

$application = new \src\Application($request, $db);

if($request->isPost){
    $application->load($request->post());
    try{
        $application->validate();
        $application->saveApplication($user->id);
        
        $_SESSION['flash'] = 'Заявка успешно отправлена!';
        
        header('Location: add-application.php');
        exit();
    } catch (\src\exceptions\InvalidArgumentException $e){
        $error = $e->getMessage();
    }
}

$flash = null;
if(isset($_SESSION['flash'])){
    $flash = $_SESSION['flash'];
    unset($_SESSION['flash']);
}

$applications = $application->findByColumn('user_id', $user->id);
if($applications === null) $applications = [];
?>
