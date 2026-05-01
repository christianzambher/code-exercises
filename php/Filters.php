<?php
/**
 * Validación de datos = Determine si los datos están en forma adecuada.
 * Desinfectar datos = Eliminar cualquier carácter ilegal de los datos.
 */
/**
 * La extensión de filtro de PHP tiene muchas de las funciones necesarias para verificar la entrada del usuario y está diseñada para hacer que la validación de datos sea más fácil y rápida.
 * La función filter_list() se puede utilizar para enumerar lo que ofrece la extensión de filtro PHP
 */
?>
<table>
  <tr>
    <td>Filter Name</td>
    <td>Filter ID</td>
  </tr>
  <?php
  foreach (filter_list() as $id =>$filter) {
    echo '<tr><td>' . $filter . '</td><td>' . filter_id($filter) . '</td></tr>';
  }
  ?>
</table>
<?php
/**
 * La función filter_var() valida y desinfecta los datos.
 * La función filter_var() filtra una sola variable con un filtro específico. 
 * Se necesitan dos datos:
 * -> La variable que desea verificar
 * -> El tipo de cheque a utilizar
 */
?>
<h1>Desinfectar un String</h1>
<?php
$str = "<h1>Hello World!</h1>";
$newstr = filter_var($str, FILTER_SANITIZE_STRING);
echo $newstr;
?>
<h1>Validar un int</h1>
<?php
$int = 100;

if (!filter_var($int, FILTER_VALIDATE_INT) === false) {
  echo("Integer is valid");
} else {
  echo("Integer is not valid");
}
?>
<h2>Validar un int, si es cero</h2>
<?php
$int = 0;

if (filter_var($int, FILTER_VALIDATE_INT) === 0 || !filter_var($int, FILTER_VALIDATE_INT) === false) {
  echo("Integer is valid");
} else {
  echo("Integer is not valid");
}
?>
<h1>Validar un dirección IP</h1>
<?php
$ip = "127.0.0.1";

if (!filter_var($ip, FILTER_VALIDATE_IP) === false) {
  echo("$ip is a valid IP address");
} else {
  echo("$ip is not a valid IP address");
}
?>
<h1>Desinfectar y validar un dirección de correo</h1>
<?php
$email = "john.doe@example.com";

// Remove all illegal characters from email
$email = filter_var($email, FILTER_SANITIZE_EMAIL);

// Validate e-mail
if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
  echo("$email is a valid email address");
} else {
  echo("$email is not a valid email address");
}
?>
<h1>Desinfectar y validar una URL</h1>
<?php
$url = "https://www.w3schools.com";

// Remove all illegal characters from a url
$url = filter_var($url, FILTER_SANITIZE_URL);

// Validate url
if (!filter_var($url, FILTER_VALIDATE_URL) === false) {
  echo("$url is a valid URL");
} else {
  echo("$url is not a valid URL");
}
?>
<h1>Validar un Int entre rangos</h1>
<?php
$int = 122;
$min = 1;
$max = 200;

if (filter_var($int, FILTER_VALIDATE_INT, array("options" => array("min_range"=>$min, "max_range"=>$max))) === false) {
  echo("Variable value is not within the legal range");
} else {
  echo("Variable value is within the legal range");
}
?>
<h1>Validar direcciones IPv6</h1>
<?php
$ip = "2001:0db8:85a3:08d3:1319:8a2e:0370:7334";

if (!filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) === false) {
  echo("$ip is a valid IPv6 address");
} else {
  echo("$ip is not a valid IPv6 address");
}
?>
<h1>Validar URL con QueryString</h1>
<?php
$url = "https://www.w3schools.com";

if (!filter_var($url, FILTER_VALIDATE_URL, FILTER_FLAG_QUERY_REQUIRED) === false) {
  echo("$url is a valid URL with a query string");
} else {
  echo("$url is not a valid URL with a query string");
}
?>
<h1>Eliminar caracteres con valor ASCII > 127</h1>
<?php
$str = "<h1>Hello WorldÆØÅ!</h1>";

$newstr = filter_var($str, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
echo $newstr;
?>