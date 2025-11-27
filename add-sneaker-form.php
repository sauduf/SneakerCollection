<?php
session_start();
$_SESSION['loggedin'] = true; // auto-login for submission
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add a Sneaker</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
      crossorigin="anonymous"
    >
  </head>

  <body>
    <div class="container mt-4">
      <h1>Add a Sneaker</h1>

      <form action="add-sneaker.php" method="post">
	  
	   <input type="text" name="website" style="display:none">
	   
        <div class="mb-3">
          <label for="Brand" class="form-label">Brand</label>
          <input type="text" class="form-control" id="Brand" name="Brand" required>
        </div>

        <div class="mb-3">
          <label for="SneakerName" class="form-label">Sneaker Name</label>
          <input type="text" class="form-control" id="SneakerName" name="SneakerName" required>
        </div>

        <div class="mb-3">
          <label for="ReleaseDate" class="form-label">Release Date</label>
          <input type="date" class="form-control" id="ReleaseDate" name="ReleaseDate" required>
        </div>

        <div class="mb-3">
          <label for="Price" class="form-label">Price ($)</label>
          <input type="number" step="0.01" class="form-control" id="Price" name="Price" required>
        </div>

        <div class="mb-3">
          <label for="ShoeCondition" class="form-label">Condition</label>
          <input type="text" class="form-control" id="ShoeCondition" name="ShoeCondition" required>
        </div>

        <div class="mb-3">
          <label for="Color" class="form-label">Color</label>
          <input type="text" class="form-control" id="Color" name="Color" required>
        </div>

        <div class="mb-3">
          <label for="Size" class="form-label">Size (US)</label>
          <input type="number" step="0.5" class="form-control" id="Size" name="Size" required>
        </div>

        <input type="submit" class="btn btn-primary" value="Add Sneaker">
      </form>

      <div class="mt-3">
        <a href="list-sneakers.php" class="btn btn-secondary">&lt;&lt; Back to List</a>
      </div>

    </div>
  </body>
</html>