<!DOCTYPE html>
<html>

<?php
  $titleText = 'The title was genarated via PHP';
  $year = date("Y");
?>

  <head>
    <meta charset="utf-8">
    <title>	
      <?php 
        echo "$titleText";
      ?>	
    </title>
  </head>
  <body>
    <h1>
      <?php
        echo "The current year is $year";
      ?>
    </h1>
    <hr>
    <h3>
      <?php
      $a =5;
      $b ='05';
      echo '1.)';
      var_dump($a==$b);
      echo '// $a и $b равны потому, что сравнение выполнено по значению, без учета типов;<br/>';
      echo '2.)';
      var_dump((int)'012345');
      echo '// (int)`012345` = 12345 потому, что было выполнено преобразование к целочисленному типу;<br/>';
      echo '3.)';
      var_dump((float)123.0===(int)123.0);
      echo '// (float)123.0===(int)123.0 = false потому, что сравнение выполнено с учетом типов, а типы разные;<br/>';
      echo '4.)';
      var_dump((int)0===(int)'hello world');
      echo '// true потому что попытка приведения строки к типу int возвращает ноль, и в данном примере выполняется строгое сравнени 0 = 0;<br/>';
      ?>
    </h3>
    <hr>
    <h3>
   	  <?php
   	  $a = 1;
   	  $b = 2;
   	  echo "Исходные значения: переменная ".'$a'." = $a, переменная ".'$b'." = $b;<br/>";
   	  $a = $a + $b;
   	  echo'1.) $a = $a + $b.'.' Теперь $a = '. "$a".' , a $b = '. "$b;<br/>";
   	  $b = $a - $b;
   	  echo'2.) $b = $a - $b.'.' Теперь $b = '. "$b".' , a $a = '. "$a;<br/>";
   	  $a = $a - $b;
   	  echo'3.) $a = $a - $b;<br/>';
   	  echo "Конечные значения: переменная ".'$a'." = $a, переменная ".'$b'." = $b;<br/>";
   	  ?>
    </h3>
  </body>
</html>







