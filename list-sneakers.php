<!doctype html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h1>Welcome to my Sneakers Collection</h1>

    <a href="add-sneaker-form.php" class="btn btn-primary">Add a Sneaker</a>
    
    <?php
    // Connect to database
    include("db.php");
    
    // Run SQL Query
    $sql = "SELECT * FROM sneakers ORDER BY release_date";
    $results = mysqli_query($mysqli, $sql);
    ?>

    <table class="table table-striped table-hover">
        <?php while($row = mysqli_fetch_assoc($results)): ?>
        <tr>
            <td><?= $row['brand'] ?></td>
            <td><a href="sneakers-details.php?id=<?=$row['sneaker_id']?>"><?=$row['name']?></a></td>
            <td><?= $row['price'] ?></td>
			<td><a href="edit-sneaker-form.php?id=<?= $row['sneaker_id'] ?>" class="btn btn-warning btn-sm">Edit</a></td>
			<td><a href="delete-sneaker.php?id=<?= $row['sneaker_id'] ?>" class="btn btn-danger btn-sm">Delete</a></td>
        </tr>
        <?php endwhile; ?>
    </table>

</body>
</html>

