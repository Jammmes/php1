<?php
//Подключаем функционал
require_once '../config/params.php';
require_once '../engine/db.php';
require_once '../engine/models.php';
require_once '../engine/templating.php';
// Анализируем запросы
if ($_GET){
  $id = (int)(isset($_GET['id']) ? $_GET['id'] : 0);
  // Если в GET запросе указан ID, подготовим конструкцию ?id=$id
  $ifID ='';
    if($id) {
      $ifID = '?id='.(int)$_GET['id'];
    };
  $good = getGoodByID($id);
};
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
    <div class="row">
      <div class="col-sm-3 col-xs-2 "></div>
      <div class="col-sm-6 col-xs-8 ">
        <!-- Подключаем карточку товара -->
        <?php require_once 'goodForm.php'; ?>
      </div>
      <div class="col-sm-3 col-xs-2 "></div>
    </div>

  </body>
</html>
<?php    
//закрываем сессию
mysqli_close($GLOBALS['db']);
