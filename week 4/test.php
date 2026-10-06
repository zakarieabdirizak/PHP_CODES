<?php
$x = 5; // global scope
function myTest() {
    global $x; // access the global variable x
    // using x inside this function will not work
    echo "Variable x inside function is: $x";
}
myTest();
echo "<br>";
echo "Variable x outside function is: $x";

echo "<br><br>";


function LocalGlobal() {
    $y = 10; // local scope
    echo "Variable y inside function is: $y";
}
LocalGlobal();

echo "<br>";
echo "Variable y outside function is: $y";

echo "<br><br><br>";


function myTest2() {
    static $x = 0; // static variable
    echo "x is: $x <br>";
    $x++;
}
myTest2();
myTest2();
myTest2();

$t = 5;
$w = 10;

function myTest3() {
    global $t, $w;
    $z = $t + $w;
    return $z;
}
echo myTest3();
echo "<br>" . myTest3();

// $GLOBALS[index]

$c = 15;
$d = 20;
function myTest4() {
    $GLOBALS['d'] = $GLOBALS['c'] + $GLOBALS['d'];
}

myTest4();
echo "<br>";
echo $d; // outputs 35

?>