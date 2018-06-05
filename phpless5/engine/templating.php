<?php

/**
 * Функция делает рендер объекта по шаблону
 * и заполняет значения в нем переменными
 * @param string $template - файл шаблона
 * @param array $variables - переменные с значениями
 * @return string
 */
function HTMLRender ($template,$variables){
   $content = file_get_contents(TEMPLATE_DIR . '/' . $template);
     foreach ($variables as $varName => $value) {
       $content = str_replace('{{'.$varName.'}}', $value, $content);
     }
return $content;
};

