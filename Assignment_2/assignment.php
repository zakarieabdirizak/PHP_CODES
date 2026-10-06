<?php
echo"<h1>Question 1</h1>";
$numbers = [5, -7, 12, 10, -7, 11, -6, 12, 1, -7, 2, 9];

$total = 0;
$evenTotal = 0;
$oddTotal = 0;

echo "<h2>1: All elements of the array:</h2>";
foreach ($numbers as $number) {
    echo $number . " ";
}
echo "<br>";

foreach ($numbers as $number) {

    $total += $number;
  
    if ($number % 2 == 0) {
        $evenTotal += $number;
    }

    if ($number % 2 != 0) {
        $oddTotal += $number;
    }
}
echo" <h2>2: Total of all elements</h2>";
echo "Total of all elements: " . $total . "<br>";

 echo "<h2>3: Even elements</h2>";
echo "Total of even elements: " . $evenTotal . "<br>";

echo "<h2>4: Odd elements</h2>";
echo "Total of odd elements: " . $oddTotal . "<br>";

$minimum = $numbers[0];
$minindex = [];

foreach ($numbers as $index => $number) {

    if ($number < $minimum) {
        $minimum = $number;
        $minindex = [$index];
    } 
    elseif ($number == $minimum) {
        $minindex[] = $index;
    }
}

echo"<h2>5: minimum element</h2>";
echo "Minimum element: " . $minimum . "<br>";
echo"<h2> minimum index</h2>";
echo "Minimum index: ";

foreach ($minindex as $index) {
    echo $index . " ";
}



$maximum = $numbers[0];
$maxindex = [];

foreach ($numbers as $index => $number) {

    if ($number > $maximum) {
        $maximum = $number;
        $maxindex = [$index];
    } 
    elseif ($number == $maximum) {
        $maxindex[] = $index;
    }
}

echo"<h2>6: maximum element </h2>";
echo "Maximum element: " . $maximum . "<br>";
echo"<h2> maximum index </h2>";
echo "Maximum index: ";

foreach ($maxindex as $index) {
    echo $index . " ";
}
echo"<h1>Question 2</h1>";
$colors = [
    "Light" => [
        "Red" => "Light Red",
        "Green" => "Light Green",
        "Blue" => "Light Blue"
    ],

    "Normal" => [
        "Red" => "Normal Red",
        "Green" => "Normal Green",
        "Blue" => "Normal Blue"
    ],

    "Dark" => [
        "Red" => "Dark Red",
        "Green" => "Dark Green",
        "Blue" => "Dark Blue"
    ]
];

echo "<table border='1' cellpadding='10' cellspacing='0'>";

echo "<tr>";
echo "<th></th>";
echo "<th>Red</th>";
echo "<th>Green</th>";
echo "<th>Blue</th>";
echo "</tr>";

foreach ($colors as $rowName => $row) {

    echo "<tr>";

    echo "<th>" . $rowName . "</th>";

    foreach ($row as $value) {
        echo "<td>" . $value . "</td>";
    }

    echo "</tr>";
}

echo "</table>";
echo"<h1>Question 3</h1>";

$array = [
    [2, -6, 8],
    [-6, 1, 6],
    [7, 8, -6]
];

$oddTotal = 0;
$evenTotal = 0;
$allTotal = 0;

$min = $array[0][0];
$max = $array[0][0];

echo "<table border='1' cellpadding='10' cellspacing='0'>";

for ($i = 0; $i < 3; $i++) {

    echo "<tr>";

    for ($j = 0; $j < 3; $j++) {

        echo "<td>" . $array[$i][$j] . "</td>";

        if ($array[$i][$j] % 2 == 0) {
            $evenTotal += $array[$i][$j];
        } else {
            $oddTotal += $array[$i][$j];
        }

        $allTotal += $array[$i][$j];

        if ($array[$i][$j] < $min) {
            $min = $array[$i][$j];
        }

        if ($array[$i][$j] > $max) {
            $max = $array[$i][$j];
        }
    }

    echo "</tr>";
}

echo "</table>";


// Row totals
echo "<h3>Row Totals</h3>";

echo "<table border='1' cellpadding='10' cellspacing='0'>";

for ($i = 0; $i < 3; $i++) {

    $total = 0;

    for ($j = 0; $j < 3; $j++) {
        $total += $array[$i][$j];
    }

    echo "<tr>";
    echo "<td>Row " . ($i + 1) . "</td>";
    echo "<td>" . $total . "</td>";
    echo "</tr>";
}

