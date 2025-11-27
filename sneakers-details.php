<?php
session_start();

// Protection of session
if (!isset($_SESSION['loggedin'])) {
    die("Access denied.");
}

// Connect to database and run SQl query
include("db.php");

// Grab id value from URL
$id = filter_var($_GET['id'], FILTER_VALIDATE_INT);

// If page is invalid stop the page
if (!$id) {
    echo "<h2>Invalid sneaker ID.</h2>";
    exit;
}

$sql = "SELECT * FROM sneakers WHERE sneaker_id = {$id}";
$rst = mysqli_query($mysqli, $sql);
$row = mysqli_fetch_assoc($rst);

// If no record found
if (!$row) {
    echo "<h2>Sneaker not found.</h2>";
    exit;
}
?>

<h1><?= htmlspecialchars($row['brand']) . " " . htmlspecialchars($row['name']) ?></h1>

<p>
    <strong>Release Date:</strong> <?= htmlspecialchars($row['release_date']) ?><br>
    <strong>Price:</strong> £<?= htmlspecialchars($row['price']) ?><br>
    <strong>Condition:</strong> <?= htmlspecialchars($row['shoecondition']) ?><br>
    <strong>Color:</strong> <?= htmlspecialchars($row['color']) ?><br>
    <strong>Size:</strong> <?= htmlspecialchars($row['size']) ?>
</p>

<a href="delete-sneaker.php?id=<?= htmlspecialchars($row['sneaker_id']) ?>" style="color:red;">
</a>
<br><br>
<a href="list-sneakers.php">&lt;&lt; Back to list</a>