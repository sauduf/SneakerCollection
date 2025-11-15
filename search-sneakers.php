<!doctype html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<h1>Search results</h1>

<?php
// Connect to database and run SQL query
include("db.php");

// Read value from form
$keywords = $_POST['keywords'] ?? '';

// Run SQL query
$sql = "SELECT * FROM sneakers
        WHERE name LIKE '%{$keywords}%'
        ORDER BY release_date";

$results = mysqli_query($mysqli, $sql);
?>

<table class="table table-striped table-hover">
    <?php while ($row = mysqli_fetch_assoc($results)): ?>
        <tr>
            <td>
                <a href="sneakers-details.php?id=<?= $row['sneaker_id'] ?>">
                    <?= $row['name'] ?>
                </a>
            </td>
            <td><?= $row['brand'] ?></td>
            <td><?= $row['price'] ?></td>
        </tr>
    <?php endwhile; ?>
</table>

</body>
</html>
