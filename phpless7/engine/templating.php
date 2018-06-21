<?php

/**
 * Рендер PHP шаблона
 *
 * @param [string] $template - название шаблона
 * @param [array] $variables - переменные для шаблона
 * 
 * @return void
 */
function render ($template,$variables){
  
  // включаем буферизацию вывода
  ob_start();

  // получаем переменные
  extract($variables,EXTR_OVERWRITE);

  // подключаем файл шаблона
  include TEMPLATE_DIR . '/' . $template .'.php';

  // возвращаем содержимое буфера и отключаем его
  return ob_get_clean();
echo TEMPLATE_DIR . '/' . $template .'.php';
};


/**
 * Рендер HTML шаблона
 *
 * @param string $template - файл шаблона
 * @param array $variables - переменные с значениями
 * 
 * @return string
 */
function HTMLRender ($template,$variables){
   $content = file_get_contents(TEMPLATE_DIR . '/' . $template);
     foreach ($variables as $varName => $value) {
       $content = str_replace('{{'.$varName.'}}', $value, $content);
     }
return $content;
};