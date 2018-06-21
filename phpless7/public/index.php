<?php

// начинаем сессию
session_start();

// подключаем функционал
require_once '../config/params.php';
require_once '../engine/db.php';
require_once '../engine/templating.php';
require_once '../engine/models.php';
require_once '../engine/controllers.php';
require_once '../engine/routing.php';

// определяем текущий контроллер
$currentController = getControllerName();

// получаем из содержимое страницы из контроллера
$content = runController($currentController);

// выполняем рендер содержимого
echo render ('main',['content' => $content]);