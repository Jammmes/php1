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
          /* === АВТОРИЗАЦИЯ === */
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
          /* === РАБОТА С ТОВАРАМИ === */
      case 'goodCard':
          $result = runGoodCardController();
          break; 
      case 'addGood':
          $result = runAddGoodController();
          break;
          /* === РАБОТА С КОРЗИНОЙ === */
      case 'addToCartAJAX':
          $result = runAddToCartAJAXController();
          break;
      case 'deleteFromCartAJAX':
          $result = runDeleteFromCartAJAXController();
          break;
          /* === РАБОТА С ЗАКАЗАМИ === */
      case 'createOrder':
          $result = runCreateOrderController();
          break; 
      case 'addOrder':
          $result = runAddOrderController();
          break;
      case 'deleteOrderAJAX':
          $result = runDeleteOrderAJAXController();
          break;    
      
      default:
          $result = runNotFoundController();
          break;
  }
  return $result;
};