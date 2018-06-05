<!DOCTYPE html>
<html>
<head>
	<title>lesson4</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="packages/jquery/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</head>
<div class="container">
<header class="header">
	Header
</header>

<body>

<?php
//Подключаем функционал
require_once '../config/params.php';
include '../engine/functions.php';

//Генерируем галерею
galeryRender('./img');
?>

<div id="modal_form"><!-- Модальное oкнo --> 
      <span id="modal_close">X</span> <!-- Кнoпкa зaкрыть --> 
      <!-- Место для вставки картинки из галереи -->
</div>
<div id="overlay"></div><!-- Пoдлoжкa -->
</body>

<footer class="footer">
	Footer
</footer>	
</div>


</html>