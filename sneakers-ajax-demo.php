<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Ajax Sneaker Demo</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
rel="stylesheet">
</head>

<body>
<div class="container mt-4">
    <h1>Ajax Sneaker Demo</h1>

    <div class="dropdown" id="myDropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button"
                data-bs-toggle="dropdown" aria-expanded="false">
            Load Sneakers
        </button>

        <ul class="dropdown-menu" id="myList"></ul>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

<script>
// When dropdown is opened
const myDropdown = document.getElementById('myDropdown')

myDropdown.addEventListener('show.bs.dropdown', event => {
    const myList = document.getElementById('myList')

    // Spinner while loading
    myList.innerHTML = `
        <div class="spinner-border m-3" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    `;

    // Fetch AJAX data
    fetch('ajax-sneakers.php')
        .then(response => response.json())
        .then(response => {
            myList.innerHTML = '';

            // Loop through sneaker data + add to list
            response.forEach(s => {
                var li = document.createElement("li");
                var a = document.createElement("a");

                a.innerHTML = s.name + " (" + s.brand + ")";
                a.href = "sneakers-details.php?id=" + s.sneaker_id;
                a.classList.add("dropdown-item");

                li.appendChild(a);
                myList.appendChild(li);
            });
        });
});
</script>

</body>
</html>
