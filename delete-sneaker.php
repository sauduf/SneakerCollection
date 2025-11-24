<?php
session_start();

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id) {
    die("Invalid sneaker ID.");
}

// Connect to database
include("db.php");

// Build SQL delete statement
$sql = "DELETE FROM sneakers WHERE sneaker_id = {$id}";

// Run delete and report errors
if (!$mysqli->query($sql)) {
    echo "<h4>SQL error: " . htmlspecialchars($mysqli->error) . "</h4>";
    exit;
}

// Redirect back to list
header("Location: list-sneakers.php");
?>
