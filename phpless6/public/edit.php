<?php
// Подключаем функционал
require_once '../config/params.php';
require_once '../engine/db.php';
require_once '../engine/models.php';
// Анализируем запросы
  $id = (int)(isset($_GET['id']) ? $_GET['id'] : 0);
  if($_FILES['name']){
    // Если файл указан, то запишем его в папку IMG, а его путь в БД
    if (move_uploaded_file($_FILES['img']['tmp_name'],'img/'.$_FILES['img']['name'])){
    }
      else {
    // echo $_FILES['img']['error'];
      };
    $img = '/img/'.$_FILES['img']['name'];
  }else{
    // Если файл не указан, то найдем старое значение пути из БД и перезапишем
    $good = getGoodById($id);
    $img = $good['img'];
  };
    // Соберем все данные о товаре в переменную
  if ($_POST){
    $vars = [];
    $vars =
    ['name' => htmlspecialchars(strip_tags($_POST['name'])),
    'country' => htmlspecialchars(strip_tags($_POST['country'])),
    'img' => $img,
    'price' => htmlspecialchars(strip_tags($_POST['price']))];
  };    
  if($id === 0){
    // Не указан ID, значит добавление нового товара
    addGood($vars);
  } else{
    // Указан ID, значит это обновление
    updateGood($id,$vars);
  };
header('Location: index.php');
exit;
?>