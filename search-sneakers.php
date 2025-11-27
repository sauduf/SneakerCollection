<!doctype html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="p-4">

<h1>Search results</h1>

<?php
include("db.php");

// Read and filter inputs (lecture method)
$keywords  = filter_input(INPUT_POST, "keywords", FILTER_SANITIZE_SPECIAL_CHARS);
$brand     = filter_input(INPUT_POST, "brand", FILTER_SANITIZE_SPECIAL_CHARS);
$color     = filter_input(INPUT_POST, "color", FILTER_SANITIZE_SPECIAL_CHARS);
$max_price = filter_input(INPUT_POST, "max_price", FILTER_VALIDATE_FLOAT);

// Start SQL
$sql = "SELECT * FROM sneakers WHERE 1=1";

if ($keywords) {
    $sql .= " AND name LIKE '%{$keywords}%'";
}

if ($brand) {
    $sql .= " AND brand LIKE '%{$brand}%'";
}

if ($color) {
    $sql .= " AND color LIKE '%{$color}%'";
}

if ($max_price !== false && $max_price !== null && $max_price !== '') {
    $sql .= " AND price <= {$max_price}";
}

$sql .= " ORDER BY release_date";

// Run query
$results = mysqli_query($mysqli, $sql);

if (!$results) {
    die("SQL ERROR: " . $mysqli->error);
}
?>

<table class="table table-striped table-hover">

<?php while ($row = mysqli_fetch_assoc($results)): ?>
    <tr>
        <td><?= htmlspecialchars($row['brand']) ?></td>

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