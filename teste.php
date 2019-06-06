<?php
function limpar_texto($str){ 
  return preg_replace("/[^0-9]/", "", $str); 
}
// Exemplo de Utilização

$origDate = "2019-01-15";
 
$newDate = date("dmY", strtotime($origDate));
echo $newDate.$origDate;
echo limpar_texto( $newDate );

// vai retornar 1456
?>