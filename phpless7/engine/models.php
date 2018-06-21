<?php

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
 * Добавляет товар в корзину если его там не было
 * или увеличивает количество, если был
 *
 * @param [string] $cartName - имя корзины в сессии
 * @param [int] $addGood - ID товара
 * 
 * @return void
 */
function addToCart($cartName,$addGood){
  // Получим данные о составе корзины из сессии
  $jsonCart = $_SESSION[$cartName];
  // Преобразуем полученные данные из формата json в array
  $cart  = json_decode($jsonCart,true);
  // Проверим, есть ли в корзине уже товар с таким ИД
     if (isset($cart[$addGood])){ 
    //если такой товар есть, то находим его
     foreach ($cart as $good => $value) {
      if($good === $addGood){
         // и увеличиваем количество на 1
        $cart[$good] = $value+1;
       }
    };
  } // если товара с таким ИД еще нет, то записываем его туда
    else {
      $cart[$addGood] = 1;
    };
  // Запишем новые значения, сначала преобразовав в json
  $newCart = json_encode($cart);

  $_SESSION[$cartName] = $newCart;
};

/**
 * Возвращает содержимое корзины
 *
 * @param [string] $cartName имя корзины в сессии
 * @return array
 */
function getCart($cartName){

  $result=[];
  $jsonCart = $_SESSION[$cartName];

  if($jsonCart){
    $cart  = json_decode($jsonCart,true);
    //Модифицируем структуру для рендера, переименуем ключи, добавим наименование
    foreach($cart as $idGood => $quantity){
      $goodData = getGoodByID($idGood);
      $nameGood = $goodData['name'];
      if ($quantity > 0){
        $result[] = ['id'=> $idGood,'name'=> $nameGood,'quant'=> $quantity];
      }
    }
  }
  return $result;
};

/**
 * Удаляет товар из корзины
 *
 * @param [array] $goods
 * @param [string] $delGood
 * @return void
 */
function delFromCart($cartName,$delGood){

  $jsonCart = $_SESSION[$cartName];
  $cart  = json_decode($jsonCart,true);

      foreach ($cart as $good => $value) {
        if($good === $delGood){
         // Устанавливаем количество в 0
        $cart[$good] = 0;
        }
      }
  // Запишем новые значения, сначала преобразовав в json
  $newCart = json_encode($cart);

  $_SESSION[$cartName] = $newCart;
};

/**
 * Создание хеша с использованием соли и шифрования
 *
 * @param [string] $password
 * @return string
 */
function getHash($password){
  $result = crypt($password,PASS_SALT);

  return $result;
};

/**
 * Получение роли пользователя
 *
 * @param [string] $login
 * @param [string] $password
 * @return string
 */
function getUserRole ($login,$password){
  global $db;
  $role = 0;
  $hash = getHash($password);

  $query = mysqli_query($db, 'SELECT * FROM `users` WHERE (`login` = "'.$login.'") and (`password` = "'.$hash.'" )');
   
    if (mysqli_num_rows($query) > 0){
       $result = mysqli_fetch_assoc($query);
       $role = $result['role'];
    } 

  return $role;
};