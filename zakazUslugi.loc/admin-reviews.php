<?php 
require 'src/init-feedback.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'], $_POST['id'])) { 
    $id = (int)$_POST['id']; 
    $status = ($_POST['action'] === 'approve') ? 1 : 2; 
    
    $sql = "UPDATE review SET status = $status WHERE id = $id"; 
    $db->query($sql); 
    
    if ($_POST['action'] === 'approve') {
        $_SESSION['flash_message'] = 'Отзыв успешно опубликован!';
        $_SESSION['flash_type'] = 'success';
    } else {
        $_SESSION['flash_message'] = 'Отзыв успешно отклонен.';
        $_SESSION['flash_type'] = 'danger';
    }

    header("Location: admin-reviews.php" . (isset($_GET['only_new']) ? '?only_new=1' : '')); 
    exit; 
} 

$onlyNew = isset($_GET['only_new']) && $_GET['only_new'] == '1'; 

if ($onlyNew) { 
    $reviews = $db->querySql("SELECT * FROM review WHERE status = 0 ORDER BY create_at DESC"); 
} else { 
    $reviews = $db->querySql("SELECT * FROM review ORDER BY create_at DESC"); 
} 

if (!is_array($reviews)) { 
    $reviews = []; 
} 

include 'src/header.php'; 
?> 

<main id="main" class="flex-shrink-0" role="main"> 
    <div class="container"> 
        
        <?php if (isset($_SESSION['flash_message'])): ?>
            <div class="alert alert-<?= $_SESSION['flash_type'] ?> fade show mt-3" role="alert">
                <?= $_SESSION['flash_message'] ?>
            </div>
            <?php 
            unset($_SESSION['flash_message']); 
            unset($_SESSION['flash_type']); 
            ?>
        <?php endif; ?>

        <nav aria-label="breadcrumb"> 
            <ol id="w4" class="breadcrumb"> 
                <li class="breadcrumb-item"><a href="./index.php">Главная</a></li> 
                <li class="breadcrumb-item active" aria-current="page">модерация отзывов</li> 
            </ol> 
        </nav> 
        
        <div class="application-index"> 
            <h1>Панель модерации отзывов</h1> 
            
            <div class="mb-4"> 
                <form method="GET" action="admin-reviews.php" id="filterForm"> 
                    <div class="form-check"> 
                        <input class="form-check-input" type="checkbox" name="only_new" id="onlyNewCheckbox" value="1" <?php echo $onlyNew ? 'checked' : ''; ?> onchange="document.getElementById('filterForm').submit()"> 
                        <label class="form-check-label" for="onlyNewCheckbox">Показывать только новые отзывы</label> 
                    </div> 
                </form> 
            </div> 
            
            <div id="p0" data-pjax-container="" data-pjax-push-state data-pjax-timeout="1000"> 
                <div id="w1" class="list-view"> 
                    <div class="d-flex flex-wrap justify-content-start gap-3 layout-card"> 
                        <?php if (empty($reviews)): ?> 
                            <div class="alert alert-info w-100">Отзывов не найдено.</div> 
                        <?php else: ?> 
                            <?php foreach($reviews as $item): ?> 
                                <div class="item"> 
                                    <div class="card" style="width: 18rem;"> 
                                        <div class="text-center p-3 border-bottom"> 
                                            <?php if (!empty($item['img'])): ?> 
                                                <img src="uploads/<?= $item['img'] ?>" class="img-fluid rounded" alt="Фото работы" style="max-height: 150px; object-fit: cover;"> 
                                            <?php else: ?> 
                                                <img src="uploads/no-image.jpg" class="img-fluid rounded" alt="Нет фото" style="max-height: 150px; object-fit: cover;"> 
                                            <?php endif; ?> 
                                        </div> 
                                        <div class="card-body"> 
                                            <h3 class="card-title"> <?= $item['name'] ?> </h3> 
                                            <p class="card-text"> <?= $item['feedback'] ?> </p> 
                                            <div class="card-text"> 
                                                <div class="opacity-50">телефон:</div> <?= $item['phone'] ?> 
                                            </div> 
                                            <div class="card-text mt-2"> 
                                                <div class="opacity-50">дата создания:</div> <?= $item['create_at'] ?> 
                                            </div> 
                                            <div class="card-text mt-2 mb-3"> 
                                                <div class="opacity-50">статус:</div> 
                                                <?php switch ($item['status']) { 
                                                    case 0: echo 'Новый'; break; 
                                                    case 1: echo 'Опубликован'; break; 
                                                    case 2: echo 'Отклонен'; break; 
                                                } ?> 
                                            </div> 
                                            <form method="POST" action="admin-reviews.php<?php echo $onlyNew ? '?only_new=1' : ''; ?>"> 
                                                <input type="hidden" name="id" value="<?= $item['id'] ?>"> 
                                                <?php if ($item['status'] == 0 || $item['status'] == 2): ?> 
                                                    <button type="submit" name="action" value="approve" class="btn btn-success btn-sm w-100 mb-2">Опубликовать</button> 
                                                <?php endif; ?> 
                                                <?php if ($item['status'] == 0 || $item['status'] == 1): ?> 
                                                    <button type="submit" name="action" value="reject" class="btn btn-danger btn-sm w-100">Отклонить</button> 
                                                <?php endif; ?> 
                                            </form> 
                                        </div> 
                                    </div> 
                                </div> 
                            <?php endforeach; ?> 
                        <?php endif; ?> 
                    </div> 
                </div> 
            </div> 
        </div> 
    </div> 
</main> 

<?php include 'src/footer.php' ?>
