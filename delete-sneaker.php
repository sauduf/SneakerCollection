<?php
// Connect to database
include("db.php");

// Get sneaker ID from URL
$id = $_GET['id'];

// Build SQL delete statement
$sql = "DELETE FROM sneakers WHERE sneaker_id = {$id}";

// Run delete and report errors
if (!$mysqli->query($sql)) {
    echo("<h4>SQL error: " . $mysqli->error . "</h4>");
}

// Redirect back to list
header("Location: list-sneakers.php");
?>
