<!doctype html>
<html lang="en">
<body>
<h1>Edit Sneaker</h1>

<?php
// Connect to database
include("db.php");

// Get sneaker ID from URL
$id = $_GET['id'];

// Fetch sneaker details
$sql = "SELECT * FROM sneakers WHERE sneaker_id = {$id}";
$result = mysqli_query($mysqli, $sql);
$row = mysqli_fetch_assoc($result);
?>

<form action="edit-sneaker.php" method="post">
  <input type="hidden" name="id" value="<?= $row['sneaker_id'] ?>">

  <p>Brand: <input type="text" name="Brand" value="<?= $row['brand'] ?>"></p>
  <p>Name: <input type="text" name="SneakerName" value="<?= $row['name'] ?>"></p>
  <p>Release Date: <input type="date" name="ReleaseDate" value="<?= $row['release_date'] ?>"></p>
  <p>Price: <input type="number" name="Price" value="<?= $row['price'] ?>"></p>
  <p>Condition: <input type="text" name="ShoeCondition" value="<?= $row['shoecondition'] ?>"></p>
  <p>Color: <input type="text" name="Color" value="<?= $row['color'] ?>"></p>
  <p>Size: <input type="number" step="0.5" name="Size" value="<?= $row['size'] ?>"></p>

  <input type="submit" value="Save Changes">
</form>

<a href="list-sneakers.php"><< Back to list</a>
</body>
</html>