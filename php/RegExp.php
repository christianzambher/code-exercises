<?php
/**
 * Funciones de expresiones regulares
 * preg_match() Devuelve 1 si el patrón se encontró en la cadena y 0 si no
 * preg_match_all() Devuelve el número de veces que se encontró el patrón en la cadena, que también puede ser 0
 * preg_replace() Devuelve una nueva cadena donde los patrones coincidentes han sido reemplazados por otra cadena
 * https://www.w3schools.com/php/php_ref_regex.asp
 */

//preg_match
/**
 * Dirá si una cadena contiene coincidencias de un patrón.
 */
$str = "Visit W3Schools";
$pattern = "/w3schools/i";
echo preg_match($pattern, $str).PHP_EOL;
echo "---".PHP_EOL;

//preg_match_all
/**
 * Dirá cuántas coincidencias se encontraron para un patrón en una cadena.
 */
$str = "The rain in SPAIN falls mainly on the plains.";
$pattern = "/ain/i";
echo preg_match_all($pattern, $str).PHP_EOL;
echo "---".PHP_EOL;

//preg_replace
/**
 * Reemplazará todas las coincidencias del patrón en una cadena con otra cadena.
 */
$str = "Visit Microsoft!";
$pattern = "/microsoft/i";
echo preg_replace($pattern, "W3Schools", $str).PHP_EOL;
echo "---".PHP_EOL;

//Grouping
//Utilice la agrupación para buscar la palabra "banana" buscando ba seguida de dos instancias de na:
$str = "Apples and bananas.";
$pattern = "/ba(na){2}/i";
echo preg_match($pattern, $str).PHP_EOL;
?>