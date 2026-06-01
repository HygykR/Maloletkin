<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>СТРОЙМАРКЕТ - Все для ремонта и строительства!</title>
    <style>
        .product-image {
            max-width: 200px;
            max-height: 150px;
        }
        .product-card {
            border: 1px solid #000000ff;
            padding: 10px;
            margin: 10px;
            display: inline-block;
            width: 300px;
            vertical-align: top;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 5px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .form-container {
            margin: 20px 0;
            padding: 5px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
        }
        .message {
            padding: 5px;
            margin: 10px 0;
            border-radius: 5px;
        }
        .error {
            background-color: #ffebee;
            color: #c62828;
            border: 1px solid #ffcdd2;
        }
        .info {
            background-color: #e8f5e8;
            color: #2e7d32;
            border: 1px solid #c8e6c9;
        }
        .header {
            background-color: #8B4513;
            color: white;
            padding: 15px;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>СТРОЙМАРКЕТ - Все для ремонта и строительства!</h1>
    </div>
    
    <?php
    $products = [
        [
            'name' => 'Цемент М500 50кг',
            'category' => 'Сухие смеси',
            'price' => 350,
            'brand' => 'Лафарж',
            'imageUrl' => 'cement.jpg',
            'stock' => true,
            'offer' => 'Скидка при покупке от 10 мешков'
        ],
        [
            'name' => 'Гипсокартон Кнауф 12.5мм',
            'category' => 'Листовые материалы',
            'price' => 420,
            'brand' => 'Кнауф',
            'imageUrl' => 'gypsum-board.jpg',
            'stock' => true,
            'offer' => 'Бесплатная доставка'
        ],
        [
            'name' => 'Керамическая плитка 30x30см',
            'category' => 'Отделочные материалы',
            'price' => 890,
            'brand' => 'Керама Марацци',
            'imageUrl' => 'ceramic-tile.jpg',
            'stock' => false,
            'offer' => ''
        ],
        [
            'name' => 'Краска акриловая белая 10л',
            'category' => 'Лакокрасочные материалы',
            'price' => 2150,
            'brand' => 'Текс',
            'imageUrl' => 'acrylic-paint.jpg',
            'stock' => true,
            'offer' => 'Скидка 15%'
        ],
        [
            'name' => 'Профнастил С8 оцинкованный',
            'category' => 'Металлопрокат',
            'price' => 650,
            'brand' => 'МеталлПрофиль',
            'imageUrl' => 'profnastil.webp',
            'stock' => true,
            'offer' => 'Рассрочка 0%'
        ],
        [
            'name' => 'Пенопласт ПСБ-С-25 50мм',
            'category' => 'Теплоизоляция',
            'price' => 1250,
            'brand' => 'Пеноплэкс',
            'imageUrl' => 'penoplast.jpg',
            'stock' => true,
            'offer' => ''
        ],
        [
            'name' => 'Перфоратор Makita HR2470',
            'category' => 'Электроинструмент',
            'price' => 8990,
            'brand' => 'Makita',
            'imageUrl' => 'perforator.jpg',
            'stock' => true,
            'offer' => 'Хит продаж'
        ],
        [
            'name' => 'Ламинат 32 класса 10мм',
            'category' => 'Напольные покрытия',
            'price' => 950,
            'brand' => 'Tarkett',
            'imageUrl' => 'laminate.webp',
            'stock' => true,
            'offer' => 'Установка в подарок'
        ],
        [
            'name' => 'Шуруповерт аккумуляторный',
            'category' => 'Электроинструмент',
            'price' => 3550,
            'brand' => 'Bosch',
            'imageUrl' => 'screwdriver.webp',
            'stock' => false,
            'offer' => ''
        ],
        [
            'name' => 'Монтажная пена 750мл',
            'category' => 'Герметики',
            'price' => 280,
            'brand' => 'Макрофлекс',
            'imageUrl' => 'mounting-foam.webp',
            'stock' => true,
            'offer' => 'Акция: 2 по цене 1'
        ]
    ];
    
    // Получаем уникальные категории для формы
    $categories = [];
    foreach ($products as $product) {
        $categories[] = $product['category'];
    }
    $uniqueCategories = array_unique($categories);
    
    // Форма для выбора категории
    echo "<div class='form-container'>";
    echo "<h3>Поиск товаров по категории</h3>";
    echo "<form method='POST'>";
    echo "<label for='category'>Выберите категорию:</label>";
    echo "<select name='category' id='category'>";
    echo "<option value=''>-- Выберите категорию --</option>";
    foreach ($uniqueCategories as $category) {
        $selected = (isset($_POST['category']) && $_POST['category'] == $category) ? 'selected' : '';
        echo "<option value='$category' $selected>$category</option>";
    }
    echo "</select>";
    echo "<input type='submit' value='Показать товары'>";
    echo "</form>";
    echo "</div>";
    
    // Обработка выбора категории
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['category']) && !empty($_POST['category'])) {
        $selectedCategory = $_POST['category'];
        
        // Проверяем существование категории
        $categoryExists = false;
        foreach ($uniqueCategories as $category) {
            if ($category == $selectedCategory) {
                $categoryExists = true;
                break;
            }
        }
        
        if (!$categoryExists) {
            echo "<div class='message error'>Ничего не найдено</div>";
        } else {
            // Фильтруем товары по выбранной категории
            $filteredProducts = [];
            foreach ($products as $product) {
                if ($product['category'] == $selectedCategory) {
                    $filteredProducts[] = $product;
                }
            }
            
            if (empty($filteredProducts)) {
                echo "<div class='message info'>В категории '$selectedCategory' пока нет товаров</div>";
            } else {
                echo "<h2>Товары в категории: $selectedCategory</h2>";
                echo "<div style='display: flex; flex-wrap: wrap;'>";
                
                foreach ($filteredProducts as $product) {
                    $availability = $product['stock'] ? 'В наличии' : 'Нет в наличии';
                    $offer = !empty($product['offer']) ? " ({$product['offer']})" : '';
                    
                    echo "<div class='product-card'>";
                    echo "<img src='{$product['imageUrl']}' alt='{$product['name']}' class='product-image'><br>";
                    echo "<b>{$product['name']}</b><br>";
                    echo "Цена: {$product['price']} руб.<br>";
                    echo "Категория: {$product['category']}<br>";
                    echo "Бренд: {$product['brand']}<br>";
                    echo "Статус: $availability$offer<br>";
                    echo "</div>";
                }
                echo "</div>";
            }
        }
    }
    
    echo "<h2>Таблица товаров</h2>";
    echo "<table>";
    echo "<tr>";
    echo "<th>Наименование</th>";
    echo "<th>Категория</th>";
    echo "<th>Бренд</th>";
    echo "<th>Цена</th>";
    echo "</tr>";
    foreach ($products as $product) {
        echo "<tr>";
        echo "<td>{$product['name']}</td>";
        echo "<td>{$product['category']}</td>";
        echo "<td>{$product['brand']}</td>";
        echo "<td>{$product['price']} руб.</td>";
        echo "</tr>";
    }
    echo "</table>";
    
    echo "<b>Категории товаров:</b> ", implode(', ', $uniqueCategories), "<br><br>";
    
    // 2. Получить товары со скидками
    $productsWithOffers = [];
    foreach ($products as $product) {
        if (!empty($product['offer'])) {
            $productsWithOffers[] = $product;
        }
    }
    echo "<b>Товары с акциями: </b>", count($productsWithOffers), "<br><br>";
    
    // 3. Получить товары в наличии
    $availableProducts = [];
    foreach ($products as $product) {
        if ($product['stock']) {
            $availableProducts[] = $product;
        }
    }
    echo "<b>Товары в наличии: </b>", count($availableProducts), "<br><br>";
    
    // 4. Получить среднюю цену по категориям
    $pricesByCategory = [];
    foreach ($products as $product) {
        $category = $product['category'];
        if (!isset($pricesByCategory[$category])) {
            $pricesByCategory[$category] = [];
        }
        $pricesByCategory[$category][] = $product['price'];
    }
    
    $averagePrices = [];
    foreach ($pricesByCategory as $category => $prices) {
        $averagePrices[$category] = array_sum($prices) / count($prices);
    }
    
    echo "<b>Средние цены по категориям:</b><br>";
    foreach ($averagePrices as $category => $avgPrice) {
        echo "$category: ", number_format($avgPrice, 2, '.', ' '), " руб.<br>";
    }
    echo "<br>";
    
    // 5. Группировка товаров по брендам
    $productsByBrand = [];
    foreach ($products as $product) {
        $brand = $product['brand'];
        if (!isset($productsByBrand[$brand])) {
            $productsByBrand[$brand] = [];
        }
        $productsByBrand[$brand][] = $product['name'];
    }
    
    echo "<b>Товары по брендам:</b><br>";
    foreach ($productsByBrand as $brand => $productNames) {
        echo "$brand: ", implode(', ', $productNames), "<br>";
    }
    echo "<br>";
    
    // 6. Поиск самого дорогого товара
    $mostExpensive = null;
    foreach ($products as $product) {
        if ($mostExpensive === null || $product['price'] > $mostExpensive['price']) {
            $mostExpensive = $product;
        }
    }
    echo "<b>Самый дорогой товар</b>: {$mostExpensive['name']} - {$mostExpensive['price']} руб.<br><br>";
    
    // 7. Получить все уникальные бренды
    $allBrands = [];
    foreach ($products as $product) {
        $allBrands[] = $product['brand'];
    }
    $uniqueBrands = [];
    foreach ($allBrands as $brand) {
        if (!in_array($brand, $uniqueBrands)) {
            $uniqueBrands[] = $brand;
        }
    }
    echo "<b>Бренды в магазине: </b>", implode(', ', $uniqueBrands), "<br><br>";
    
    // 8. Товары определенного бренда (Кнауф)
    $knaufProducts = [];
    foreach ($products as $product) {
        if ($product['brand'] === 'Кнауф') {
            $knaufProducts[] = $product;
        }
    }
    echo "<b>Товары Кнауф: </b>", count($knaufProducts), "<br>";
    
    // 9. Сортировка товаров по цене (по возрастанию)
    $sortedProducts = $products;
    for ($i = 0; $i < count($sortedProducts) - 1; $i++) {
        for ($j = $i + 1; $j < count($sortedProducts); $j++) {
            if ($sortedProducts[$i]['price'] > $sortedProducts[$j]['price']) {
                $temp = $sortedProducts[$i];
                $sortedProducts[$i] = $sortedProducts[$j];
                $sortedProducts[$j] = $temp;
            }
        }
    }
    
    echo "<br><b>Товары отсортированные по цене (возрастание):</b><br>";
    foreach ($sortedProducts as $product) {
        echo "{$product['name']}: {$product['price']} руб.<br>";
    }
    
    // 10. Вывод всех товаров с деталями и изображениями
    echo "<br><b>Все товары в магазине:</b><br>";
    foreach ($products as $product) {
        $availability = $product['stock'] ? 'В наличии' : 'Нет в наличии';
        $offer = !empty($product['offer']) ? " ({$product['offer']})" : '';
        
        echo "<div class='product-card'>";
        echo "<img src='{$product['imageUrl']}' alt='{$product['name']}' class='product-image'><br>";
        echo "<b>{$product['name']}</b><br>";
        echo "Цена: {$product['price']} руб.<br>";
        echo "Категория: {$product['category']}<br>";
        echo "Бренд: {$product['brand']}<br>";
        echo "Статус: $availability$offer<br>";
        echo "</div>";
    }

    //Просмотр товаров выбранной категории
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['category']) && !empty($_POST['category'])) {
    $selectedCategory = $_POST['category'];
    if (!in_array($selectedCategory, $uniqueCategories)) {
        echo "<div class='message error'>Ничего не найдено</div>";
    } else {
        $filteredProducts = array_filter($products, function($p) use ($selectedCategory) {
            return $p['category'] == $selectedCategory;
        });
        if (empty($filteredProducts)) {
            echo "<div class='message info'>В категории '$selectedCategory' пока нет товаров</div>";
        } else {
            echo "<h2>Товары в категории: $selectedCategory</h2>";
            echo "<div style='display: flex; flex-wrap: wrap;'>";
            foreach ($filteredProducts as $product) {
                $availability = $product['stock'] ? 'В наличии' : 'Нет в наличии';
                $availabilityClass = $product['stock'] ? 'info' : 'error';
                $offer = !empty($product['offer']) ? " ({$product['offer']})" : '';
                
                echo "<div class='product-card'>";
                echo "<img src='{$product['imageUrl']}' alt='{$product['name']}' class='product-image'><br>";
                echo "<b>{$product['name']}</b><br>";
                echo "Цена: <strong>{$product['price']} руб.</strong><br>";
                echo "Категория: {$product['category']}<br>";
                echo "Бренд: {$product['brand']}<br>";
                echo "<div class='message $availabilityClass'>Статус: $availability$offer</div>";
                echo "</div>";
            }
            echo "</div>";
        }
    }
}

