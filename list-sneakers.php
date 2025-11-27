<?php
session_start();
$_SESSION['loggedin'] = true; 
?>

<!doctype html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="p-4">

<h1>Welcome to my Sneakers Collection</h1>

<a href="add-sneaker-form.php" class="btn btn-primary mb-3">Add a Sneaker</a>

<!-- ==========================
     AJAX LIVE SEARCH (OPTION A)
=========================== -->
<input type="text" id="liveSearch" class="form-control mb-4"
       placeholder="Live search... (type Nike, Jordan, etc.)">

<!-- ==========================
     ADVANCED SEARCH FORM (OPTION B)
=========================== -->
<h4>Advanced Search</h4>
<form action="search-sneakers.php" method="post" class="mb-4">

    <div class="row g-2">

        <div class="col-md-3">
            <input type="text" class="form-control" 
                   name="keywords" placeholder="Name">
        </div>

        <div class="col-md-2">
            <input type="text" class="form-control" 
                   name="brand" placeholder="Brand">
        </div>

        <div class="col-md-2">
            <input type="text" class="form-control"
                   name="color" placeholder="Color">
        </div>

        <div class="col-md-2">
            <input type="number" class="form-control"
                   name="max_price" placeholder="Max Price">
        </div>

        <div class="col-md-3">
            <button type="submit" class="btn btn-dark w-100">Search</button>
        </div>

    </div>

</form>



<!-- ==========================
     TABLE OF SNEAKERS
=========================== -->
<table class="table table-striped table-hover" id="sneakerTable">

    <?php
    include("db.php");

    $sql = "SELECT * FROM sneakers ORDER BY release_date";
    $results = mysqli_query($mysqli, $sql);

    while ($row = mysqli_fetch_assoc($results)):
    ?>
        <tr>
            <td><?= htmlspecialchars($row['brand']) ?></td>
            <td><a href="sneakers-details.php?id=<?= $row['sneaker_id'] ?>">
                <?= $row['name'] ?>
            </a></td>
            <td><?= $row['price'] ?></td>
            <td><a href="edit-sneaker-form.php?id=<?= $row['sneaker_id'] ?>" 
                   class="btn btn-warning btn-sm">Edit</a></td>
            <td><a href="delete-sneaker.php?id=<?= $row['sneaker_id'] ?>" 
                   class="btn btn-danger btn-sm">Delete</a></td>
        </tr>
    <?php endwhile; ?>

</table>


<!-- ==========================
     AJAX SCRIPT
=========================== -->
<script>
document.getElementById("liveSearch").addEventListener("keyup", function () {

    let term = this.value;

    fetch("ajax-search.php?term=" + term)
        .then(response => response.json())
        .then(data => {

            const table = document.getElementById("sneakerTable");
            table.innerHTML = "";

            data.forEach(s => {

                table.innerHTML += `
                    <tr>
                        <td>${s.brand}</td>
                        <td><a href="sneakers-details.php?id=${s.sneaker_id}">
                            ${s.name}
                        </a></td>
                        <td>${s.price}</td>
                        <td><a href="edit-sneaker-form.php?id=${s.sneaker_id}"
                            class="btn btn-warning btn-sm">Edit</a></td>
                        <td><a href="delete-sneaker.php?id=${s.sneaker_id}"
                            class="btn btn-danger btn-sm">Delete</a></td>
                    </tr>
                `;
            });
        });
});
</script>

</body>
</html>