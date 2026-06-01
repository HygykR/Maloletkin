<?php
session_start();

function getNextProductId() {
    $goods = getGoods();
    $maxId = 0;
    foreach ($goods as $product) {
        if (isset($product['id']) && $product['id'] > $maxId) {
            $maxId = $product['id'];
        }
    }
    return $maxId + 1;
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

function saveGoods($goods) {
    $json = json_encode($goods, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    file_put_contents('goods.json', $json);
}

function addToFavourites($userId, $productId) {
    $users = getUsers();
    foreach ($users as &$user) {
        if ($user['login'] === $userId) {
            if (!in_array($productId, $user['favourites'])) {
                $user['favourites'][] = $productId;
                saveUsers($users);
                return true;
            }
        }
    }
    return false;
}

function removeFromFavourites($userId, $productId) {
    $users = getUsers();
    foreach ($users as &$user) {
        if ($user['login'] === $userId) {
            $key = array_search($productId, $user['favourites']);
            if ($key !== false) {
                unset($user['favourites'][$key]);
                $user['favourites'] = array_values($user['favourites']);
                saveUsers($users);
                return true;
            }
        }
    }
    return false;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    
    $users = getUsers();
    $authSuccess = false;
    
    foreach ($users as $user) {
        if ($user['login'] === $login && $user['password'] === $password) {
            $_SESSION['user'] = $user;
            $authSuccess = true;
            break;
        }
    }
    
    if (!$authSuccess) {
        $authError = 'Неправильный логин или пароль';
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: index.php');
    exit;
}

if (isset($_GET['add_to_fav'])) {
    if (isset($_SESSION['user'])) {
        $productId = intval($_GET['add_to_fav']);
        addToFavourites($_SESSION['user']['login'], $productId);
        
        $users = getUsers();
        foreach ($users as $user) {
            if ($user['login'] === $_SESSION['user']['login']) {
                $_SESSION['user'] = $user;
                break;
            }
        }
        
        header('Location: index.php');
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {
    if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin') {
        $name = trim($_POST['name']);
        $description = trim($_POST['description']);
        $category = trim($_POST['category']);
        
        if (empty($category) && !empty($_POST['existing_category'])) {
            $category = $_POST['existing_category'];
        }
        
        $price = $_POST['price'];
        $imageUrl = trim($_POST['imageUrl']);
        $stock = $_POST['stock'];
        $offer = trim($_POST['offer']);
        
        if (!is_numeric($price) || !is_numeric($stock)) {
            $error = "Цена и количество должны быть числами!";
        } else {
            $newProduct = [
                'id' => getNextProductId(),
                'name' => $name,
                'description' => $description,
                'category' => $category,
                'price' => floatval($price),
                'imageUrl' => $imageUrl,
                'stock' => intval($stock),
                'offer' => $offer
            ];
            
            $goods = getGoods();
            $goods[] = $newProduct;
            saveGoods($goods);
            $success = "Товар успешно добавлен!";
        }
    }
}

if (isset($_GET['delete'])) {
    if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin') {
        $deleteId = intval($_GET['delete']);
        $goods = getGoods();
        
        foreach ($goods as $key => $product) {
            if ($product['id'] === $deleteId) {
                array_splice($goods, $key, 1);
                saveGoods($goods);
                break;
            }
        }
    }
    header("Location: " . strtok($_SERVER["REQUEST_URI"], '?'));
    exit();
}

$goods = getGoods();
$categories = [];
foreach ($goods as $product) {
    $category = $product['category'];
    $categories[$category][] = $product;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Магазин стройматериалов</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        .auth-form, .add-form { border: 1px solid #ccc; padding: 20px; margin: 20px 0; }
        .category { border: 1px solid #ddd; padding: 15px; margin: 20px 0; }
        .product { border: 1px solid #eee; padding: 10px; margin: 10px; display: inline-block; width: 250px; vertical-align: top; }
        .product img { max-width: 100%; height: 150px; object-fit: cover; }
        .error { color: red; }
        .success { color: green; }
        .user-info { background: #e0e0e0; padding: 10px; margin: 10px 0; }
        button, a.button { 
            padding: 5px 10px; 
            margin: 2px; 
            text-decoration: none; 
            color: black; 
            border: 1px solid #999; 
            background: #f0f0f0; 
            display: inline-block;
            cursor: pointer;
        }
        .admin-btn { background: #ff4444; color: white; border-color: #cc0000; }
        .user-btn { background: #4CAF50; color: white; border-color: #2e7d32; }
        .fav-btn { background: #ff9800; color: white; border-color: #f57c00; }
    </style>
</head>
<body>

<h1>Магазин стройматериалов</h1>

<?php if (isset($_SESSION['user'])): ?>
    <div class="user-info">
        Вы вошли как: <strong><?= htmlspecialchars($_SESSION['user']['name']) ?></strong>
        (<?= $_SESSION['user']['role'] === 'admin' ? 'Администратор' : 'Пользователь' ?>)
        
        <?php if ($_SESSION['user']['role'] === 'user' && !empty($_SESSION['user']['favourites'])): ?>
            <span style="margin-left: 20px;">
                Избранное: <?= count($_SESSION['user']['favourites']) ?> товаров
                <a href="favourites.php" class="fav-btn">Посмотреть избранное</a>
            </span>
        <?php elseif ($_SESSION['user']['role'] === 'user'): ?>
            <span style="margin-left: 20px;">
                <a href="favourites.php" class="fav-btn">Избранное (пусто)</a>
            </span>
        <?php endif; ?>
        
        <a href="?logout" style="float:right">Выйти</a>
    </div>
<?php endif; ?>

<?php if (!isset($_SESSION['user'])): ?>
    <div class="auth-form">
        <h2>Вход в систему</h2>
        <?php if (isset($authError)): ?>
            <div class="error"><?= $authError ?></div>
        <?php endif; ?>
        <form method="POST">
            <input type="text" name="login" placeholder="Логин" required><br><br>
            <input type="password" name="password" placeholder="Пароль" required><br><br>
            <button type="submit">Войти</button>
        </form>
        <p>Нет аккаунта? <a href="register.php">Зарегистрироваться</a></p>
    </div>
<?php endif; ?>

<?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin'): ?>
    <div class="add-form">
        <h2>Добавить новый товар (Админ)</h2>
        
        <?php if (isset($error)): ?>
            <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        
        <?php if (isset($success)): ?>
            <div class="success"><?= htmlspecialchars($success) ?></div>
        <?php endif; ?>
        
        <form method="POST">
            <input type="text" name="name" placeholder="Название товара" required><br><br>
            <textarea name="description" placeholder="Описание" required></textarea><br><br>
            
            <input type="text" name="category" placeholder="Новая категория"><br><br>
            <select name="existing_category">
                <option value="">-- Выберите категорию --</option>
                <?php foreach (array_keys($categories) as $cat): ?>
                    <option><?= htmlspecialchars($cat) ?></option>
                <?php endforeach; ?>
            </select><br><br>
            
            <input type="number" name="price" placeholder="Цена" step="0.01" required><br><br>
            <input type="number" name="stock" placeholder="Количество" required><br><br>
            <input type="text" name="imageUrl" placeholder="URL изображения"><br><br>
            <input type="text" name="offer" placeholder="Акция"><br><br>
            
            <button type="submit" name="add">Добавить товар</button>
        </form>
    </div>
<?php endif; ?>

<h2>Товары</h2>
<?php foreach ($categories as $categoryName => $categoryProducts): ?>
    <div class="category">
        <h3><?= htmlspecialchars($categoryName) ?></h3>
        <div class="products">
            <?php foreach ($categoryProducts as $product): ?>
                <div class="product">
                    <?php if (!empty($product['imageUrl'])): ?>
                        <img src="<?= htmlspecialchars($product['imageUrl']) ?>" alt="<?= htmlspecialchars($product['name']) ?>">
                    <?php else: ?>
                        <div style="height:150px; background:#f0f0f0; display:flex; align-items:center; justify-content:center;">
                            Нет изображения
                        </div>
                    <?php endif; ?>
                    
                    <h4><?= htmlspecialchars($product['name']) ?></h4>
                    <p><?= htmlspecialchars($product['description']) ?></p>
                    <div>Цена: <?= htmlspecialchars($product['price']) ?> руб.</div>
                    <div>В наличии: <?= htmlspecialchars($product['stock']) ?> шт.</div>
                    
                    <?php if (!empty($product['offer'])): ?>
                        <div><strong>Акция: <?= htmlspecialchars($product['offer']) ?></strong></div>
                    <?php endif; ?>
                    
                    <?php if (isset($_SESSION['user'])): ?>
                        <?php if ($_SESSION['user']['role'] === 'admin'): ?>
                            <a href="?delete=<?= $product['id'] ?>" 
                               class="button admin-btn" 
                               onclick="return confirm('Удалить товар?')">
                               Удалить
                            </a>
                        <?php elseif ($_SESSION['user']['role'] === 'user'): ?>
                            <?php 
                            $isFavourite = isset($_SESSION['user']['favourites']) && 
                                         in_array($product['id'], $_SESSION['user']['favourites']);
                            ?>
                            <?php if (!$isFavourite): ?>
                                <a href="?add_to_fav=<?= $product['id'] ?>" class="button user-btn">
                                    Добавить в избранное
                                </a>
                            <?php else: ?>
                                <span class="button" style="background: #ccc; color: #666;">
                                    ✓ В избранном
                                </span>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endforeach; ?>

</body>
</html>