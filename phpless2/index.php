<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>lesson2</title>
    <style type="text/css">
      footer{
        border:1px solid;
        text-align: center;
        font-size: 48px;
        margin-top: 25px;
      }
      body{
        display: flex;
        flex-direction: column;
        justify-content: space-around;
      }
    </style>
  </head>
  <body>
    <h2>=== * Задание 1 * ===</h1>
    <?php
      $aa = rand(-10 , 10);
      $bb = rand(-10 , 10);
      echo 'Переменная $aa = '.$aa.', переменная $bb = '.$bb."<br/>";
        function compare($a , $b){
        	$result = 0;
        	if ($a >= 0 && $b >= 0) {
        		$result = $a - $b;
        	}
        	if($a < 0 && $b < 0){
        		$result = $a * $b;
        	}
        	if(($a < 0 && $b >= 0) || ($b < 0 && $a >= 0)){	
        		$result = $a + $b;
        	}
          return $result;
        };
      echo "Результат функции = ".compare($aa , $bb)."<br/>";
    ?>
    <h2>=== * Задание 2 * ===</h1>
    <?php
      $a = rand(0,15);
      echo 'Присваиваем переменной $a случайное значение от 0 до 15'."<br/>";
      echo '$a = '.$a."<br/>";
      echo ' --- '."<br/>";
      switch ($a) {
       	case '0':
       		echo'0'."<br/>";
       	case '1':
       		echo'1'."<br/>";
       	case '2':
       		echo'2'."<br/>";
       	case '3':
       		echo'3'."<br/>";
       	case '4':
       		echo'4'."<br/>";
       	case '5':
       		echo'5'."<br/>";
       	case '6':
       		echo'6'."<br/>";
        case '7':
       		echo'7'."<br/>";
       	case '8':
       		echo'8'."<br/>";
       	case '9':
       		echo'9'."<br/>";
       	case '10':
       		echo'10'."<br/>";
       	case '11':
       		echo'11'."<br/>";
       	case '12':
       		echo'12'."<br/>";
       	case '13':
       		echo'13'."<br/>";
       	case '14':
       		echo'14'."<br/>";
       	case '15':
       		echo'15'."<br/>";
       	break;
      } 
    ?>
    <h2>=== * Задание 3 * ===</h1>
    <?php
      function plus ($a,$b){
        return $a + $b;
      };
      function minus ($a,$b){
        return $a - $b;
      };
      function multi ($a,$b){
        return $a * $b;
      };
      function division ($a,$b){
        return $a / $b;
      };

      echo 'function plus (2,3) = '.plus (2,3)."<br/>";
      echo 'function minus (3,2) = '.minus (3,2)."<br/>";
      echo 'function multi (4,2) = '.multi (4,2)."<br/>";
      echo 'function division (8,2) = '.division (8,2)."<br/>";
    ?>
    <h2>=== * Задание 4 * ====</h1>
    <?php
      function mathOperation($a,$b,$operation){
        $result = 0;
        switch ($operation){
          case 'plus':
          $result = plus ($a,$b);
          break;
          case 'minus':
          $result = minus ($a,$b);
          break;
          case 'multi':
          $result = multi ($a,$b);
          break;
          case 'division':
          $result = division ($a,$b);
          break;
          default:
          $result = 'Неизвестная операция';
        }
        return $result;
      }; 
      echo "function mathOperation (2,3,'plus') = ".mathOperation (2,3,'plus')."<br/>";
      echo "function mathOperation (3,2,'minus') = ".mathOperation (3,2,'minus')."<br/>";
      echo "function mathOperation (4,2,'multi') = ".mathOperation (4,2,'multi')."<br/>";
      echo "function mathOperation (8,2,'division') = ".mathOperation (8,2,'division')."<br/>";
      echo "function mathOperation (8,2,'log') = ".mathOperation (8,2,'log')."<br/>";
    ?>
    <h2>=== * Задание 5 * ===</h1>
    <?php 
    $year = date("Y");
    echo "Текущий год:".$year." Он так же указан в подвале этой страницы";
    ?>
    <h2>=== * Задание 6 * ===</h1>
    <?php 
      function power($val,$pow){
      	if ($pow != 1){
      	return	$val * power($val , $pow-1);
      	} else {
      		return $val * 1;
      	};
      };
      echo 'результат функции power(2,3) = '.power(2,3);
    ?>
    <h2>=== * Задание 7 * ===</h1>
    <?php 
      // Основная функция для вывода текущего времени
    	function getTimeToText(){
        // Получим текущее значение часов и минут в виде строк с ведущим нулем
        $hours = date("H");
        $minutes = date("i");

        // Функция преобразовывает входящее кол-во часов в формате '05' в формат '05 часов'
    	  function hoursToText($hh){
    	    $txt = $hh.' час';
    	    // Проверяем только последнюю цифру
    	    switch ($hh[1]) {
    	    	// Если 1, то "часов", но кроме 11
    	    	case '1':
    	    	  if ($hh === '11'){
    	    	    $txt = $txt.'ов';
    	    	  };
    	    	break;
    	    	case '2':
    	    	case '3':
    	    	case '4':
    	    		// 2,3,4 кроме десятка - "часа", в первом десятке - "часов""
    	  	  	if ($hh[0]!='1'){
    	  	  	$txt = $txt.'а';
    	  	  	} else{
    	  	  		$txt = $txt.'ов';
    	  	  	}
    	    	break;
    	    	default:
    	    	// во всех остальных случаях - "часов""
    	    	  $txt = $txt.'ов';
    	    };
    	    return $txt;
    	  };

        // Функция преобразовывает входящее кол-во минут в формате '05' в формат '05 минут'
    	  function minutesToText($mm){
    	    $txt = $mm.' минут';
    	  // Проверяем только последнюю цифру
    	    switch ($mm[1]) {
    	  	// Если 1, то заканчивается на а, но кроме 11
    	  	case '1':
    	  	  if ($mm != '11'){
    	  	    $txt = $txt.'а';
    	  	  };
    	  	break;
    	  	case '2':
    	  	case '3':
    	  	case '4':
    	  	// 2,3,4 в первом десятке - "минут", в остальных случаях - "минуты"
    	  	  if ($mm[0]!='1'){
    	  	  	$txt = $txt.'ы';
    	  	  	}
    	  	break;
    	    };
    	  return $txt;
    	  };

    	  return "Текущее время: ".hoursToText($hours)." ".minutesToText($minutes);
    	};
    	
      echo getTimeToText()."<br/>";
    ?>
    <footer>
      <?php
      echo $year;
      ?>
    </footer>
  </body>
</html>