//Карточка товара
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_name']) && !empty($_POST['product_name'])) {
    $productName = trim($_POST['product_name']);
    $productCards = array_filter($products, function($p) use ($productName) {
        return strpos(strtolower($p['name']), strtolower($productName)) !== false;
    });
    
    if (empty($productCards)) {
        echo "<div class='message error'>Товар '$productName' не найден</div>";
    } else {
        foreach ($productCards as $product) {
            echo "<div class='product-card' style='width: 80%; margin: 20px auto; text-align: center;'>";
            echo "<h2 style='color: #8B4513;'>{$product['name']}</h2>";
            echo "<img src='{$product['imageUrl']}' style='max-width: 200px; border: 2px solid #8B4513; border-radius: 10px;' alt='{$product['name']}'>";
            echo "<div style='margin: 15px 0;'>";
            echo "<div><strong>Категория:</strong> {$product['category']}</div>";
            echo "<div><strong>Бренд:</strong> {$product['brand']}</div>";
            echo "<div style='font-size: 1.2em; color: #2e7d32;'><strong>Цена: {$product['price']} руб.</strong></div>";
            echo "</div>";
            
            if ($product['offer']) {
                echo "<div class='info' style='padding: 10px; margin: 10px 0;'>🔥 Акция: {$product['offer']}</div>";
            }
            if (!$product['stock']) {
                echo "<div class='error' style='padding: 10px; margin: 10px 0;'>❌ Нет на складе</div>";
            } else {
                echo "<div class='info' style='padding: 10px; margin: 10px 0;'>✅ В наличии</div>";
            }
            echo "</div>";
        }
    }
}

