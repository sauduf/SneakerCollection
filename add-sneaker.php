<?php
// Read values from the form
$brand = $_POST['Brand'];
$name = $_POST['SneakerName'];
$release_date = $_POST['ReleaseDate'];
$price = $_POST['Price'];
$shoecondition = $_POST['Condition'];
$color = $_POST['Color'];
$size = $_POST['Size'];

// Connect to database
include("db.php");

// Build SQL statement
$sql = "INSERT INTO sneakers (brand, name, release_date, price, shoecondition, color, size)
        VALUES ('{$brand}', '{$name}', '{$release_date}', '{$price}', '{$shoecondition}', '{$color}', '{$size}')";

// Run SQL statement and report errors
if (!$mysqli->query($sql)) {
    echo("<h4>SQL error description: " . $mysqli->error . "</h4>");
}

// Redirect to list
header("Location: list-sneakers.php");
?>