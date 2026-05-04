<?php
//String
$a = "Hello";
$b = 'Hi';
echo $a;
echo "<br>";
echo $b;
var_dump($a, $b);
?>
<?php
//Integer
$n = 5985;
//The PHP var_dump() function returns the data type and value
var_dump($n);
?>
<?php
//Float
$nf = 10.365;
var_dump($nf);
?>
<?php
//Boolean
$t = true;
$f = false;
var_dump($t, $f);
?>
<?php
//Array
$autos = array("Volvo", "BMW", "Toyota");
var_dump($autos);
?>
<?php
//Object
class Car
{
    public $color;
    public $model;
    public function __construct($color, $model)
    {
        $this->color = $color;
        $this->model = $model;
    }
    public function message()
    {
        return "Mi auto es un " . $this->color . "  " . $this->model . "!";
    }
}
$mycar = new Car("Black", "Volvo");
echo $mycar->message();
echo "<br>";
$mycar = new Car("Red", "Toyota");
echo $mycar->message();
?>
<?php
//Null
$ab = "Hello";
$ab = null;
var_dump($ab);
?>