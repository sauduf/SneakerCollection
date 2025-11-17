<?php
include("db.php");

// Read filter inputs
$term       = $_GET['term'] ?? '';
$brand      = $_GET['brand'] ?? '';
$max_price  = $_GET['max_price'] ?? '';
$color      = $_GET['color'] ?? '';
$date       = $_GET['release_date'] ?? '';

// Start SQL
$sql = "SELECT * FROM sneakers WHERE 1=1";

// Add filters IF they were provided
if ($term !== '')
    $sql .= " AND name LIKE '%{$term}%'";

if ($brand !== '')
    $sql .= " AND brand LIKE '%{$brand}%'";

if ($max_price !== '')
    $sql .= " AND price <= {$max_price}";

if ($color !== '')
    $sql .= " AND color LIKE '%{$color}%'";

if ($date !== '')
    $sql .= " AND release_date >= '{$date}'";

$sql .= " ORDER BY release_date";

$results = $mysqli->query($sql)->fetch_all(MYSQLI_ASSOC);

echo json_encode($results);
?>