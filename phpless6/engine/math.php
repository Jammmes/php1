<?php
/**
 * Выполняет арифметические операции
 * с двумя числами
 *
 * @param [int/float] $a первое число
 * @param [int/float] $b второе число
 * @param [int/float] $operation
 * @return string
 */
  function mathOperation($a,$b,$operation){
    $result = 'Результат операции '.$a.' '.$operation.' '.$b.' = ';
    switch ($operation){
      case 'plus':
      $result .= $a + $b;
      break;
      case 'minus':
      $result .= $a - $b;
      break;
      case 'multi':
      $result .= $a * $b ;
      break;
      case 'division':
      if($a == 0 || $b == 0){
        $result = 'Делить на ноль нельзя!';
      }else
        {$result .=  $a / $b;};
      break;
      default:
      $result = 'Неизвестная операция';
    }
    return $result;
  }; 