//Таблица товаров
echo "<h2 style='color: #8B4513;'>Каталог строительных материалов</h2>";
echo "<table>";
echo "<tr style='background-color: #8B4513; color: white;'>";
echo "<th>Наименование</th><th>Категория</th><th>Бренд</th><th>Цена</th><th>Наличие</th>";
echo "</tr>";
foreach ($products as $index => $product) {
    $rowColor = $index % 2 == 0 ? '#f9f9f9' : '#f0f0f0';
    $availability = $product['stock'] ? '✅ В наличии' : '❌ Нет';
    $availabilityColor = $product['stock'] ? '#2e7d32' : '#c62828';
    
    echo "<tr style='background-color: $rowColor;'>";
    echo "<td><strong>{$product['name']}</strong></td>";
    echo "<td>{$product['category']}</td>";
    echo "<td>{$product['brand']}</td>";
    echo "<td style='color: #2e7d32; font-weight: bold;'>{$product['price']} руб.</td>";
    echo "<td style='color: $availabilityColor; font-weight: bold;'>$availability</td>";
    echo "</tr>";
}
echo "</table>";

//Таблица, сортированная по цене
$sortedByPrice = $products;
usort($sortedByPrice, fn($a, $b) => $a['price'] <=> $b['price']);
echo "<h2 style='color: #8B4513;'>Товары по возрастанию цены</h2>";
echo "<table>";
echo "<tr style='background-color: #8B4513; color: white;'>";
echo "<th>Наименование</th><th>Категория</th><th>Бренд</th><th>Цена</th><th>Наличие</th>";
echo "</tr>";
foreach ($sortedByPrice as $index => $product) {
    $rowColor = $index % 2 == 0 ? '#f9f9f9' : '#f0f0f0';
    $availability = $product['stock'] ? '✅ В наличии' : '❌ Нет';
    
    echo "<tr style='background-color: $rowColor;'>";
    echo "<td>{$product['name']}</td>";
    echo "<td>{$product['category']}</td>";
    echo "<td>{$product['brand']}</td>";
    echo "<td style='color: #2e7d32; font-weight: bold;'>{$product['price']} руб.</td>";
    echo "<td>$availability</td>";
    echo "</tr>";
}
echo "</table>";

