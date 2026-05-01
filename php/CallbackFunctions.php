<?php
/**
 * Una función de devolución de llamada (a menudo denominada simplemente "devolución de llamada") es una función que se pasa como argumento a otra función.
 *  Cualquier función existente se puede utilizar como función de devolución de llamada. Para usar una función como función de devolución de llamada, pase una cadena que contenga el nombre de la función como argumento de otra función
 */
?>
<?php
//Pass a callback to PHP's array_map() function to calculate the length of every string in an array
function my_callback($item) {
  return strlen($item);
}

$strings = ["apple", "orange", "banana", "coconut"];
$lengths = array_map("my_callback", $strings);
print_r($lengths);
?>
<br>
<?php
//Use an anonymous function as a callback for PHP's array_map() function
$strings = ["apple", "orange", "banana", "coconut"];
$lengths = array_map( function($item) { return strlen($item); } , $strings);
print_r($lengths);
?>
<br>
<?php
//Callbacks in User Defined Functions
//Las funciones y métodos definidos por el usuario también pueden tomar funciones de devolución de llamada como argumentos. Para usar funciones de devolución de llamada dentro de una función o método definido por el usuario, llámelo agregando paréntesis a la variable y pase argumentos como con las funciones normales
function exclaim($str) {
    return $str . "! ";
  }
  
  function ask($str) {
    return $str . "? ";
  }
  
  function printFormatted($str, $format) {
    // Calling the $format callback function
    echo $format($str);
  }
  
  // Pass "exclaim" and "ask" as callback functions to printFormatted()
  printFormatted("Hello world", "exclaim");
  echo "<br>";
  printFormatted("Hello world", "ask");
?>