<?php

// Connect to database and run SQL query
include("db.php");

// If a search term is provided in the URL
if (isset($_GET['search']))
    $sql = "SELECT * FROM sneakers 
            WHERE name LIKE '%{$_GET['search']}%' 
            ORDER BY release_date";
else
    $sql = "SELECT * FROM sneakers ORDER BY release_date";

// Fetch all records, convert to JSON and return
$results = $mysqli->query($sql)->fetch_all(MYSQLI_ASSOC);
print(json_encode($results));

?>

