<?php
/**
 * PHP $ _REQUEST es una variable súper global de PHP que se utiliza para recopilar datos después de enviar un formulario HTML.
 * Cuando un usuario envía los datos haciendo clic en "Enviar", los datos del formulario se envían al archivo especificado en el atributo de acción de la etiqueta <form>. En este ejemplo, apuntamos a este archivo para procesar los datos del formulario. Si desea utilizar otro archivo PHP para procesar los datos del formulario, reemplacemos con el nombre de archivo de su elección. Luego, podemos usar la variable súper global $ _REQUEST para recopilar el valor del campo de entrada
 */
?>
<html>
<body>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  Name: <input type="text" name="fname">
  <input type="submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // collect value of input field
  $name = $_REQUEST['fname'];
  if (empty($name)) {
    echo "Name is empty";
  } else {
    echo $name;
  }
}
?>

</body>
</html>
