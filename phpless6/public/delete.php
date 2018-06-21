<?php
//Подключаем функционал
require_once '../config/params.php';
require_once '../engine/db.php';
require_once '../engine/models.php';
// Анализируем запросы
if ($_GET){
  $id = (int)(isset($_GET['id']) ? $_GET['id'] : 0);
    if(!$id==0){
      $sql = 'DELETE FROM `goods` WHERE `id` = ' . $id;
      $query = mysqli_query($GLOBALS['db'], $sql);
    };
header('Location: index.php');
exit;}