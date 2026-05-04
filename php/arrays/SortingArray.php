<?php
//Funciones de ordenamiento
/**
 * sort() - Ordena el array de forma ascendente
 * rsort() - Ordena el array de forma descendiente
 * asort() - Ordena array asociativos de forma ascendente, de acuerdo al valor
 * ksort() - Ordena array asociativos de forma ascendente, de acuerdo al key
 * arsort() - Ordena array asociativos de forma descendente, de acuerdo al valor
 * krsort() - Ordena array asociativos de forma descendente, de acuerdo al key
 */
//Sort
$cars = array("Volvo", "BMW", "Toyota");
sort($cars);
print_r($cars);
$numbers = array(4, 6, 2, 22, 11);
sort($numbers);
print_r($numbers);

//RSort
$cars = array("Volvo", "BMW", "Toyota");
rsort($cars);
print_r($cars);
$numbers = array(4, 6, 2, 22, 11);
rsort($numbers);
print_r($numbers);

//Asort
$age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
asort($age);
print_r($age);

//Ksort
$age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
ksort($age);
print_r($age);

//Arsort
$age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
arsort($age);
print_r($age);

//Krsort
$age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
krsort($age);
print_r($age);

?>