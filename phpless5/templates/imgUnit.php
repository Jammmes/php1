

<?php
//Подключаем функционал
require_once '../config/params.php';
require_once'../engine/db.php';
require_once'../engine/templating.php';
require_once'../engine/queryToDB.php';

/*
ЭТО НЕАКТУАЛЬНАЯ ВЕРСИЯ ШАБЛОНА.
АКТУАЛЬНАЯ ЛЕЖИТ В PUBLIC ДО УСТРАНЕНИЯ ПРОБЛЕМЫ 
С ВЫЗОВОМ ИЗ ПАПКИ ШАБЛОНОВ

Здесть сначала получить ИД из заголовка, проверить на валидность
Потом функцией вытащить конкретную картинку по ИД (вариаблес)
Дальше уже по этим вариаблес сгенерить как то общую страницу
*/
?>



<!DOCTYPE html>
<html>
<head>
  <title>{{comment}}</title>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
  <div class="container">

    <header class="header">Размер файла: {{size}} Кб.</header>
    <div class = 'gallery' id = 'gallery'> 	
      <div class="galleryUnit">
	  	<a href="#">
	  	  <img class="galleryUnit__img_full" alt="..."src="{{img}}"></img>
	  	</a>
	  </div>
    </div>	  	
    <footer class="footer">
    	<div class="imgCaption">
	  		<div class="imgCaption__title">Просмотров:</div>
	  		<div class="imgCaption__views">{{views}}</div>
	  	</div>
    </footer>	
  </div>
</body>
</html>


<?php
//закрываем сессию
mysqli_close($GLOBALS['db']);