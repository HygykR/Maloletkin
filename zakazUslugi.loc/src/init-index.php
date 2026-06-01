<?php
require 'init.php';
$page = 'index.php';
$feedback = new \src\Feedback($request, $db);
$feedbacks = $feedback->findAll();
if($feedbacks === null) $feedbacks = [];

$feedbacks = array_filter($feedbacks, function($item) {
    return isset($item['status']) && $item['status'] == 1;
});
?>
