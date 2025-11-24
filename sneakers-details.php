<?php
// Connect to database and run SQl query
include("db.php");

// Grab id value from URL
$id = filter_var($_GET['id'], FILTER_VALIDATE_INT);

// If page is invalid stop the page
if ($id === false) {
    echo "<h2>Invalid sneaker ID.</h2>";
    exit;
}

$sql = "SELECT * FROM sneakers WHERE sneaker_id = {$id}";
$rst = mysqli_query($mysqli, $sql);
$row = mysqli_fetch_assoc($rst);
?>

<h1><?= $row['brand'] . " " . $row['name'] ?></h1>

<p>
    <strong>Release Date:</strong> <?= $row['release_date'] ?><br>
    <strong>Price:</strong> £<?= $row['price'] ?><br>
    <strong>Condition:</strong> <?= $row['shoecondition'] ?><br>
    <strong>Color:</strong> <?= $row['color'] ?><br>
    <strong>Size:</strong> <?= $row['size'] ?>
</p>

<a href="delete-sneaker.php?id=<?= htmlspecialchars($row['sneaker_id']) ?>" style="color:red;">
<a href="list-sneakers.php">&lt;&lt; Back to list</a>