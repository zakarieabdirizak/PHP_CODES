<?php


echo "<pre style='font-family:monospace;font-size:15px'>";

/* ---------------------------------------------------------
 * Q1. Quadratic equation solver
 * --------------------------------------------------------- */
echo "<b>Q1. Quadratic Equation</b>\n";
$a = 1; $b = -3; $c = 2;            // change these values to test
echo "Equation: {$a}x^2 + ({$b})x + ({$c}) = 0\n";

if ($a == 0) {
    echo "Not a quadratic equation (a cannot be 0).\n";
} else {
    $d = ($b * $b) - (4 * $a * $c);   // discriminant
    if ($d > 0) {
        $x1 = (-$b + sqrt($d)) / (2 * $a);
        $x2 = (-$b - sqrt($d)) / (2 * $a);
        echo "Two real solutions: X1 = $x1 , X2 = $x2\n";
    } elseif ($d == 0) {
        $x = -$b / (2 * $a);
        echo "One real solution: X = $x\n";
    } else {
        echo "The equation has imaginary solutions.\n";
    }
}

/* ---------------------------------------------------------
 * Q2. Reverse a number using do...while
 * --------------------------------------------------------- */
echo "\n<b>Q2. Reverse of a Number (do...while)</b>\n";
$num = 12345;
$temp = $num;
$reverse = 0;
do {
    $digit = $temp % 10;              // last digit
    $reverse = ($reverse * 10) + $digit;
    $temp = intdiv($temp, 10);        // remove last digit
} while ($temp > 0);
echo "Reverse of $num = $reverse\n";

/* ---------------------------------------------------------
 * Q3. Odd numbers from 6 to 30 using for loop
 * --------------------------------------------------------- */
echo "\n<b>Q3. Odd numbers from 6 to 30 (for)</b>\n";
for ($i = 6; $i <= 30; $i++) {
    if ($i % 2 != 0) {
        echo $i . " ";
    }
}
echo "\n";

/* ---------------------------------------------------------
 * Q4. Common factors of two numbers using while loop
 * --------------------------------------------------------- */
echo "\n<b>Q4. Common Factors (while)</b>\n";
$n1 = 42; $n2 = 70;
$smaller = min($n1, $n2);
$i = 2;                               // starts at 2 (as in the example: 2, 7, 14)
echo "Common factors of $n1 and $n2: ";
while ($i <= $smaller) {
    if ($n1 % $i == 0 && $n2 % $i == 0) {
        echo $i . " ";
    }
    $i++;
}
echo "\n";

/* ---------------------------------------------------------
 * Q5. Prime factors using for loop
 * --------------------------------------------------------- */
echo "\n<b>Q5. Prime Factors (for)</b>\n";
$n = 42;
echo "Prime factors of $n: ";
for ($i = 2; $i <= $n; $i++) {
    if ($n % $i == 0) {                       // $i is a factor
        $isPrime = true;
        for ($j = 2; $j <= $i / 2; $j++) {    // check if factor is prime
            if ($i % $j == 0) {
                $isPrime = false;
                break;
            }
        }
        if ($isPrime) {
            echo $i . " ";
        }
    }
}
echo "\n";

/* ---------------------------------------------------------
 * Q6. Fibonacci series using do...while
 * --------------------------------------------------------- */
echo "\n<b>Q6. Fibonacci Series (do...while)</b>\n";
$terms = 10;
$first = 0; $second = 1;
$count = 0;
do {
    echo $first . ($count < $terms - 1 ? ", " : "");
    $next = $first + $second;
    $first = $second;
    $second = $next;
    $count++;
} while ($count < $terms);
echo "\n";

/* ---------------------------------------------------------
 * Q7. Prime or non-prime using while loop
 * --------------------------------------------------------- */
echo "\n<b>Q7. Prime or Non-Prime (while)</b>\n";
$number = 29;
if ($number <= 1) {
    echo "$number is non-prime (must be greater than 1).\n";
} else {
    $isPrime = true;
    $i = 2;
    while ($i <= $number / 2) {
        if ($number % $i == 0) {
            $isPrime = false;
            break;
        }
        $i++;
    }
    echo $number . ($isPrime ? " is a prime number." : " is a non-prime number.") . "\n";
}

/* ---------------------------------------------------------
 * Q8. LCM of two numbers using do...while
 * --------------------------------------------------------- */
echo "\n<b>Q8. LCM (do...while)</b>\n";
$x = 8; $y = 12;
$lcm = max($x, $y);
do {
    if ($lcm % $x == 0 && $lcm % $y == 0) {
        break;                         // found the LCM
    }
    $lcm++;
} while (true);
echo "LCM of $x and $y = $lcm\n";

/* ---------------------------------------------------------
 * Q9. Non-prime numbers from 3 to 60 using while and for
 * --------------------------------------------------------- */
echo "\n<b>Q9. Non-prime numbers from 3 to 60 (while + for)</b>\n";
$i = 3;
while ($i <= 60) {
    $isPrime = true;
    for ($j = 2; $j <= sqrt($i); $j++) {
        if ($i % $j == 0) {
            $isPrime = false;
            break;
        }
    }
    if (!$isPrime) {
        echo $i . " ";
    }
    $i++;
}
echo "\n";

/* ---------------------------------------------------------
 * Q10. Multiplication table up to 12*12 (nested for + do...while)
 * --------------------------------------------------------- */
echo "\n<b>Q10. Multiplication Table 12 x 12 (for + do...while)</b>\n";

// Header row (for loop)
echo "     |";
for ($h = 1; $h <= 12; $h++) {
    printf("%5d", $h);
}
echo "\n" . str_repeat("-", 6 + 12 * 5) . "\n";

// Rows: outer = for loop, inner = do...while loop
for ($row = 1; $row <= 12; $row++) {
    printf("%4d |", $row);
    $col = 1;
    do {
        printf("%5d", $row * $col);
        $col++;
    } while ($col <= 12);
    echo "\n";
}

echo "</pre>";
?>