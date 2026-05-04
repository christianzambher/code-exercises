<?php
/**
 * date(format,timestamp)
 * format = Requerido. Especifica el formato de la marca de tiempo.
 * timestamp = Opcional. Especifica una marca de tiempo. El valor predeterminado es la fecha y hora actuales
 */
//GetDate
/**
 * d - Representa el dia del mes (01 a 31)
 * m - Representa el mes (01 a 12)
 * Y - Representa el año (en cuatro dígitos)
 * l (minúscula de 'L') - Representa el dia de la semana
 * También se pueden insertar otros caracteres, como "/", "." O "-" entre los caracteres para agregar formato adicional.
 */
echo "<h1>GetDate</h1>"."<br>";
echo "Hoy es " . date("Y/m/d") . "<br>";
echo "Hoy es " . date("Y.m.d") . "<br>";
echo "Hoy es " . date("Y-m-d") . "<br>";
echo "Hoy es " . date("l") . "<br>";

//GetTime
/**
 * H - Formato de 24 horas de una hora (00 a 23)
 * h - Formato de 12 horas de una hora con ceros a la izquierda (01 a 12)
 * i - Minutos con ceros a la izquierda (00 a 59)
 * s - Segundos con ceros a la izquierda (00 a 59)
 * a - Lowercase Ante meridiano y Post meridiano (am or pm)
 */
echo "<h1>GetTime</h1>"."<br>";
echo "The time is " . date("h:i:sa") . "<br>";

//Get Your Time Zone
echo "<h1>Get your TimeZone</h1>"."<br>";
date_default_timezone_set("America/New_York");
date_default_timezone_set("America/Mexico_City");
echo "The time is " . date("h:i:sa");

//Date With mktime
/**
 * mktime(hour, minute, second, month, day, year)
 */
echo "<h1>Create Date mktime</h1>"."<br>";
$d=mktime(11, 14, 54, 8, 12, 2014);
echo "Created date is " . date("Y-m-d h:i:sa", $d) . "<br>";

//Create a Date From a String With strtotime()
/**
 * strtotime(time, now)
 */
echo "<h1>Create Date from String</h1>"."<br>";
$d=strtotime("10:30pm April 15 2014");
echo "Created date is " . date("Y-m-d h:i:sa", $d) . "<br>";
$d=strtotime("tomorrow");
echo date("Y-m-d h:i:sa", $d) . "<br>";

$d=strtotime("next Saturday");
echo date("Y-m-d h:i:sa", $d) . "<br>";

$d=strtotime("+3 Months");
echo date("Y-m-d h:i:sa", $d) . "<br>";

$startdate = strtotime("Saturday");
$enddate = strtotime("+6 weeks", $startdate);

while ($startdate < $enddate) {
  echo date("M d", $startdate) . "<br>";
  $startdate = strtotime("+1 week", $startdate);
}

$d1=strtotime("July 04");
$d2=ceil(($d1-time())/60/60/24);
echo "There are " . $d2 ." days until 4th of July.";
?>