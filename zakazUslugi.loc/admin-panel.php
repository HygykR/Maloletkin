<?php require 'src/init-AdminPanel.php' ?>
<?php
include 'src/header.php';
?>

    <main id="main" class="flex-shrink-0" role="main">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol id="w4" class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./index.php">Главная</a></li>
                    <li class="breadcrumb-item active" aria-current="page">заявки</li>
                    <li class="breadcrumb-item"><a href="./admin-reviews.php">модерация отзывов</a></li>
                </ol>
            </nav>
            <div class="application-index">

                <h1>заявки</h1>

                <div id="p0" data-pjax-container="" data-pjax-push-state data-pjax-timeout="1000">
                    <div class="application-search">

                        <form id="w0" action="admin-panel.php" method="get" data-pjax="1">
                            <div class="form-group field-applicationsearch-status_id">
                                <label class="control-label" for="applicationsearch-status_id">статус</label>
                                <select id="applicationsearch-status_id" class="form-control" name="status_id">
                                    <option value="">выберите статус</option>
                                    <option value="1" <?= ($_GET['status_id'] ?? '') === '1' ? 'selected' : '' ?>>На посещение</option>
                                    <option value="2" <?= ($_GET['status_id'] ?? '') === '2' ? 'selected' : '' ?>>Время забронировано</option>
                                    <option value="3" <?= ($_GET['status_id'] ?? '') === '3' ? 'selected' : '' ?>>Услуга оказана</option>
                                    <option value="4" <?= ($_GET['status_id'] ?? '') === '4' ? 'selected' : '' ?>>Посещение перенесено</option>
                                </select>

                                <div class="help-block"></div>
                            </div>


                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">найти</button> 
                                <a class="btn btn-outline-secondary" href="admin-panel.php">сбросить</a>
                            </div>

                        </form>
                    </div>

                    <div id="w1" class="list-view">
                        <div class="d-flex flex-wrap justify-content-between">
                            <?php if(empty($applications)): ?>
                                <div class="alert alert-info w-100 mt-3">Заявок пока нет.</div>
                            <?php else: ?>
                                <?php foreach($applications as $app): ?>
                                <div class="item mb-3">
                                    <div class="card" style="width: 18rem;">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $app['reason'] ?></h5>
                                            <p class="card-text"><?= $app['text'] ?></p>
                                            <div class="card-text">
                                                <div class="opacity-50">дата и время посещения:</div>
                                                <?= $app['date'] ?> <?= $app['time'] ?>
                                            </div>
                                            <div class="card-text">
                                                <div class="opacity-50">дата и время создания:</div>
                                                <?= $app['create_at'] ?>
                                            </div>
                                            <div class="card-text">
                                                <div class="opacity-50">отправитель (ID):</div>
                                                <?= $app['user_id'] ?>
                                            </div>
                                            <div class="card-text">
                                                <div class="opacity-50">статус:</div>
                                                <?php 
                                                switch ($app['status_id'] ?? null) {
                                                    case 1: echo 'На посещение'; break;
                                                    case 2: echo 'Время забронировано'; break;
                                                    case 3: echo 'Услуга оказана'; break;
                                                    case 4: echo 'Посещение перенесено'; break;
                                                    default: echo 'Новая заявка'; break;
                                                }
                                                ?>
                                            </div>
                                            <br>
                                            <a class="btn btn-primary" href="admin-app.php?id=<?= $app['id'] ?>">просмотр</a>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php include 'src/footer.php'?>
