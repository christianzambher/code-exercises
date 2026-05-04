
<?php
//Con el símbolo de \n y queda de este modo
$data = ["elemento1", "elemento2", "elemento3"];
foreach ($data as $d) {
    echo  $d . "\n";
}
?>

<?php
//IMPRIMIENDO RESULTADOS DESDE EL NAVEGADOR Si vas a imprimir los resultados desde el navegador, puedes auxiliarte de la etiqueta <br /> quedando de este modo
$data = ["elemento1", "elemento2", "elemento3"];

foreach ($data as $d) {
    echo $d . "<br />";
}
?>

<?php
//USANDO LA CONSTANTE PREDEFINIDA PHP_EOL
$data = ["elemento1", "elemento2", "elemento3"];

foreach ($data as $d) {
    echo  $d . PHP_EOL;
}
?>