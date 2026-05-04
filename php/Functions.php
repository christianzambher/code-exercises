<?php declare(strict_types=1);
//La strict declaración, arrojará un "Error fatal" si el tipo de datos no coincide.
//Para especificar strict necesitamos establecer declare(strict_types=1);. Debe estar en la primera línea del archivo PHP.

//Function
function writeMsg() {
  echo "Hello world!".PHP_EOL;
}

writeMsg(); // call the function
echo "---".PHP_EOL;

//Function Arguments
function familyName($fname) {
    echo "$fname Refsnes.<br>".PHP_EOL;
  }
  
  familyName("Jani");
  familyName("Hege");
  familyName("Stale");
  familyName("Kai Jim");
  familyName("Borge");
  echo "---".PHP_EOL;
  function familyNameYear($fname, $year) {
    echo "$fname Refsnes. Born in $year <br>".PHP_EOL;
  }
  
  familyNameYear("Hege", "1975");
  familyNameYear("Stale", "1978");
  familyNameYear("Kai Jim", "1983");
  echo "---".PHP_EOL;

  //Con strict arroja error por tipo de valor
//   function addNumbers(int $a, int $b) {
//     return $a + $b;
//   }
//   echo addNumbers(5, "5 days");

//Valor de argumento predefinido
function setHeight(int $minheight = 50) {
    echo "The height is : $minheight <br>".PHP_EOL;
  }
  
  setHeight(350);
  setHeight(); // will use the default value of 50
  setHeight(135);
  setHeight(80);
  echo "---".PHP_EOL;

  //Valores devueltos
  function sum(int $x, int $y) {
    $z = $x + $y;
    return $z;
  }
  
  echo "5 + 10 = " . sum(5, 10) . "<br>".PHP_EOL;
  echo "7 + 13 = " . sum(7, 13) . "<br>".PHP_EOL;
  echo "2 + 4 = " . sum(2, 4).PHP_EOL;
  echo "---".PHP_EOL;

  //Declaración de tipo de retorno
  function addNumbers(float $a, float $b) : float {
    return $a + $b;
  }
  echo addNumbers(1.2, 5.2).PHP_EOL;
  echo "---".PHP_EOL;

  function addNumbersInt(float $a, float $b) : int {
    return (int)($a + $b);
  }
  echo addNumbersInt(1.2, 5.2).PHP_EOL;
  echo "---".PHP_EOL;

  //Pasar argumentos por referencia
  function add_five(&$value) {
    $value += 5;
  }
  
  $num = 5;
  add_five($num);
  echo $num;
?>