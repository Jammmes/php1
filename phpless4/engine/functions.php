<?php

/**
 * Функция получает путь до картинок
 * и возвращает заполненную данными структуру галереи
 * @param type string $path - путь до картинок 
 * @return type string - структура галереи
 */
function galeryRender($path){

  echo "<div class = 'galery' id = 'galery' >";
  
  	foreach(glob("$path"."/*.jpg") as $img) {
  	echo createUnit('galeryUnit.php',$img);
  }
  echo "</div>";

};

/**
 * Функция делает рендер одного юнита галереи
 * @param type $template - шаблон юнита
 * @param type $img - путь до картинки
 * @return type
 */
function createUnit($template,$img){
  include TEMPLATE_DIR . '/' . $template;
}

?>



