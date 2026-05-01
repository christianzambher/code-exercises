<?php
function divide($dividend, $divisor) {
  if($divisor == 0) {
    throw new Exception("Division by zero");
  }
  return $dividend / $divisor;
}

try {
  echo divide(5, 0);
} catch(Exception $e) {
  echo "Unable to divide. "."<br>";
} finally {
  echo "Process complete."."<br>";
}
?>
<?php 
/**
 * new Exception(message, code, previous)
 * message => Opcional. Una cadena que describe por qué se lanzó la excepción.
 * code => Opcional. Un número entero que se puede usar para distinguir fácilmente esta excepción de otras del mismo tipo
 * previous => Opcional. Si esta excepción se lanzó en un bloque de captura de otra excepción, se recomienda pasar esa excepción a este parámetro
 */
//Métodos
/**
 * getMessage() Devuelve una cadena que describe por qué se lanzó la excepción
 * getPrevious() Si esta excepción fue activada por otra, este método devuelve la excepción anterior. Si no, devuelve nulo
 * getCode() Devuelve el código de excepción
 * getFile() Devuelve la ruta completa del archivo en el que se lanzó la excepción
 * getLine() Devuelve el número de línea de la línea de código que arrojó la excepción
 */
function divide_vc($dividend, $divisor) {
    if($divisor == 0) {
      throw new Exception("Division by zero", 1);
    }
    return $dividend / $divisor;
  }
  
  try {
    echo divide_vc(5, 0);
  } catch(Exception $ex) {
    $code = $ex->getCode();
    $message = $ex->getMessage();
    $file = $ex->getFile();
    $line = $ex->getLine();
    echo "Exception thrown in $file on line $line: [Code $code]
    $message";
  }
?>