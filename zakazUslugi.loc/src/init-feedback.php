<?php

use src\Feedback;
use src\services\Request;
use src\services\Db;
require 'init.php';
$page = 'feedback.php';
$feedback = new Feedback($request, $db);

if($request->isPost){
    $feedback->loadFromForm($request->post(), $_FILES['img'] ?? []);
    try{
        $feedback->validate();

        if(method_exists($feedback, 'setStatus')) {
            $feedback->setStatus(0);
        }

        if($feedback->save()){
            $_SESSION['flash'] = 'Отзыв отправлен на модерацию и появится после проверки администратором.';
            header('Location: feedback.php');
            exit();
        }
    } catch(\InvalidArgumentException $e){
        $error = $e->getMessage();
    }
    
}
if(isset($_SESSION['flash'])){
    $flash = $_SESSION['flash'];
    unset($_SESSION['flash']);
}

$feedbacks = $feedback->findAll();

?>
