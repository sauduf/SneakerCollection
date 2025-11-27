<?php
session_start();
$_SESSION['loggedin'] = true; 

// Read values from the form
// Filter inputs
$brand = filter_input(INPUT_POST, "Brand", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$name = filter_input(INPUT_POST, "SneakerName", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$release_date = filter_input(INPUT_POST, "ReleaseDate", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$price = filter_input(INPUT_POST, "Price", FILTER_VALIDATE_FLOAT);
$condition = filter_input(INPUT_POST, "Condition", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$color = filter_input(INPUT_POST, "Color", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$size = filter_input(INPUT_POST, "Size", FILTER_VALIDATE_FLOAT);

// Connect to database
include("db.php");

// Build SQL statement
$sql = "INSERT INTO sneakers (brand, name, release_date, price, shoecondition, color, size)
        VALUES ('{$brand}', '{$name}', '{$release_date}', '{$price}', '{$shoecondition}', '{$color}', '{$size}')";

// Run SQL statement and report errors
if (!$mysqli->query($sql)) {
    echo("<h4>SQL error: " . htmlspecialchars($mysqli->error) . "</h4>");
    exit;
}

// Redirect to list
header("Location: list-sneakers.php");
?>