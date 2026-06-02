<!DOCTYPE html>
<html lang="ru-RU" class="h-100">

<head>
    <title>Заказ услуги</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/site.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="d-flex flex-column h-100">

    <header id="header">
        <nav class="navbar-expand-md navbar-dark bg-dark fixed-top navbar">
            <div class="container">
                <?php 
                $current_file = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
                if (empty($current_file) || $current_file === 'localhost' || $current_file === 'zakazUslugi.loc') {
                    $current_file = 'index.php';
                }
                ?>
                
                <a class="navbar-brand <?= $current_file === 'index.php' ? 'active fw-bold text-white' : '' ?>" href="index.php">Заказ услуги</a>
                
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#nav-collapse"
                    aria-controls="nav-collapse" aria-expanded="false" aria-label="Переключить навигацию">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div id="nav-collapse" class="collapse navbar-collapse">
                    <ul class="navbar-nav nav">
                        <li class="nav-item">
                            <a class="nav-link <?= $current_file === 'feedback.php' ? 'active fw-bold text-white' : '' ?>" href="feedback.php">отзывы</a>
                        </li>
                        
                        <?php if($user->isGuest):?>
                        <li class="nav-item">
                            <a class="nav-link <?= $current_file === 'login.php' ? 'active fw-bold text-white' : '' ?>" href="login.php">войти</a>
                        </li>
                        <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link <?= $current_file === 'logout.php' ? 'active fw-bold text-white' : '' ?>" href="logout.php"><?= $user->getLogin() ?> выйти</a>
                        </li>
                        <?php endif ?>
                        
                        <?php if(!$user->isGuest && $user->isAdmin()): ?>
                        <li class="nav-item">
                            <a class="nav-link <?= $current_file === 'register.php' ? 'active fw-bold text-white' : '' ?>" href="register.php">регистрация</a>
                        </li>
                        <?php endif; ?>

                        <?php if(!$user->isGuest && !$user->isAdmin()): ?>
                        <li class="nav-item">
                            <a class="nav-link <?= in_array($current_file, ['account.php', 'change-password.php']) ? 'active fw-bold text-white' : '' ?>" href="account.php">личный кабинет</a>
                        </li>
                        <?php endif; ?>

                        
                        <?php if(!$user->isGuest && $user->isAdmin()): ?>
                        <li class="nav-item">
                            <a class="nav-link <?= in_array($current_file, ['admin-panel.php', 'admin-app.php']) ? 'active fw-bold text-white' : '' ?>" href="admin-panel.php">админка</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $current_file === 'admin-reviews.php' ? 'active fw-bold text-white' : '' ?>" href="admin-reviews.php">модерация отзывов</a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container">
    <?php if(isset($flash)) : ?>
        <div class="bg-success"><?= $flash ?></div>
    <?php endif ?>
