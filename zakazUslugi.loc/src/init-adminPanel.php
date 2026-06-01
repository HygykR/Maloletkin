<?php
require 'init.php';

if ($user->isGuest) {
    header('Location: login.php');
    exit();
}

if (!$user->isAdmin) { 
    header('Location: login.php');
    exit();
}

$applicationModel = new \src\Application($request, $db);

if (isset($_GET['id']) && isset($_GET['status'])) {
    $appId = (int)$_GET['id'];
    $statusParam = $_GET['status'];

    $appDataList = $applicationModel->getId($appId);
    if (!empty($appDataList)) {
        $currentApp = $appDataList; 
        $applicationModel->load($currentApp); 

        $newStatusId = null;
        if ($statusParam === 'submit') {
            $newStatusId = '2';
        } elseif ($statusParam === 'complete') {
            $newStatusId = '3';
        }

        if ($newStatusId) {
            $applicationModel->update(['status_id' => $newStatusId]);
            header('Location: admin-panel.php');
            exit();
        }
    }
}

$selectedStatus = $_GET['status_id'] ?? '';

if (!empty($selectedStatus)) {
    $sql = "SELECT * FROM `application` WHERE `status_id` = ? ORDER BY `id` DESC";
    $applications = $db->querySql($sql, [$selectedStatus]);
} else {
    $sql = "SELECT * FROM `application` ORDER BY `id` DESC";
    $applications = $db->querySql($sql);
}

if (!$applications) {
    $applications = [];
}
?>
