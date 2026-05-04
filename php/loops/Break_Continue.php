<?php
//Break
for ($x = 0; $x < 10; $x++) {
  if ($x == 4) {
    break;
  }
  echo "The number is: $x <br>".PHP_EOL;
}
echo "----".PHP_EOL;

//Continue
for ($x = 0; $x < 10; $x++) {
    if ($x == 4) {
      continue;
    }
    echo "The number is: $x <br>".PHP_EOL;
  }
  echo "----".PHP_EOL;

//Use in While Loop
//Break
$x = 0;

while($x < 10) {
  if ($x == 4) {
    break;
  }
  echo "The number is: $x <br>".PHP_EOL;
  $x++;
}
echo "----".PHP_EOL;

//Continue
$x = 0;

while($x < 10) {
  if ($x == 4) {
    $x++;
    continue;
  }
  echo "The number is: $x <br>".PHP_EOL;
  $x++;
}
?>