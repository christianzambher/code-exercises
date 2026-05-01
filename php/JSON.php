<h1>json_encode</h1>
<?php
//La funcion json_encode es usada para codificar un valor a formato JSON.
$age = array("Peter"=>35, "Ben"=>37, "Joe"=>43);

echo json_encode($age);
?>
<br>
<?php
$cars = array("Volvo", "BMW", "Toyota");

echo json_encode($cars);
?>
<h1>json_decode</h1>
<?php
//La funcion json_decode() retorna un objecto por default. La funcion json_decode tiene un segundo parametro, y cuando se establece en true, los objetos JSON son decodificados en arreglos asociativos.
$jsonobj = '{"Peter":35,"Ben":37,"Joe":43}';
var_dump(json_decode($jsonobj));
echo "<br>";
$jsonobj = '{"Peter":35,"Ben":37,"Joe":43}';
var_dump(json_decode($jsonobj, true));
?>
<h1>Accediendo a los valores decodificados</h1>
<?php
$jsonobj = '{"Peter":35,"Ben":37,"Joe":43}';

$obj = json_decode($jsonobj);

echo $obj->Peter."<br>";
echo $obj->Ben."<br>";
echo $obj->Joe."<br>";
?>
<h2>Accediendo en los arreglos asociativos</h2>
<?php
$jsonobj = '{"Peter":35,"Ben":37,"Joe":43}';

$arr = json_decode($jsonobj, true);

echo $arr["Peter"]."<br>";
echo $arr["Ben"]."<br>";
echo $arr["Joe"]."<br>";
?>
<h1>Recorriendo los valores</h1>
<?php
$jsonobj = '{"Peter":35,"Ben":37,"Joe":43}';

$obj = json_decode($jsonobj);

foreach($obj as $key => $value) {
  echo $key . " => " . $value . "<br>";
}
?>
<h2>Accediendo en los arreglos asociativos</h2>
<?php
$jsonobj = '{"Peter":35,"Ben":37,"Joe":43}';

$arr = json_decode($jsonobj, true);

foreach($arr as $key => $value) {
  echo $key . " => " . $value . "<br>";
}
?>