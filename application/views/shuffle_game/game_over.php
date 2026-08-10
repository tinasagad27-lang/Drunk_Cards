<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Over</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="d-flex flex-column justify-content-center align-items-center vh-100">
    <div class="text-center">
        <h1 class="display-4">Game Over!</h1>
        <p class="lead">You have answered all cards in this category.</p>
        <a href="<?= site_url('shuffle_game_controller'); ?>" class="btn btn-primary mt-3">Choose Another Category</a>
        <p class="mt-4">For more inquiry, message me at <a href="mailto:tinasagad0@gmail.com">tinasagad0@gmail.com</a>.</p>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>