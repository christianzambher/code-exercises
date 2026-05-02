<?php
/**
 * La función session_start() debe de ir primero que cualquier cosa en el archivo. Antes de cualquier etiqueta HTML
 */
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<body>
<h1>Session Iniciada</h1>
<?php
// Set session variables
$_SESSION["favcolor"] = "green";
$_SESSION["favanimal"] = "cat";
echo "Session variables are set.";
?>

<h1>Valores de variables Session</h1>
<?php
// Echo session variables that were set on previous page
echo "Favorite color is " . $_SESSION["favcolor"] . ".<br>";
echo "Favorite animal is " . $_SESSION["favanimal"] . ".";
?>
<h1>Mostrar todas las variables de sesión</h1>
<?php
print_r($_SESSION);
?>
<h1>Modificar variable de Session</h1>
<?php
// to change a session variable, just overwrite it
$_SESSION["favcolor"] = "yellow";
print_r($_SESSION);
?>
<h1>Destruir variable de Session</h1>
<?php
// remove all session variables
session_unset();

// destroy the session
session_destroy();

print_r($_SESSION);
?>
</body>
</html>