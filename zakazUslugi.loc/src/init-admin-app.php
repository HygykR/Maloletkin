<?php

require 'init.php';

if($user->isGuest){
    header('Location: login.php');
    exit();
}
if(!$user->isAdmin()){
    header('Location: login.php');
    exit();
}

$id = (int)($_GET['id'] ?? 0);
if($id === 0){
    header('Location: admin-panel.php');
    exit();
}
$application = new \src\Application($request, $db);
$applicationData = $application->getId($id);
if(empty($applicationData)){
    header('Location: 404.php');
    exit();
}
$applicationData = $applicationData[0];

if($request->isPost){
    $data = $request->post();
    try{
        
        $application->id = $id;
        
        $application->update([
            'date' => $data['date'], 
            'time' => $data['time'],
            'status_id' => 4 
        ]);
        
        $applicationData['date'] = $data['date'];
        $applicationData['time'] = $data['time'];
        $applicationData['status_id'] = 4;
        $flash = 'Время успешно изменено';
    }catch(\src\exceptions\InvalidArgumentException $e){
        $error = $e->getMessage();
    }
}

if(isset($_GET['submit'])){
    $application->id = $id;
    $application->update(['status_id' => 2]);
    $applicationData['status_id'] = 2;
    $flash = 'Заявка подтверждена';
}

if(isset($_GET['finish'])){
    $application->id = $id;
    $application->update(['status_id' => 3]);
    $applicationData['status_id'] = 3;
    $flash = 'Заявка завершена';
}
?>
