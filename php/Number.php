<?php
//Integer
/**
 * PHP_INT_MAX Integer mas grande soportado
 * PHP_INT_MIN Integer mas pequeño soportado
 * PHP_INT_SIZE Size de un Integer en bytes
 */
/**
 * is_int()
 * is_integer() alias de is_int()
 * is_long() alias de is_int()
 */
$ni = 5985;
var_dump(is_int($ni));
$ni = 59.85;
var_dump(is_int($ni));
?>
<?php
//Float
/**
 * PHP_FLOAT_MAX Numero mas grande del tipo float
 * PHP_FLOAT_MIN Numero mas pequeño positivo del tipo float
 * - PHP_FLOAT_MAX Numero mas pequeño negativo del tipo float
 * PHP_FLOAT_DIG Cantidad de dígitos decimales que se pueden redondear en un flotante y viceversa sin perdida de precision
 * PHP_FLOAT_EPSILON el numero positivo representable mas pequeño x, de modo que x + 1.0! = 1.0
 */
/**is_float()
 * is_double() - alias de is_float()
 */
$x = 10.365;
var_dump(is_float($x));
//Infinity
/**
 * is_finite()
 * is_infinite()
 */
$inf = 1.9e411;
var_dump($inf);
//NaN - Not a Number
/**
 * is_nan()
 */
$x = acos(8);
var_dump($x);

//is_numeric()
$x = 5985;
var_dump(is_numeric($x));

$x = "5985";
var_dump(is_numeric($x));

$x = "59.85" + 100;
var_dump(is_numeric($x));

$x = "Hola";
var_dump(is_numeric($x));

//Casting String and Floats to Integer
// Cast float to int
$x = 23465.768;
$int_cast = (int)$x;
echo $int_cast;

echo "<br>";

// Cast string to int
$x = "23465.768";
$int_cast = (int)$x;
echo $int_cast;
?>