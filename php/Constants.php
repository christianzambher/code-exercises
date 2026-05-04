<?php
//Crear una constante
/**Para la creación de una constante, se usa define()
 * define(name, value, case-insensitive)
 * name: especifica el nombre de la constante
 * value: especifica el valor de la constante
 * case-insensitive: Especifica si el nombre de la constante no debe distinguir entre mayúsculas y minúsculas.El valor predeterminado es false.
 */
define("GREETING", "Welcome to W3Schools.com!");
echo GREETING.PHP_EOL;

// define("GREETING", "Welcome to W3Schools.com!", true);
// echo greeting;

//Constant Array
define("cars", [
    "Alfa Romeo",
    "BMW",
    "Toyota"
  ]);
  echo cars[0].PHP_EOL;

//Constant Global
define("ABC", "Welcome to W3Schools.com! XD");
function myTest() {
  echo ABC.PHP_EOL;
}
myTest();
?>