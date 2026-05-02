<?php
//Creación de archivo
/**
 * La función fopen() también se usa para crear un archivo. 
 * Quizás un poco confuso, pero en PHP, un archivo se crea usando la misma función que se usa para abrir archivos.
 * Si usa fopen() en un archivo que no existe, lo creará, dado que el archivo está abierto para escribir (w) o agregar (a).
 * $myfile = fopen("testfile.txt", "w")
 */
$fileName = "testfile.txt";
$myfile = fopen($fileName, "w");

//Escritura en el archivo
/**
 * La función fwrite() se usa para escribir en un archivo.
 * El primer parámetro de fwrite() contiene el nombre del archivo a escribir y el segundo parámetro es la cadena a escribir.
 */
$myfile = fopen($fileName, "w") or die("Unable to open file!");
$txt = "John Doe\n";
fwrite($myfile, $txt);
$txt = "Jane Doe\n";
fwrite($myfile, $txt);
fclose($myfile);

//Sobre escritura
$myfile = fopen($fileName, "a") or die("Unable to open file!");
$txt = "Mickey Mouse\n";
fwrite($myfile, $txt);
$txt = "Minnie Mouse\n";
fwrite($myfile, $txt);
fclose($myfile);