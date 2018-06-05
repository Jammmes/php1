<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>lesson3</title>
</head>
<body>
  <h2>=== * Задание 1 * ===</h1>
    <?php
      echo "числа с 0 до 100, которые делятся на 3 без остатка:" . "<br/>";
      $i = 0;
      while ($i < 100) {
          $i++;
          if ($i % 3 === 0) {
              echo $i . "<br/>";
          };
      };
      ?>
        <h2>=== * Задание 2 * ===</h1>
          <?php
      $j = 0;
      do {
          if ($j === 0) {
              echo $j . " - это ноль" . "<br/>";
          }
          else {
              if ($j % 2 === 0) {
                  echo $j . " - это четное число" . "<br/>";
              }
              else {
                  echo $j . " - это нечетное число" . "<br/>";
              }
          }
          $j++;
      }
      while ($j < 10);
    ?>

  <h2>=== * Задание 3 * ===</h1>
    <?php
      $cities = ['Московская' => ['Балашиха', 'Электросталь', 'Фрязино', 'Зеленоград'], 'Рязанская' => ['Касимов', 'Шацк', 'Новомичуринск', 'Ряжск'], ];
      $cities['Ленинградская'] = ['Тихвин', 'Зеленогорск', 'Выборг', 'Колпино'];
      foreach($cities as $oblast => $citiesArray) {
          echo "<h4>" . $oblast . ": " . "</h4>";
          foreach($citiesArray as $city) {
              echo $city . "<br/>";
          }
      }
    ?>

  <h2>=== * Задание 4 * ====</h1>
    <?php
      // Переводим символ. Если символа нет в словаре, вернем без изменений
      function translitChar($chr)
      {
        $alphabet = ['а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh', 'з' => 'z', 'и' => 'i', 'й' => 'Y', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c', 'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sh', 'ы' => 'yi', 'ь' => '', 'ъ' => '', 'э' => 'e', 'ю' => 'yu', 'я' => 'ya', ];
        $result = $chr;
        foreach($alphabet as $rusChar => $enChar) {
            if (mb_convert_case($chr, MB_CASE_LOWER, "UTF-8") === $rusChar) {
                $result = $enChar;
            };
        };
        return $result;
      };
      // Перевод с русского на латиницу
      function translit($text)
      {
          $result = '';
          // сначала преобразуем входную строку в массив символов
          $arrayIn = preg_split('//u', $text, -1, PREG_SPLIT_NO_EMPTY);
          // сделаем транслитерацию каждого символа
          foreach($arrayIn as $char) {
              $arrayOut[] = translitChar($char);
          };
          // выводим получившийся результат
          $result = implode('', $arrayOut);
          return $result;
      };
        $someText = 'Я помню чудное мгновенье';
        echo 'Выполняем транслитерацию строки "' . $someText . '"' . ": <br/>";
        echo translit($someText);
    ?>

  <h2>=== * Задание 5 * ===</h1>
    <?php
      function changeSpace($text)
      {
          $result = str_replace(' ', '_', $text);
          echo "<br/>";
          return $result;
      };
      $someText = 'Текст с пробелами';
      echo 'Замена в тексте "' . $someText . '"" пробелов на символ "_" :' . "<br/";
      echo changeSpace($someText);
      ?>
  <h2>=== * Задание 6 * ===</h1>
    <?php
      $goods = ['Оргтехника' => ['Сканеры', 'Принтеры', 'МФУ'], 'Бытовая техника' => ['Холодильники', 'Телевизоры', 'Пылесосы', 'Чайники'], 'Мобильные устройства' => ['Сматрфоны' => ['Samsung', 'Xiaomi', 'ZTE'], 'Планшеты', 'MP-3 плейеры']];
      function renderMenu($array)
      {
          // Просмотрим каждый элемент массива
          echo "<ul>";
          foreach($array as $key => $value) {
              // Если элемент не является массивом, делаем его рендер
              if (!is_array($value)) {
                  echo "<li>" . "$value" . "</li>";
              }
              else {
                  // иначе вызываем эту же функцию
                  echo "<li>" . "$key" . "</li>";
                  renderMenu($value);
              }
          };
          echo "</ul>";
      };
        echo "Генерируем меню: " . "<br/>";
        echo renderMenu($goods);
    ?>

  <h2>=== * Задание 7 * ===</h1>
    <?php
      for ($i = 0; $i < 10; print "$i" . "<br/>", $i++) {
      };
    ?>

  <h2>=== * Задание 8 * ===</h1>
    <?php
      echo 'Выводим только города, начинающиеся на "К":' . "<br/>";
      $cities = ['Московская' => ['Балашиха', 'Электросталь', 'Фрязино', 'Зеленоград'], 'Рязанская' => ['Касимов', 'Шацк', 'Новомичуринск', 'Ряжск'], ];
      $cities['Ленинградская'] = ['Тихвин', 'Зеленогорск', 'Выборг', 'Колпино'];
      foreach($cities as $oblast => $citiesArray) {
          echo "<h4>" . $oblast . ": " . "</h4>";
          foreach($citiesArray as $city) {
              if (mb_substr($city, 0, 1) === 'К') {
                  echo $city . "<br/>";
              }
          }
      }
?>
  <h2>=== * Задание 9 * ===</h1>
    <?php
      function translitExt($text)
      {
          $result = '';
          // сначала преобразуем входную строку в массив символов
          $arrayIn = preg_split('//u', $text, -1, PREG_SPLIT_NO_EMPTY);
          // сделаем транслитерацию каждого символа
          foreach($arrayIn as $char) {
              $arrayOut[] = translitChar($char);
          };
          // выводим получившийся результат, заменив пробелы на подчеркивания
          $result = implode('', $arrayOut);
          return str_replace(' ', '_', $result);
      };
        $someText = 'Я помню чудное мгновенье';
        echo 'Выполняем транслитерацию строки "' . $someText . '"' . ": <br/>";
        echo translitExt($someText);
    ?>
</body>
</html>