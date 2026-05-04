<!DOCTYPE html>
<html>

<body>
    <?php
    $txt = "Hello world!";
    $x = 5;
    $y = 10.5;
    //Output variables
    /*$txt = "W3Schools.com";
    echo "I love $txt!";

    $txt = "W3Schools.com";
    echo "I love " . $txt . "!";

    $x = 5;
    $y = 4;
    echo $x + $y;*/

    //Variable Global y Local
    function myTest()
    {
        $x = 5; // local scope
        echo "<p>Variable x inside function is: $x</p>";
    }
    myTest();

    // using x outside the function will generate an error
    echo "<p>Variable x outside function is: $x</p>";

    $x = 5;
    $y = 10;

    function myTest2()
    {
        global $x, $y;
        $y = $x + $y;
    }

    myTest2();
    echo $y; // outputs 15

    //Global Keyword
    $x = 5;
    $y = 10;

    function myTest3()
    {
        $GLOBALS['y'] = $GLOBALS['x'] + $GLOBALS['y'];
    }

    myTest3();
    echo $y; // outputs 15

    //Static Keyword
    function myTest4() {
        static $x = 0;
        echo $x;
        $x++;
      }
      
      myTest4();
      myTest4();
      myTest4();
    ?>
</body>

</html>