<?php
/**
 * Las declaraciones include y require son idénticas, excepto en caso de falla:
 * require: producirá un error fatal (E_COMPILE_ERROR) y detendrá el script
 * include: solo producirá una advertencia (E_WARNING) y el script continuará
 * 
 * include 'filename';
 * require 'filename';
 */
?>
<html>
<body>
<!-- INCLUDE -->
<h1>Welcome to my home page!</h1>
<p>Some text.</p>
<p>Some more text.</p>
<br>
<br>
<!-- CSS php -->
<div class="menu">
<?php include 'menu.php';?>
</div>

<!-- Vars -->
<h1>Welcome Variables!</h1>
<?php include 'vars.php';
echo "I have a $color $car.";
?>
<br>
<br>

<!-- INCLUDE - File no exist -->
<h1>INCLUDE - File no exist!</h1>
<?php include 'noFileExists.php';
echo "I have a $color $car.";
?>
<br>
<br>

<!-- EXCLUDE - File no exist -->
<h1>EXCLUDE - File no exist!</h1>
<?php require 'noFileExists.php';
echo "I have a $color $car.";
?>
<br>
<br>

<?php include 'footer.php';?>

</body>
</html>
