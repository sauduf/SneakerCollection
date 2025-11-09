<?php
$mysqli = new mysqli("localhost", "2446235", "Pakistan@123@", "db2446235");

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}
?>
