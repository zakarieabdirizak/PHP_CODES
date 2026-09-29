<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PHP Assignment 1</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        h2 { color: #1a4d8f; padding-bottom: 4px; }
        table { border-collapse: collapse; }
        td { border: 1px solid #555; padding: 3px 6px; text-align: center; }
    </style>
</head>
<body>
<h1>PHP &amp; MySQL - Assignment 1</h1>

<?php

echo "<h2>Q1. Greatest and Smallest of three numbers</h2>";

$a = 25;
$b = 8;
$c = 61;

$greatest = $a;
if ($b > $greatest) { $greatest = $b; }
if ($c > $greatest) { $greatest = $c; }

$smallest = $a;
if ($b < $smallest) { $smallest = $b; }
if ($c < $smallest) { $smallest = $c; }

echo "Numbers: $a, $b, $c<br>";
echo "Greatest = $greatest<br>";
echo "Smallest = $smallest<br>";



echo "<h2>Q2. Divisible by 3, 5, both or none</h2>";

$num = 30;

if ($num % 3 == 0 && $num % 5 == 0) {
    echo "$num is divisible by both 3 and 5";
} elseif ($num % 3 == 0) {
    echo "$num is divisible by 3 only";
} elseif ($num % 5 == 0) {
    echo "$num is divisible by 5 only";
} else {
    echo "$num is not divisible by 3 or 5 (none)";
}



echo "<h2>Q3. Odd numbers from 2 to 20 / Even numbers from 35 to 7</h2>";

echo "Odd numbers from 2 to 20: ";
for ($i = 2; $i <= 20; $i++) {
    if ($i % 2 != 0) {
        echo $i . " ";
    }
}

echo "<br>Even numbers from 35 to 7: ";
for ($i = 35; $i >= 7; $i--) {
    if ($i % 2 == 0) {
        echo $i . " ";
    }
}



echo "<h2>Q4. Divisible by 2 and 5 (from 50 to 2)</h2>";

for ($i = 50; $i >= 2; $i--) {
    if ($i % 2 == 0 && $i % 5 == 0) {
        echo $i . " ";
    }
}



echo "<h2>Q5. Reverse of a number</h2>";

$original = 12345;   // change this value to test
$n = $original;
$reverse = 0;

while ($n > 0) {
    $digit = $n % 10;               // take the last digit
    $reverse = $reverse * 10 + $digit;  // add it to the reversed number
    $n = (int)($n / 10);            // remove the last digit
}

echo "The reverse of $original = $reverse";



echo "<h2>Q6. LCM (Lowest Common Multiple)</h2>";

$x = 8; $y = 12;   // change these values to test

// start from the larger number and keep adding until both divide it
$lcm = ($x > $y) ? $x : $y;
while (!($lcm % $x == 0 && $lcm % $y == 0)) {
    $lcm++;
}

echo "LCM of $x and $y = $lcm";



echo "<h2>Q7. HCF (Highest Common Factor)</h2>";

$p = 18; $q = 24;   // change these values to test

if ($p == 0 && $q == 0) {
    echo "HCF does not exist when both numbers are 0";
} else {
    // Euclid's algorithm
    $m = ($p < 0) ? -$p : $p;
    $k = ($q < 0) ? -$q : $q;
    while ($k != 0) {
        $temp = $k;
        $k = $m % $k;
        $m = $temp;
    }
    echo "HCF of $p and $q = $m";
}



echo "<h2>Q8. Multiplication Table</h2>";

echo "<table>";
echo "<caption>Multiplication Table</caption>";
for ($row = 1; $row <= 12; $row++) {
    echo "<tr>";
    for ($col = 1; $col <= 12; $col++) {
        echo "<td>" . ($row * $col) . "</td>";
    }
    echo "</tr>";
}
echo "</table>";



echo "<h2>Q9. Prime or Non-prime</h2>";

$number = 29;   // change this value to test

$isPrime = true;
if ($number < 2) {
    $isPrime = false;
} else {
    for ($i = 2; $i * $i <= $number; $i++) {
        if ($number % $i == 0) {
            $isPrime = false;
            break;
        }
    }
}

echo $number . ($isPrime ? " is a prime number" : " is a non-prime number");



echo "<h2>Q10. Prime numbers from 10 to 50</h2>";

for ($n = 10; $n <= 50; $n++) {
    $prime = true;
    for ($i = 2; $i * $i <= $n; $i++) {
        if ($n % $i == 0) {
            $prime = false;
            break;
        }
    }
    if ($prime) {
        echo $n . " ";
    }
}
?>

</body>
</html>