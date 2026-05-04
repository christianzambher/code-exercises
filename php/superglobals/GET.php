<?php
/**
 * PHP $ _GET es una variable súper global de PHP que se utiliza para recopilar datos de formularios después de enviar un formulario HTML con method = "get".
 * $ _GET también puede recopilar datos enviados en la URL.
 * Supongamos que tenemos una página HTML que contiene un hipervínculo con parámetros
 * Cuando un usuario hace clic en el enlace "Test $ GET", los parámetros "subject" y "web" se envían a "test_get.php", y luego puede acceder a sus valores en "test_get.php" con $ _GET.
 */
?>
<html>
<body>

<?php
echo "Study " . $_GET['subject'] . " at " . $_GET['web'];
?>

</body>
</html>