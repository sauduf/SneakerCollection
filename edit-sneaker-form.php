<?php
session_start();
$_SESSION['loggedin'] = true;

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
    <input type="hidden" name="sneaker_id" value="<?= htmlspecialchars($row['sneaker_id']) ?>">


    <p>Brand: <input type="text" name="brand" value="<?= htmlspecialchars($row['brand']) ?>"></p>
    <p>Name: <input type="text" name="name" value="<?= htmlspecialchars($row['name']) ?>"></p>
    <p>Release Date: <input type="date" name="release_date" value="<?= htmlspecialchars($row['release_date']) ?>"></p>
    <p>Price: <input type="number" name="price" value="<?= htmlspecialchars($row['price']) ?>"></p>
    <p>Condition: <input type="text" name="shoecondition" value="<?= htmlspecialchars($row['shoecondition']) ?>"></p>
    <p>Color: <input type="text" name="color" value="<?= htmlspecialchars($row['color']) ?>"></p>
    <p>Size: <input type="number" step="0.5" name="size" value="<?= htmlspecialchars($row['size']) ?>"></p>

    <input type="submit" value="Save Changes">
</form>

<a href="list-sneakers.php"><< Back to list</a>
</body>
</html>