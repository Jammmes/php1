<?php

/**
 * Возвращает имя контроллера
 *
 * @return string
 */
function getControllerName (){
  // получим адрес  
  $parts = explode('/',$_SERVER['REQUEST_URI']);
  // преобразуем его в массив
  $parts = array_filter($parts);
  // возвращаем первое значение массива, если его нет - возвращаем контроллер главной страницы
  return reset($parts) ? reset($parts): 'main';
};

/**
 * Находит и запускает контроллер по его имени
 *
 * @param [string] $controllerName
 * 
 * @return void
 */
function runController($controllerName){
  
  switch ($controllerName) {
      case 'main':
          $result = runFrontController();
          break;
      case 'user-auth':
          $result = runUserAuthController();
          break;
      case 'user':
          $result = runUserController();
          break;
      case 'admin':
          $result = runAdminController();
          break;
      case 'login':
          $result = runLoginController();
          break;
      case 'logout':
          $result = runLogoutController();
          break;
      case 'goodCard':
          $result = runGoodCardController();
          break; 
      case 'addToCart':
          $result = runAddToCartController();
          break;
      case 'deleteFromCart':
          $result = runDeleteFromCartController();
          break;
      case 'createOrder':
          $result = runCreateOrderController();
          break;      
      
      default:
          $result = runNotFoundController();
          break;
  }
  return $result;
};