//Таблица, сортированная по категории
$sortedByCategory = $products;
usort($sortedByCategory, fn($a, $b) => strcmp($a['category'], $b['category']));
echo "<h2 style='color: #8B4513;'>Товары по категориям</h2>";
echo "<table>";
echo "<tr style='background-color: #8B4513; color: white;'>";
echo "<th>Наименование</th><th>Категория</th><th>Бренд</th><th>Цена</th><th>Наличие</th>";
echo "</tr>";
foreach ($sortedByCategory as $index => $product) {
    $rowColor = $index % 2 == 0 ? '#f9f9f9' : '#f0f0f0';
    $availability = $product['stock'] ? '✅ В наличии' : '❌ Нет';
    
    echo "<tr style='background-color: $rowColor;'>";
    echo "<td>{$product['name']}</td>";
    echo "<td><strong>{$product['category']}</strong></td>";
    echo "<td>{$product['brand']}</td>";
    echo "<td style='color: #2e7d32; font-weight: bold;'>{$product['price']} руб.</td>";
    echo "<td>$availability</td>";
    echo "</tr>";
}
echo "</table>";

$grouped = [];
foreach ($products as $product) {
    $grouped[$product['category']][] = $product;
}

echo "<h2 style='color: #8B4513;'>Строительные материалы по категориям</h2>";
echo "<div style='display: flex; flex-wrap: wrap; gap: 20px;'>";
foreach ($grouped as $cat => $items) {
    echo "<div style='flex: 1; min-width: 300px; background: #f9f9f9; padding: 15px; border-radius: 10px; border-left: 4px solid #8B4513;'>";
    echo "<h3 style='color: #8B4513; margin-top: 0;'>$cat</h3>";
    foreach ($items as $item) {
        $availability = $item['stock'] ? '✅' : '❌';
        echo "<div style='margin: 8px 0; padding: 5px; background: white; border-radius: 5px;'>";
        echo "<strong>{$item['name']}</strong><br>";
        echo "<span style='color: #666;'>{$item['brand']}</span> - ";
        echo "<span style='color: #2e7d32; font-weight: bold;'>{$item['price']} р.</span> ";
        echo "<span style='font-size: 0.9em;'>$availability</span>";
        if (!empty($item['offer'])) {
            echo "<br><span style='color: #ff6b35; font-size: 0.8em;'>🎁 {$item['offer']}</span>";
        }
        echo "</div>";
    }
    echo "</div>";
}
echo "</div>";
    ?>
</body>
</html>