<?php
//Подключаем функционал
require_once '../config/params.php';
require_once'../engine/db.php';
require_once'../engine/templating.php';
require_once'../engine/queryToDB.php';

//ЭТО ТЕСТИРОВОЧНАЯ ВЕРСИЯ, ПОТОМ ЕЕ НУЖНО ПЕРЕКИНУТЬ В ПАПКУ С ШАБЛОНАМИ

$imageId = array_key_exists('id', $_GET) ? $_GET['id'] : -1;
$image = getGalleryUnit($imageId);
?>

<!DOCTYPE html>
<html>
  <head>
    <title>lesson5</title>
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
    <div class="container">
      <!--Проверка на наличие картинки по запросу-->
      <?php if($image === null): ?>
        <h1> 404 Not Found </h1>
      <?php else: ?>
        <!-- Применяем шаблонизацию -->
        <header class="header_full">Просмотров:<?= $image['views'];?></header>    
        <div class="galleryUnit_full">
          <a href="#" class="link">
            <img class="galleryUnit__img_full" alt="..."src="<?=$image['img'];?>"></img>
          </a>
        </div>    
        <footer class="footer_full">Наименование: <?= $image['comment'];?>. Размер файла: <?= $image['size'];?> Кб.</footer>  
      <?php endif; ?>
    </div>
  </body>
</html>

<?php
//закрываем сессию
mysqli_close($GLOBALS['db']);