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

  // Сначала проверим - хранятся ли в куках данные  
  $login = $_COOKIE['login'];
  $password = $_COOKIE['Password'];
  // Проверим есть ли требование сохранить куки
  $isRemember = $_POST['isRemember'] ? : 0;
  
  if (!$login){// Если в куках не сохранен логин, смотрим post
    $login = $_POST['login'] ? : 0; 
    $password = $_POST['password'] ? : 0;
  }

  // Проведем аутентификацию (получим роль)
  $userRole = getUserRole($login, $password);
  if ($userRole){
    // Если аутентификация успешна и isRemember <> 0, то запишем в куки
    if ($isRemember){
      $hash = getHash($password);
      setcookie('login', $login, time()+(3600*24));
      setcookie('password', $hash, time()+(3600*24));
    }
    // Проведем авторизацию
    if ($userRole === 'user'){
      // Если роль == user, отправляем в кабинет пользователя, в post - Имя
      header("location:/user");
    } elseif ($userRole === 'administrator') {
      // Если роль == admin, отправляем в кабинет Администратора , в post - Имя
      header("location:/admin");
    }
  } else {
    // Иначе отправим на 404
    header("location:/notFound");
  } 
};

/**
 * Личный кабинет пользователя
 *
 * @return void
 */
function runUserController(){

  return render('user',[]);
};

/**
 * Личный кабинет администратора
 *
 * @return void
 */
function runAdminController(){

  return render('admin',[]);
};


/**
 * Форма для входа в личный кабинет
 *
 * @return void
 */
function runLoginController(){
    
  $login = $_COOKIE['login'];

  if (!$login){// Если в куках не сохранен логин, выводим форму ввода
    return render('loginForm',[]);
  } else { // если куки есть, то просто перейдем на контроллер авторизации
    //runUserAuthController();
    //return render('user-auth',[]);
    header("location:/user-auth");
  }; 

};

/**
 * Выход из личного кабинета
 * удаление кук
 *
 * @return void
 */
function runLogoutController(){
  
  setcookie('login','',0);
  setcookie('password','',0);
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
 * Добавление товара в корзину
 *
 * @return void
 */
function runAddToCartController(){
  
  $id = $_POST['id'] ? : 0; 

  addToCart('cart', (int)$id);

  header("location:/");
};

/**
 * Удаление товара из корзины
 *
 * @return void
 */
function runDeleteFromCartController(){
 
  $id = $_POST['id'] ? : 0; 

  delFromCart('cart', (int)$id);

  header("location:/");
};