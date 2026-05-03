<?php
//fopen()
/**
 * El primer parámetro de fopen()contiene el nombre del archivo que se abrirá y el segundo parámetro especifica en qué modo se debe abrir el archivo.
 */
/**
 * Modos de apertura de archivos
 * r Abra un archivo de solo lectura. El puntero de archivo comienza al principio del archivo
 * w Abra un archivo solo para escritura. Borra el contenido del archivo o crea un nuevo archivo si no existe. El puntero de archivo comienza al principio del archivo
 * a Abra un archivo solo para escritura. Se conservan los datos existentes en el archivo. El puntero de archivo comienza al final del archivo. Crea un nuevo archivo si el archivo no existe
 * x Crea un nuevo archivo solo para escritura. Devuelve FALSE y un error si el archivo ya existe
 * r+ Abre un archivo para lectura / escritura. El puntero de archivo comienza al principio del archivo
 * w+ Abre un archivo para lectura / escritura. Borra el contenido del archivo o crea un nuevo archivo si no existe. El puntero de archivo comienza al principio del archivo
 * a+ Abre un archivo para lectura / escritura. Se conservan los datos existentes en el archivo. El puntero de archivo comienza al final del archivo. Crea un nuevo archivo si el archivo no existe
 * x+ Crea un nuevo archivo para lectura / escritura. Devuelve FALSE y un error si el archivo ya existe
 */
$filename = "CorrerPHPsinWAMP.txt";
$myfile = fopen($filename, "r") or die("Unable to open file!");
//echo fread($myfile, filesize($filename));
fclose($myfile);

//fread()
/**
 * El primer parámetro de fread()contiene el nombre del archivo para leer y el segundo parámetro especifica el número máximo de bytes para leer.
 * fread($myfile,filesize("webdictionary.txt"));
 */

//fclose()
/**
 * El fclose()requiere el nombre del archivo (o una variable que contiene el nombre del archivo) que desea cerrar
 */
$myfile = fopen($filename, "r");
// some code to be executed....
fclose($myfile);

//fgets()
/**
 * La fgets()función se utiliza para leer una sola línea de un archivo.
 * Nota: Después de una llamada a la fgets()función, el puntero del archivo se ha movido a la siguiente línea.
 */
$myfile = fopen($filename, "r") or die("Unable to open file!");
echo fgets($myfile);
fclose($myfile);

//feof()
/**
 * Comprueba si se ha alcanzado el "fin de archivo" (EOF).
 * Util para recorrer datos de longitud desconocida.
 */
$myfile = fopen($filename, "r") or die("Unable to open file!");
// Output one line until end-of-file
while(!feof($myfile)) {
  echo fgets($myfile) . "<br>";
}
fclose($myfile);

//fgetc()
/**
 * Se utiliza para leer un solo carácter de un archivo.
 * El puntero del archivo se mueve al siguiente carácter
 */
$myfile = fopen($filename, "r") or die("Unable to open file!");
// Output one character until end-of-file
while(!feof($myfile)) {
  echo fgetc($myfile);
}
fclose($myfile);