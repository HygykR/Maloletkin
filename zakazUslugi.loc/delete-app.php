<?php
require 'src/init.php';

if($user->isGuest){
    header('Location: login.php');
    exit();
}

$id = (int)($_GET['id'] ?? 0);

if($id === 0){
    header('Location: account.php');
    exit();
}

$applications = new \src\Application($request, $db);
$applicationData = $applications->getId($id);
if(empty($applicationData)){
    header('Location: account.php');
    exit();
}
$applicationData = $applicationData[0];

if($applicationData['user_id'] != $user->id){
    header('Location: account.php');
    exit();
}

$applications->id = $id;
$applications->delete();
header('Location: account.php');
exit();
?>