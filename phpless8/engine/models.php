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
  $cart  = json_decode($_SESSION[$cartName],true);
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
  $_SESSION[$cartName] = json_encode($cart);
};

/**
 * Возвращает содержимое корзины
 *
 * @param [string] $cartName имя корзины в сессии
 * @return array
 */
function getCart($cartName){

  $result=[];
  $jsonCart = isset($_SESSION[$cartName]) ? $_SESSION[$cartName] : 0;

  if($jsonCart){
    $cart  = json_decode($jsonCart,true);
    //Модифицируем структуру для рендера, переименуем ключи, добавим наименование
    foreach($cart as $idGood => $quantity){
      $goodData = getGoodByID($idGood);
      $nameGood = $goodData['name'];
      $price = $goodData[getGoodPrice()];

      if ($quantity > 0){
        $result[] = ['good_id'=> $idGood,'name'=> $nameGood,'quant'=> $quantity,'price'=> $price];
      }
    }
  }
  return $result;
};

/**
 * Функция возвращает название поля в таблице goods
 * в зависимости от дня недели 
 * (в будние дни price, а  * в выходные discount_price)
 *
 * @return string
 */
function getGoodPrice(){
  $result = (date("N") < 5) ? 'price' : 'discount_price';
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

  $cart  = json_decode($_SESSION[$cartName],true);

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
 * Получение роли пользователя по ID
 *
 * @param [int] $id
 *
 * @return string
 */
function getUserRole ($id){
  global $db;
  $role = 0;

  $query = mysqli_query($db, 'SELECT * FROM `users` WHERE `id` = '.$id);
   
    if (mysqli_num_rows($query) > 0){
       $result = mysqli_fetch_assoc($query);
       $role = $result['role'];
    } 

  return $role;
};

/**
 * Получение ИД пользователя по логину
 * и паролю/хэшу
 *
 * @param [string] $login
 * @param [string] $password
 * @param [bool] $isHash
 * 
 * @return int
 */
function getUserID ($login,$password,$isHash){
  global $db;
  $id = 0;
    if (!$isHash){// если пароль в открытом виде, то приведем его к хэшу
      $hash = getHash($password);
    }else{ // передаваемый пароль уже является хэшем
      $hash = $password;
    };
 
  $query = mysqli_query($db, 'SELECT * FROM `users` WHERE (`login` = "'.$login.'") and (`password` = "'.$hash.'" )');
   
    if (mysqli_num_rows($query) > 0){
       $result = mysqli_fetch_assoc($query);
       $id = $result['id'];
    } 

  return $id;
};


/**
 * Добавляем новый заказ из корзины
 * после добавляения заказа очищаем корзину
 *
 * @param [int] $user_id
 * @param [string] $cartName
 * 
 * @return void
 */
function addOrder($user_id,$cartName){
  global $db;

  $sql = "
    INSERT INTO `orders` (
      `user_id`,
      `date`
    ) VALUES (
      ".$user_id.",
     '".date('Y-m-d H:i:s')."'    
    );";
  mysqli_query($db,$sql); 
  // Получим ИД заказа 
  $id_order = mysqli_insert_id($db);

  $cart = getCart($cartName);

  foreach ($cart as $good => $value) {

    mysqli_query($db,"INSERT INTO `orders_rows` (
      `good_id`,
      `price`,
      `quantity`,
      `id_order`)
       VALUES (
        ".$value['good_id'].",
        ".$value['price'].",
        ".$value['quant'].",
        ".$id_order.")" );
  };

  $_SESSION[$cartName] = '';
};

/**
 * Возвращаем список заказов пользователя
 *
 * @param [int] $user_id
 * 
 * @return array
 */
function getOrdersByUser($user_id){
  global $db;
  $result = [];

  $sql = "SELECT o.`id`,o.`user_id`,o_r.`quantity`,o_r.`price`,o.`date`,g.`name`,g.`country`
   FROM `orders` o
   JOIN `orders_rows` o_r
     ON o.`id`=o_r.`id_order`   
   JOIN `goods` g 
     ON o_r.`good_id` = g.`id`
   WHERE o.`user_id` = ".$user_id." ORDER BY o.`id`";

  $query = mysqli_query($db, $sql);
  while ($row =  mysqli_fetch_assoc($query)) {
    $result[] = $row;
  }

  return $result;
};


/**
 * Возвращаем список всех заказов c содержимым
 *
 * @return array
 */
function getOrders(){
  global $db;
  $result =[];
  $sql =
 "SELECT o.`id`,o.`user_id`,o_r.`quantity`,o_r.`price`,o.`date`,
 g.`name`,g.`country`,ROUND(o_r.`quantity`* o_r.`price`,2) AS `summ`,
 u.`login`
   FROM `orders` o
   JOIN `orders_rows` o_r
     ON o.`id`=o_r.`id_order`   
   JOIN `goods` g 
     ON o_r.`good_id` = g.`id`
   JOIN `users` u
     ON u.`id` = o.`user_id` ORDER BY o.`id`";

  $query = mysqli_query($db, $sql);
  while ($row = mysqli_fetch_assoc($query)){
    $result[] = $row;
  }

  return $result;
};

/**
 * Получим только заголовки заказов
 *
 * @return void
 */
function getTitleOrders(){
  global $db;
  $result =[];
  $sql = "
  SELECT o.`id`,u.`login`,o.`date`
  FROM
  `orders` o
  JOIN `users` u 
  ON o.`user_id` = u.`id`";
  $query = mysqli_query($db,$sql);
  while($row = mysqli_fetch_assoc($query)){
    $result[] = $row; 
  };
  return $result;
};

/**
 * Возвращает список заголовков заказов по пользователю
 *
 * @param [int] $user_id
 * 
 * @return array
 */
function getTitleOrdersByUser($user_id){
  global $db;
  $result =[];
  $sql = "
  SELECT o.`id`,u.`login`,o.`date`
  FROM
  `orders` o
  JOIN `users` u 
  ON o.`user_id` = u.`id`
  WHERE u.`id` = ".$user_id;
  $query = mysqli_query($db,$sql);
  while($row = mysqli_fetch_assoc($query)){
    $result[] = $row; 
  };
  return $result;
};


/**
 * Получим содержимое заказа по его ИД
 *
 * @param [int] $id_order
 * 
 * @return array
 */
function getContentOrderById($id_order){
  global $db;
  $result =[];
  $sql = "
  SELECT r.`quantity` , r.`price` , g.`name` , g.`country`,
  ROUND(r.`quantity`* r.`price`,2) AS `summ` 
  FROM  `orders_rows` r
  JOIN  `goods` g ON r.`good_id` = g.`id` 
  JOIN  `orders` o ON o.`id` = r.`id_order` 
  WHERE o.`id` = ".$id_order;

  $query = mysqli_query($db, $sql);
  while ($row = mysqli_fetch_assoc($query)){
  $result[] = $row;
  };
  return $result;
};


/**
 * Удаление заказа по ИД
 *
 * @param [int] $id
 * 
 * @return void
 */
function deleteOrder($id){
  global $db;

  $sql1 = "DELETE FROM `orders` WHERE `id` = ".$id;
  $sql2 = "DELETE FROM `orders_rows` WHERE `id_order` = ".$id;
  
  mysqli_begin_transaction($db, MYSQLI_TRANS_START_READ_WRITE);
  mysqli_query($db, $sql1);
  mysqli_query($db, $sql2);

  mysqli_commit($db);
  
  return '';
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
    `discount_price`,
    `img`)
  VALUES
   (NULL,
   "."'".$variables['country']."'".",
   "."'".$variables['name']."'".",
   ".$variables['price'].",
   ".$variables['discount_price'].",
   "."'".$variables['img']."'".")");

};

/**
 * Обновление таблицы товаров 
 *
 * @param [int] $id
 * @param [array] $variables
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
    `discount_price` = ".$variables['discount_price'].",
    `img` = "."'".$variables['img']."'"."
  WHERE `id` = ".$id); 
};