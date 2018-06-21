<?php
// Подключаем функционал
require_once '../config/params.php';
require_once '../engine/db.php';
require_once '../engine/templating.php';
require_once '../engine/models.php';
// Анализируем запросы
if($_POST){
  $vars = [];
  $vars =
  ['email' => htmlspecialchars(strip_tags($_POST['email'])),
  'user' => htmlspecialchars(strip_tags($_POST['user'])),
  'comment' => htmlspecialchars(strip_tags($_POST['comment']))];
  addReview($vars);
  header("location:index.php");
  }
?>

<!DOCTYPE html>
<html>
  <head>
  	<title>lesson6</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="packages/open-iconic-master/font/css/open-iconic-bootstrap.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/styles.css">
    <script src="packages/jquery/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
  </head>
  <body>
    <div class="alert alert-primary text-center" role="alert">LESSON 6</div>
    <!-- Подключаем навигацию -->
    <?php require_once 'nav.php'; ?>
    <!-- Выводим список товаров -->
    <ul class="list-group list-group-flush">
      <?php foreach(getgoods() as $good ):?>
        <?php echo HTMLRender('goodUnit.html',$good);?>
      <?php endforeach;?>
    </ul>

    <div class="alert alert-primary text-center" role="alert">Отзывы</div>

    <div class="row">
      <div class="col-sm-1 col-xs-1 "> </div>
      <div class="col-sm-6 col-xs-6 ">
        <ul class="list-group list-group-flush">
        <!-- Выводим отзывы -->
          <?php foreach(getReviews() as $review ):?>
            <?php echo HTMLRender('reviewUnit.html',$review);?>
          <?php endforeach;?>
        </ul>
      </div>
      <div class="col-sm-4 col-xs-4 ">
      <!-- Подключаем форму для подачи отзыва -->
        <?php require_once 'reviewForm.php'; ?>
      </div>
     <div class="col-sm-1 col-xs-1 "></div>
    </div>
  </body>
</html>

<?php    
//закрываем сессию
mysqli_close($GLOBALS['db']);
