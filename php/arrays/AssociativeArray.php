<?php
//Creación de Array asociativo
/**
 * Primer forma
 * $age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
 * Segunda forma
 * $age['Peter'] = "35";
 * $age['Ben'] = "37";
 * $age['Joe'] = "43";
 */
$age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
echo "Peter is " . $age['Peter'] . " years old.".PHP_EOL;
echo "---".PHP_EOL;

//Interacción con el arreglo asociativo
$age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");

foreach($age as $x => $x_value) {
  echo "Key=" . $x . ", Value=" . $x_value;
  echo "<br>".PHP_EOL;
}
echo "---".PHP_EOL;
?>