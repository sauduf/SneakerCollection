<?php
session_start();
$_SESSION['loggedin'] = true; 

// Read values from the form
$sneaker_id   = filter_input(INPUT_POST, 'sneaker_id', FILTER_VALIDATE_INT);
$brand = htmlspecialchars($_POST['brand']);
$name = htmlspecialchars($_POST['name']);
$release_date = htmlspecialchars($_POST['release_date']);
$price = htmlspecialchars($_POST['price']);
$condition = htmlspecialchars($_POST['shoecondition']);
$color = htmlspecialchars($_POST['color']);
$size = htmlspecialchars($_POST['size']);

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
