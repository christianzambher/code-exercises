<?php
/**
 * $_SERVER es una variable súper global de PHP que contiene información sobre encabezados, rutas y ubicaciones de scripts.
 * https://www.w3schools.com/php/php_superglobals_server.asp
 */
echo $_SERVER['PHP_SELF'];
echo "<br>";
echo $_SERVER['SERVER_NAME'];
echo "<br>";
echo $_SERVER['HTTP_HOST'];
echo "<br>";
echo $_SERVER['HTTP_REFERER'];
echo "<br>";
echo $_SERVER['HTTP_USER_AGENT'];
echo "<br>";
echo $_SERVER['SCRIPT_NAME'];
?>