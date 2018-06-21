<?php

/**
 * Контроллер главной страницы c товарами
 *
 * @return void
 */
function runFrontController(){

  return render('goods',[]);
};

/**
 * Контроллер авторизации пользователей
 *
 * @return void
 */
function runUserAuthController(){

  // Сначала получим данные из кук  
  $login = (isset($_COOKIE['login']))? $_COOKIE['login']: 0;
  $password = (isset($_COOKIE['password']))? $_COOKIE['password'] :0;

  if (!$password){// Если в куках не сохранен хэш, смотрим post
    $login = (isset($_POST['login'])) ? $_POST['login']: 0; 
    $password = (isset($_POST['password'])) ? $_POST['password'] : 0; 
    $isRemember = (isset($_POST['isRemember'])) ? $_POST['isRemember'] : 0;
    // Проведем аутентификацию (получим роль), для этого передадим пароль из post запроса
    $user_id = getUserID($login, $password,0);
    $userRole = getUserRole($user_id);

    if (isset($userRole)){
      // Если аутентификация успешна то запишем в куки логин и хэш на время текущей сессии
      setcookie('user_id', $user_id);
      setcookie('login', $login);
      $hash = getHash($password); 
      setcookie('password', $hash);
      //если требовалось сохранить, то запишем в куки и хэш и логин на сутки
      if ($isRemember === 'on'){
        setcookie('user_id', $user_id, time()+(3600*24));
        setcookie('password', $hash, time()+(3600*24));
        setcookie('login', $login, time()+(3600*24)); 
      }
    } else {//иначе сделаем принудительный логаут
      header("location:/logout");
    }

  } else {// Если в куках был сохранен хэш то для получения роли используем его
      // Несмотря на то, что user_id есть в куках, получим его заново
      $user_id = getUserID($login, $password,1);
      $userRole = getUserRole($user_id);
    } 

    // Проведем авторизацию
    if ($userRole === 'user'){
      // Если роль == user, отправляем в кабинет пользователя, в post - Имя
      header("location:/user");
    } elseif ($userRole === 'administrator') {
      // Если роль == admin, отправляем в кабинет Администратора , в post - Имя
      header("location:/admin");
    } else {
    // Иначе делаем выход
      header("location:/logout");
    } 
};

/**
 * Личный кабинет пользователя
 *
 * @return void
 */
function runUserController(){
  $content = [];

  return render('user',['content' =>$content]);
};

/**
 * Личный кабинет администратора
 *
 * @return void
 */
function runAdminController(){
   $content = [];

  return render('admin',[]);
};


/**
 * Форма для входа в личный кабинет
 *
 * @return void
 */
function runLoginController(){

 $login = (isset($_COOKIE['login']))? $_COOKIE['login']: 0;

  
  if (!$login){// Если в куках не сохранен логин, выводим форму ввода
    return render('loginForm',[
      'remember'=>'0',
      'login'=>'',
      'password'=>'']);
  } else { // если куки есть, то просто перейдем на контроллер авторизации
    header("location:/user-auth");
  }; 

};

/**
 * Выход из личного кабинета
 * удаление кук, очистка корзины
 *
 * @return void
 */
function runLogoutController(){
  
  setcookie('login','',0);
  setcookie('password','',0);
  setcookie('user_id','',0);
  $_SESSION['cart'] = '';

  header("location:/");
};

/**
 * Уведомление о ненайденной странице
 *
 * @return void
 */
function runNotFoundController(){

  return render('notFound',[]);
};

/**
 * Карточка товара
 *
 * @return void
 */
function runGoodCardController(){
  $id = isset($_POST['id']) ? $_POST['id'] : 0;
  $good = getGoodByID((int)$id);

  return render('goodForm',['good'=> $good]);
};

/**
 * Добавление нового товара или обновление
 * существующего товара
 *
 * @return void
 */
function runAddGoodController(){

  // Анализируем запросы
  $id = ($_POST['id'])? htmlspecialchars(strip_tags($_POST['id'])) : 0;
  $fileName = ($_FILES['fileName'])? $_FILES['fileName']: 0;
  $name  = ($_POST['name'])? htmlspecialchars(strip_tags($_POST['name'])) : 0;
  $country = ($_POST['country'])? htmlspecialchars(strip_tags($_POST['country'])) : 0;
  $price = ($_POST['price'])? htmlspecialchars(strip_tags($_POST['price'])) : 0;
  $discount_price = ($_POST['discount_price'])? htmlspecialchars(strip_tags($_POST['discount_price'])) : 0;
  $img = ($_POST['img'])? htmlspecialchars(strip_tags($_POST['img'])) : 0;


  // Проверка указания нового файла с изображением товара
  if (strlen($fileName['name'])>0){ // Если файл указан, скопируем его в папку

    if(move_uploaded_file($fileName['tmp_name'],'img/'.$fileName['name'])){
      //
    } else {
      //
    };
    // Перетрем старое значение переменной для записи в БД нового пути к файлу
    $img = '/img/'.$fileName['name'];
  };
  // Подготовим переменные для записи в БД
  $vars = [];
  $vars = [
    'name' => trim($name),
    'country' => trim($country),
    'price' => $price,
    'discount_price' => $discount_price,
    'img' => $img
  ];

  if ($id === 0){ // Если не указан ИД, значит добавление нового товара
    ($name)? addGood($vars):0;
  }else { // Если указан ИД, значит это обновление товара
    updateGood($id,$vars);
  };

header("Location:/");

}


/**
 * Добавление товара в корзину через AJAX
 *
 * @return void
 */
function runAddToCartAJAXController(){
  
  $id = isset($_POST['id']) ? $_POST['id'] : 0; 
  addToCart('cart', (int)$id);

  //Отправляем в ответ новый рендер
  $cart = render('cart',[]);
	header('Content-Type: application/json');
	echo json_encode([
		'newCart' => $cart
  ]);
	exit;

};

/**
 * Удаление товара из корзины
 *
 * @return void
 */
function runDeleteFromCartAJAXController(){
 
  $id = isset($_POST['id']) ? $_POST['id'] : 0; 
  delFromCart('cart', (int)$id);
  
  $newCart = render('cart',[]);
  header('Content-Type:application/json');
  echo json_encode([
    'newCart'=>$newCart
  ]);
  exit;
};

/**
 * Создание заказа
 *
 * @return void
 */
function runCreateOrderController() {
  $variables = getCart('cart');

  return render('orderForm', $variables);
};


/**
 * Добавление заказа и перевод в личный кабинет
 *
 * @return void
 */
function runAddOrderController(){
 
  $user_id = isset($_POST['user_id']) ? $_POST['user_id'] : 0;
  addOrder($user_id,'cart');

  header("location:/user-auth");

};

/**
 * Удаление заказа через AJAX
 *
 * @return void
 */
function runDeleteOrderAJAXController(){

  $order_id = isset($_POST['id']) ? $_POST['id'] : 0;
  deleteOrder($order_id);

  $newList = render('adminOrderList',[]);

	header('Content-Type: application/json');
	echo json_encode([
		'newOrderList' => $newList 
	]);
	exit;
};

