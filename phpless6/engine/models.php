<?php

/**
 * Получение списка отзывов
 *
 * @return assoc array
 */
function getReviews (){
  global $db;

  $reviewList = [];
  $res = mysqli_query($db,'SELECT * FROM `reviews`');
    while ($row = mysqli_fetch_assoc($res)) {
      $reviewList[]=$row;
    };
  return $reviewList;
};

/**
 * Добавление нового отзыва
 *
 * @param [array] $variables
 *
 * @return void
 */
function addReview($variables){
  global $db;

  mysqli_query($db, "INSERT INTO `reviews` 
  ( `id`,
    `email`,
    `user`,
    `comment`) 
  VALUES
   (NULL,
   "."'".$variables['email']."'".",
   "."'".$variables['user']."'".",
   "."'".$variables['comment']."'".")");
};

/**
 * Получение товара по ИД
 *
 * @param [integer] $id
 *
 * @return assoc array
 */
function getGoodByID($id){
  global $db;

  $res = mysqli_query($db,'SELECT * FROM `goods` WHERE `id` = '.$id);
  return mysqli_fetch_assoc($res); 
};

/**
 * Получение списка товаров
 *
 * @return assoc array
 */
function getGoods(){
  global $db;

  $goodsList = [];
  $res = mysqli_query($db,'SELECT * FROM `goods`');
    while ($row = mysqli_fetch_assoc($res)) {
      $goodsList[]=$row;
    };
  return $goodsList;
};

/**
 * Добавление нового товара
 *
 * @param [array] $variables
 *
 * @return void
 */
function addGood($variables){
  global $db;

  mysqli_query($db, "INSERT INTO `goods` 
  ( `id`,
    `country`,
    `name`,
    `price`,
    `img`)
  VALUES
   (NULL,
   "."'".$variables['country']."'".",
   "."'".$variables['name']."'".",
   ".$variables['price'].",
   "."'".$variables['img']."'".")");
};

/**
 * Обновление таблицы товаров 
 *
 * @param [int] $id
 * @param [assoc array] $variables
 *
 * @return void
 */
function updateGood($id,$variables){
  global $db;

  mysqli_query($db, "UPDATE `goods` 
  SET 
    `country` = "."'".$variables['country']."'".",
    `name` = "."'".$variables['name']."'".",
    `price` = ".$variables['price'].",
    `img` = "."'".$variables['img']."'"."
  WHERE `id` = ".$id); 
};