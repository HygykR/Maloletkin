<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}

function getUsers() {
    return json_decode(file_get_contents('users.json'), true);
}

function saveUsers($users) {
    file_put_contents('users.json', json_encode($users, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}

function getGoods() {
    $json = file_get_contents('goods.json');
    return json_decode($json, true) ?: [];
}

if (isset($_GET['remove'])) {
    $productId = intval($_GET['remove']);
    $users = getUsers();
    
    foreach ($users as &$user) {
        if ($user['login'] === $_SESSION['user']['login']) {
            $key = array_search($productId, $user['favourites']);
            if ($key !== false) {
                unset($user['favourites'][$key]);
                $user['favourites'] = array_values($user['favourites']);
                saveUsers($users);
                $_SESSION['user']['favourites'] = $user['favourites'];
                break;
            }
        }
    }
    header('Location: favourites.php');
    exit;
}

$goods = getGoods();
$favouriteIds = $_SESSION['user']['favourites'] ?? [];
$favourites = [];

foreach ($goods as $product) {
    if (in_array($product['id'], $favouriteIds)) {
        $favourites[] = $product;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Мои избранные товары</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        .product { border: 1px solid #ddd; padding: 15px; margin: 10px; display: inline-block; width: 250px; }
        .product img { max-width: 100%; height: 150px; object-fit: cover; }
        .remove-btn { 
            background: #ff4444; 
            color: white; 
            border: none; 
            padding: 5px 10px; 
            cursor: pointer;
            margin-top: 10px;
        }
        .empty { color: #666; font-style: italic; }
        .header { background: #f0f0f0; padding: 10px; margin-bottom: 20px; }
    </style>
</head>
<body>

<div class="header">
    <h1>Мои избранные товары</h1>
    <p>Вы вошли как: <strong><?= htmlspecialchars($_SESSION['user']['name']) ?></strong></p>
    <a href="index.php">← Вернуться к товарам</a>
</div>

<?php if (empty($favourites)): ?>
    <div class="empty">
        <h2>Ваш список избранного пуст</h2>
        <p>Добавьте товары в избранное, нажимая кнопку "Добавить в избранное" на странице товаров.</p>
        <a href="index.php">Перейти к товарам</a>
    </div>
<?php else: ?>
    <p>Количество избранных товаров: <?= count($favourites) ?></p>
    
    <div>
        <?php foreach ($favourites as $product): ?>
            <div class="product">
                <?php if (!empty($product['imageUrl'])): ?>
                    <img src="<?= htmlspecialchars($product['imageUrl']) ?>" alt="<?= htmlspecialchars($product['name']) ?>">
                <?php else: ?>
                    <div style="height:150px; background:#f0f0f0; display:flex; align-items:center; justify-content:center;">
                        Нет изображения
                    </div>
                <?php endif; ?>
                
                <h3><?= htmlspecialchars($product['name']) ?></h3>
                <p><?= htmlspecialchars($product['description']) ?></p>
                <div><strong>Цена:</strong> <?= htmlspecialchars($product['price']) ?> руб.</div>
                <div><strong>Категория:</strong> <?= htmlspecialchars($product['category']) ?></div>
                <div><strong>В наличии:</strong> <?= htmlspecialchars($product['stock']) ?> шт.</div>
                
                <?php if (!empty($product['offer'])): ?>
                    <div><strong>Акция:</strong> <?= htmlspecialchars($product['offer']) ?></div>
                <?php endif; ?>
                
                <button class="remove-btn" onclick="if(confirm('Удалить из избранного?')) window.location='?remove=<?= $product['id'] ?>'">
                    Удалить из избранного
                </button>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

</body>
</html>