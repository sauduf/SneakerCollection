<!doctype html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="p-4">

<h1>Search results</h1>

<?php
include("db.php");

// Read values safely (avoid warnings)
$keywords  = $_POST['keywords']  ?? '';
$brand     = $_POST['brand']     ?? '';
$color     = $_POST['color']     ?? '';
$max_price = $_POST['max_price'] ?? '';


// Start SQL
$sql = "SELECT * FROM sneakers WHERE 1=1";

// Add filters only if the user typed something
if ($keywords !== '') {
    $sql .= " AND name LIKE '%$keywords%'";
}

if ($brand !== '') {
    $sql .= " AND brand LIKE '%$brand%'";
}

if ($color !== '') {
    $sql .= " AND color LIKE '%$color%'";
}

if ($max_price !== '') {
    $sql .= " AND price <= $max_price";
}

$sql .= " ORDER BY release_date";

$results = mysqli_query($mysqli, $sql);
?>

<table class="table table-striped table-hover">

<?php while ($row = mysqli_fetch_assoc($results)): ?>
    <tr>
        <td><?= $row['brand'] ?></td>

        <td>
            <a href="sneakers-details.php?id=<?= $row['sneaker_id'] ?>">
                <?= $row['name'] ?>
            </a>
        </td>

        <td><?= $row['color'] ?></td>
        <td><?= $row['price'] ?></td>
    </tr>
<?php endwhile; ?>

</table>

<a href="list-sneakers.php" class="btn btn-secondary">Back</a>

</body>
</html>