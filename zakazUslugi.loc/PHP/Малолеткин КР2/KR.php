<?php
class Ad{
    protected $head;
    protected $text;
    protected $date;
    protected $views;

    public function __construct($head, $text, $date = null, $views = 0){
        $this->head = $head;
        $this->text = $text;
        $this->date = $date ?: date("Y-m-d H:i:s");
        $this->views = $views;
    }
    public function printAd(){
        echo "<h3>{this->head}</h3>";
        echo "<p>{this->text}</p><hr>";
    }
    public function toArray(){
        return [
        "head" => $this->head,
        "head" => $this->text,
        "head" => $this->date,
        "head" => $this->views
        ];
    }
}
class ImgAd extends Ad{
    protected $img;

    public function __construct($head, $text, $img, $date = null, $views = 0){
        parent:: __construct($head, $text, $date, $views);
        $this->img = $img;
    }

    public function printAd(){
        parent::printAd();
        echo "<img scr='{this->img}' width='200'><hr>";
    }
    public function toArray(){
        $a = parent::toArray();
        $a["img"] = $this->img;
        return $a;
    }
}
class BoldAd extends ImgAd{
    public function printAd(){
        echo "<hr>";
        echo "<h3><b>head</b></h3>";
        echo "<p><b>text</b></p>";
        echo "<img scr='img' width='200'><hr>";
    }
    public function toArray(){
        $a = parent::toArray();
        $a["bold"] = 1;
        return $a;
    }
}

$ads = [];
if(file_exists("ads.json")){
    $ads =
    json_decode(file_get_contents("ads.json"), true);
}

$objAds = [];

foreach($ads as $ad){
    if(!empty($ad["img"])){
        if(!empty($ad["bold"])){
            $objAds[] = new BoldAd($ad["head"], $ad["text"], $ad["img"], $ad["date"] ?? null, $ad["views"] ?? 0);
        } else {
            $objAds[] = new ImgAd($ad["head"], $ad["text"], $ad["img"], $ad["date"] ?? null, $ad["views"] ?? 0);
        }
    } else {
        $objAds = new Ad($ad["head"], $ad["text"], $ad["date"] ?? null, $ad["views"] ?? 0);
    }
}

if(!empty($_POST["head"]) && !empty($_POST["text"])){
    $head = $_POST["head"];
    $text = $_POST["text"];
    $img = trim($_POST["img"]);

    if($img == ""){
        $objAds[] = new Ad($head, $text);
    } else {
        $objAds[] = new ImgAd($head, $text, $img);
    }
    $saveArr = [];
    foreach($objAds as $o) $saveArr[] = $o->toArray();
    file_put_contents("ads.json", json_encode(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));

    header("Location: " . $_SERVER["PHP_SELF"]);
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Доска объявлений</title>
</head>
<body>

<h2>Добавить объявление</h2>
<form method="post">
    Заголовок: <br>
    <input type="text" name="head" required><br><br>

    Текст: <br>
    <textarea type="text" required></textarea><br><br>

    Изображение (URL): <br>
    <input type="text" name="img"><br><br>

    <input type="submit" value="Добавить">
</form>

<hr>

<h2>Все объявления</h2>

<?php
foreach($objAds as $ad){
    $ad->printAd();
}
?>

</body>
</html>

echo