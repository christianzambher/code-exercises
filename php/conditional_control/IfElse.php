<?php
//If
$t = date("H");

if ($t < "20") {
  echo "Have a good day!".PHP_EOL;
}
//If...Else
$t = date("H");

if ($t < "20") {
  echo "Have a good day!".PHP_EOL;
} else {
  echo "Have a good night!".PHP_EOL;
}
//If...Elseif...Else
$t = date("H");

if ($t < "10") {
  echo "Have a good morning!".PHP_EOL;
} elseif ($t < "20") {
  echo "Have a good day!".PHP_EOL;
} else {
  echo "Have a good night!".PHP_EOL;
}
?>