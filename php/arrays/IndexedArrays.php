<?php
//Creación de un array indexado
$cars[0] = "Volvo";
$cars[1] = "BMW";
$cars[2] = "Toyota";
echo "I like " . $cars[0] . ", " . $cars[1] . " and " . $cars[2] . ".".PHP_EOL;
echo "---".PHP_EOL;

//Ciclo de un arreglo indexado
$arrlength = count($cars);

for($x = 0; $x < $arrlength; $x++) {
  echo $cars[$x];
  echo "<br>".PHP_EOL;
}
echo "---".PHP_EOL;
?>