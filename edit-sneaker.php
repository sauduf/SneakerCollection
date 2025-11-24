<?php
session_start();

// Honeypot spam protection
if (!empty($_POST['website'])) {
    die("Spam detected.");
}

// Read values from the form
$sneaker_id = $_POST['sneaker_id'];
$brand = $_POST['brand'];
$name = $_POST['name'];
$release_date = $_POST['release_date'];
$price = $_POST['price'];
$condition = $_POST['shoecondition'];
$color = $_POST['color'];
$size = $_POST['size'];

if (!$sneaker_id) {
    die("Invalid sneaker ID.");
}

// Connect to database
include("db.php");

// Build SQL statement
$sql = "UPDATE sneakers 
        SET brand = '{$brand}', 
            name = '{$name}', 
            release_date = '{$release_date}', 
            price = '{$price}', 
            shoecondition = '{$condition}', 
            color = '{$color}', 
            size = '{$size}'
        WHERE sneaker_id = {$sneaker_id}";

// Run SQL statement and report errors
if (!$mysqli->query($sql)) {
    echo("<h4>SQL error description: " . $mysqli->error . "</h4>");
}


// Redirect back to list
header("Location: list-sneakers.php");
?>
