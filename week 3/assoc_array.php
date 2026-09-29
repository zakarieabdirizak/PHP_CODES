<?php 

// Creating Associative Array using array() function

$student_info = array (
    "id" => 1,
    "name" => "zakarie Abdirizak hassan",
    "age" => 20,
    "address" => "kaxda",
    "status" => "single",
    "weight" => 70.0
);

print_r ($student_info);

echo "<br>";

echo $student_info['address'];

echo "<br>";

// Creating Associative Array using manual indexing
$student_info["id"] = 1;
$student_info["name"] = "zakarie Abdirizak hassan";
$student_info["age"] = 20;
$student_info["address"] = "kaxda";
$student_info["status"] = "single";
$student_info["weight"] = 70.0;

print_r ($student_info);

echo "<br>";

foreach($student_info as $value) {
    echo "$value, ";
}

echo "<br>";

foreach($student_info as $key => $value) {
    echo "$key: $value <br>";
}

// Two Dimensional Array

$students = array (
    array (101, "ali", 20, "single"),
    array (102, "Abdi", 30, "single"),
    array (103, "muuse", 33, "single"),
    array (104, "farax", 40, "single"),
    array (105, "qasim", 50, "single")
);

print_r($students);

echo "<br>";

echo $students[2][1];

echo "<br>";

echo $students[3][4]; // Display 40

echo "<br>";

foreach ($students as $info) {
    foreach ($info as $value) {
        echo "$value, ";
    }
    echo "<br>";
}

$students = array (
    array ("id"=>101, "name"=>"Mohamed", "age"=>20, "status"=>"single"),
    array ("id"=>102, "name"=>"Abdi", "age"=>30, "status"=>"single"),
    array ("id"=>103, "name"=>"Jamac", "age"=>33, "status"=>"married"),
    array ("id"=>104, "name"=>"Amina", "age"=>40, "status"=>"single"),
    array ("id"=>105, "name"=>"Farah", "age"=>50, "status"=>"married")
);

echo "<br>";

echo $students[2]["name"]; // Display Jaamac

echo "<br>";

echo $students[3]["age"]; // Display 40

echo "<br>";

foreach ($students as $info) {
    foreach ($info as $key => $value) {
        echo "$key : $value ";
    }
    echo "<br>";
}



?>