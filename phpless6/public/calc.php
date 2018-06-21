<?php
//Подключаем функционал
require_once '../engine/math.php';

  // Анализируем запросы
  $oper = (isset($_GET['oper']) ? $_GET['oper'] : 0);
  if ($_GET){
    $vars = [];
    $vars =
    ['one' => htmlspecialchars(strip_tags($_GET['one'])),
    'two' => htmlspecialchars(strip_tags($_GET['two']))];
  };
  $result = mathOperation($vars['one'],$vars['two'],$oper);
?>

<!DOCTYPE html>
<html>
  <head>
  	<title>lesson6</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>

    <div class="alert alert-primary text-center" role="alert">
    LESSON 6
    </div>
    <!-- Подключаем навигацию -->
    <?php require_once 'nav.php'; ?>

    <div class="row">
      <div class="col-sm-4 col-xs-6 "></div>
      <div class="col-sm-4 col-xs-6 ">
        <form class="border p-2" action="" method="get">
            <div class="form-group">
              <label for="firstNum">Первое число</label>
              <input type="text" name = "one" class="form-control" id="firstNum"  value="">
            </div>
            <div class="form-group">
              <label for="secondNum">Второе число</label>
              <input type="text" name = "two" class="form-control" id="secondNum"  value="">
            </div>
            <div class="form-group">
              <label for="result">Результат вычисления</label>
              <input type="text" class="form-control" id="result"  value="<?=$result;?>">
            </div>
            <div class="form-group text-center">
              <button type="submit" name = "oper" value = "plus" class="btn btn-primary m-1">Сложение</button>
              <button type="submit" name = "oper" value = "minus" class="btn btn-primary m-1">Вычитание</button>
              <button type="submit" name = "oper" value = "multi" class="btn btn-primary m-1">Умножение</button>
              <button type="submit" name = "oper" value = "division" class="btn btn-primary m-1">Деление</button>
            </div>
        </form>
      </div>
      <div class="col-sm-4 col-xs-6 "></div>
    </div>

  </body>
</html> 

