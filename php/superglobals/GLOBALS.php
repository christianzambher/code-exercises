<?php
/**
 * $GLOBALS es una variable súper global de PHP que se utiliza para acceder a variables globales desde cualquier lugar del script PHP (también desde dentro de funciones o métodos).
 * PHP almacena todas las variables globales en una matriz llamada $GLOBALS [ índice ]. El índice contiene el nombre de la variable.
 */
$x = 75;
$y = 25;
 
function addition() {
  $GLOBALS['z'] = $GLOBALS['x'] + $GLOBALS['y'];
}
 
addition();
echo $z;
?>