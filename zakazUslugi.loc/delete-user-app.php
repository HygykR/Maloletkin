<?php
require 'src/init-account.php';

if ($user->isGuest) {
    header('Location: index.php');
    exit();
}

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    
    $sql = "SELECT * FROM application WHERE id = " . $id;
    $result = $db->query($sql);
    $app = $result->fetch_assoc();
    
    if ($app && $app['user_id'] == $user->id) {
        $sql = "DELETE FROM application WHERE id = " . $id;
        $db->query($sql);
        $_SESSION['flash'] = 'Заявка успешно отменена';
    }
}

header('Location: account.php');
exit();
?>