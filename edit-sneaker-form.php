<?php
session_start();

// Connect to database
include("db.php");

// Get sneaker ID safely
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id) {
    die("Invalid sneaker ID.");
}

// Fetch sneaker details
$sql = "SELECT * FROM sneakers WHERE sneaker_id = {$id}";
$result = mysqli_query($mysqli, $sql);
$row = mysqli_fetch_assoc($result);
?>
<!doctype html>
<html lang="en">
<body>
<h1>Edit Sneaker</h1>

<form action="edit-sneaker.php" method="post">

	<input type="text" name="website" style="display:none">
    <input type="hidden" name="sneaker_id" value="<?= $row['sneaker_id'] ?>">

    <p>Brand: <input type="text" name="brand" value="<?= $row['brand'] ?>"></p>
    <p>Name: <input type="text" name="name" value="<?= $row['name'] ?>"></p>
    <p>Release Date: <input type="date" name="release_date" value="<?= $row['release_date'] ?>"></p>
    <p>Price: <input type="number" name="price" value="<?= $row['price'] ?>"></p>
    <p>Condition: <input type="text" name="shoecondition" value="<?= $row['shoecondition'] ?>"></p>
    <p>Color: <input type="text" name="color" value="<?= $row['color'] ?>"></p>
    <p>Size: <input type="number" step="0.5" name="size" value="<?= $row['size'] ?>"></p>

    <input type="submit" value="Save Changes">
</form>

<a href="list-sneakers.php"><< Back to list</a>
</body>
</html>