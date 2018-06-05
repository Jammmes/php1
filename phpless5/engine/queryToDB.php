<?php

/**
 * Подключается к базе данных и возвращает отсортированный по просмотрам
 * список изображений в виде ассоциативного массива
 * @return ассоциативный массив
 */
function getImages(){
  global $db;
  $imageList =[];
  $res = mysqli_query($db,'SELECT * FROM `photos` ORDER BY `views` DESC');
    while ($row = mysqli_fetch_assoc($res)){
      $imageList[]=$row;
    };
  return $imageList;
}

/**
 * Возвращает данные об изображении из базы данных по ID
 * Увеличивает значение views в базе данных
 * @param integer $id 
 * @return ассоциативный массив
 */
function getGalleryUnit($id){
  global $db;
  
  $res = mysqli_query($db,'SELECT * FROM `photos` where `id` = '.$id);
  $row = mysqli_fetch_assoc($res);
  //Увеличиваем кол-во просмотров картинки
  increaseView($id);
  return $row;
}

/**
 * Увеличивает количество просмотров картинки по ее ID
 * @param integer $id 
 * @return none
 */
function increaseView($id){
  global $db;
  mysqli_query($db, 'UPDATE `photos` SET `views`= `views`+1 WHERE `id` = '.$id);
}

/**
 * Загружает данные о фото в базу данных, предварительно удалив старые данные
 * @param string $path - путь до папки с картинками
 * @return none
 */
function reloadImg($path){
  global $db;
  //очистим таблицу
  mysqli_query($db, 'TRUNCATE TABLE `photos`');
  //заполним таблицу
  foreach(glob("$path"."/*.jpg") as $img) {
  $res =  mysqli_query($db,"INSERT INTO `photos`(`id`, `img`, `size`, `views`, `comment`)VALUES
     (NULL,"."'".$img."'".",".floor(filesize($img)/1024).",0,"."'"."no-comment"."'".")");
  }
 var_dump($res);
}