echo "</table>";


// Column totals
echo "<h3>Column Totals</h3>";

echo "<table border='1' cellpadding='10' cellspacing='0'>";

for ($j = 0; $j < 3; $j++) {

    $total = 0;

    for ($i = 0; $i < 3; $i++) {
        $total += $array[$i][$j];
    }

    echo "<tr>";
    echo "<td>Column " . ($j + 1) . "</td>";
    echo "<td>" . $total . "</td>";
    echo "</tr>";
}

echo "</table>";


// Diagonal totals

$diagonal1 = 0;
$diagonal2 = 0;

for ($i = 0; $i < 3; $i++) {
    $diagonal1 += $array[$i][$i];
    $diagonal2 += $array[$i][2 - $i];
}

echo "<h3>Diagonal Totals</h3>";

echo "<table border='1' cellpadding='10' cellspacing='0'>";

echo "<tr>";
echo "<td>Main Diagonal</td>";
echo "<td>" . $diagonal1 . "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Second Diagonal</td>";
echo "<td>" . $diagonal2 . "</td>";
echo "</tr>";

echo "</table>";


// Other results

echo "<h3>Other Results</h3>";

echo "<table border='1' cellpadding='10' cellspacing='0'>";

echo "<tr>";
echo "<th>Item</th>";
echo "<th>Total / Value</th>";
echo "</tr>";

echo "<tr>";
echo "<td>Odd Elements</td>";
echo "<td>" . $oddTotal . "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Even Elements</td>";
echo "<td>" . $evenTotal . "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>All Elements</td>";
echo "<td>" . $allTotal . "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Minimum</td>";
echo "<td>" . $min . "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Maximum</td>";
echo "<td>" . $max . "</td>";
echo "</tr>";

echo "</table>";

echo"<h1>Question 4</h1>";

$students = [

    "CA221" => [
        "Name" => "Mohamed Ahmed Ali",
        "Phone" => "0648440403",
        "Address" => "Laba Dhagax, Wardhiigley"
    ],

    "CA223" => [
        "Name" => "Ahmed Abdi Jama",
        "Phone" => "0647223201",
        "Address" => "Taleex, Hodan"
    ],

    "CA221-2" => [
        "Name" => "Amina Nur Adan",
        "Phone" => "0646990276",
        "Address" => "Macmacaanka, Dharkeynley"
    ]

];

echo "<table border='1' cellpadding='10' cellspacing='0'>";

echo "<tr>";
echo "<th>Student ID</th>";
echo "<th>Name</th>";
echo "<th>Phone</th>";
echo "<th>Address</th>";
echo "</tr>";


foreach ($students as $id => $student) {

    echo "<tr>";

    echo "<td>" . $id . "</td>";
    echo "<td>" . $student["Name"] . "</td>";
    echo "<td>" . $student["Phone"] . "</td>";
    echo "<td>" . $student["Address"] . "</td>";

    echo "</tr>";
}

echo "</table>";

echo"<h1>Question 5</h1>";


$student = array(

    array("Semester 1", "subject1", 9, 26, 10, 40, 85, "Pass"),
    array("Semester 1", "subject2", 9, 26, 10, 40, 85, "Pass"),
    array("Semester 1", "subject3", 9, 26, 10, 40, 85, "Pass"),

    array("Semester 2", "subject1", 9, 26, 10, 40, 85, "Pass"),
    array("Semester 2", "subject2", 9, 26, 10, 0, 45, "Fail"),
    array("Semester 2", "subject3", 9, 26, 10, 40, 85, "Pass")

);

echo "<table border='1'>";

echo "<tr>";
echo "<th>Semester</th>";
echo "<th>Course</th>";
echo "<th>CW1</th>";
echo "<th>MidTerm</th>";
echo "<th>CW2</th>";
echo "<th>Final</th>";
echo "<th>Total</th>";
echo "<th>Status</th>";
echo "</tr>";

for ($i = 0; $i < count($student); $i++) {

    echo "<tr>";

    echo "<td>" . $student[$i][0] . "</td>";
    echo "<td>" . $student[$i][1] . "</td>";
    echo "<td>" . $student[$i][2] . "</td>";
    echo "<td>" . $student[$i][3] . "</td>";
    echo "<td>" . $student[$i][4] . "</td>";
    echo "<td>" . $student[$i][5] . "</td>";
    echo "<td>" . $student[$i][6] . "</td>";
    echo "<td>" . $student[$i][7] . "</td>";

    echo "</tr>";
}

echo "</table>";


?>