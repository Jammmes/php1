<?php
//Подключаем функционал
require_once '../config/params.php';
require_once'../engine/db.php';
require_once'../engine/templating.php';
require_once'../engine/queryToDB.php';

// Перезаполнение базы данных
//reloadImg('./img');
?>

<!DOCTYPE html>
<html>
  <head>
  	<title>lesson5</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="packages/jquery/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
  </head>
  <body>
    <div class="container">
      <header class="header">lesson5 - header</header>
      <div class = 'gallery' id = 'gallery'>

        <?php foreach (getImages() as $variables): ?>
        	<?php echo HTMLRender('galleryUnit.html',$variables);?>
        <?php endforeach?>

      </div>
      <button id = "refresh">Обновить</button>  
      <footer class="footer">lesson5 - footer</footer>
    </div>
  </body>
</html>

<?php    
//закрываем сессию
mysqli_close($GLOBALS['db']);
