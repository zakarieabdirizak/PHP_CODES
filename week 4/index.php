<?php
function convertToString($value) {
    return (string) $value;
}

function add($a, $b) {
    return $a + $b;
}

$sum = add(5, 10);
echo $sum . "<br>";

function factorial($n) {
    if ($n <= 1) {
        return 1;
    } else {
        return $n * factorial($n - 1);
    }
}

$factorial = factorial(5);
echo "Factorial of 5 is: $factorial<br>";
echo "<br>";

function factorials($a){
    $result = 1;
    for ($i = 1; $i <= $a; $i++) {
        $result *= $i;
    }
    echo "<br> Factorial of $a is: $result<br>";
}

factorials(5);

echo "<br>";

$array1 = array(9,3,4,7,8,5);

function PassArray($arr) {
    echo "The Passed Array: ";

    for ($i = 0; $i < count($arr); $i++) {
        echo "$arr[$i], ";
        $arr[$i]++;
    }

    return $arr;
}

echo "<br>";

$a = PassArray($array1);

echo "<br>";
echo "The Returned Array: ";
foreach($a as $v)
    echo "$v, ";

// By Value and By Reference

echo "<br>";
$n = 5;

function byvalue($a) {
    echo "The Passed Value: " . $a . "<br>";
    $a++;
    echo "The Current Value: " . $a . "<br>";
}

byvalue($n);
echo "The Value of N: " . $n . "<br>";

function byreference(&$a) {
    echo "The Passed Value: " . $a . "<br>";
    $a++;
    echo "The Current Value: " . $a . "<br>";
}

byreference($n);
echo "The Value of N: " . $n . "<br>";

function sum($x = 3, $y = 5) {
    $total = $x + $y;
    echo "The Total Value of two numbers: " . $total . "<br>";
}

sum(4, 6);
sum(7);
sum();

echo "<br>";
echo "<br>";
$name = "Abdi";
$age = 20;

function test() {

    $address = "Hodan";
    global $name;

    echo "The Value of Local Variable(address) = " . $address . "<br>";
    echo "The Value of Global Variable(name) = " . $name . "<br>";
    echo "The Value of Global Variable(age) = " . $GLOBALS["age"] . "<br>";

}

test();

// echo "The Value of Local Variable(address) = " . $address . "<br>";

echo "The Value of Global Variable(name) = " . $name . "<br>";
echo "The Value of Global Variable(name) = " . $GLOBALS["name"] . "<br>";


function counter() {
    static $counter = 1;
    echo "The Current Value of Counter: " . $counter . "<br>";
    $counter++;
}

echo "<br>";
counter();
counter();
counter();
counter();



?>