<?php
//Switch...Case
$favcolor = "red";

switch ($favcolor) {
  case "red":
  case "RED":
    echo "Your favorite color is red!";
    break;
  case "blue":
  case "BLUE":
    echo "Your favorite color is blue!";
    break;
  case "green":
  case "GREEN":
    echo "Your favorite color is green!";
    break;
  default:
    echo "Your favorite color is neither red, blue, nor green!";
}
?>