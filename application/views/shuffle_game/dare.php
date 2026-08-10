<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dare</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/dare.css'); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;600&display=swap" rel="stylesheet">
   
</head>
<body>
    <div class="container fade-in">
        <h1 class="mb-4">Your Dare</h1>
        <div class="card">
            <div class="card-body">
                <h2 class="card-title"><?= $dare; ?></h2>
                <a href="<?= site_url('shuffle_game_controller/next'); ?>" class="btn btn-primary mt-4">Next</a>
            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
</body>
</html>
