<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shuffle Game</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;600&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url('assets/css/index.css') ?>">
    
</head>
<body>
    <nav>
        <ul class="nav justify-content-center p-3">
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('admin_controller/login'); ?>">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('shuffle_game_controller'); ?>">Shuffle Game</a>
            </li>
        </ul>
    </nav>

    <div class="container text-center fade-in">
        <h1 class="mb-4">Drunk Cards Game</h1>
        <form action="<?= site_url('shuffle_game_controller/shuffle'); ?>" method="POST">
            <div class="form-group text-left">
                <label for="category">Select Category:</label>
                <select class="form-control" id="category" name="category" required>
                    <option value="">-- Select a Category --</option>
                    <option value="+18 adults question">+18 Adults</option>
                    <option value="drunk question">Drunk Question</option>
                    <option value="comfort question">Comfort Question</option>
                    <option value="for single only question">For Single Only</option>
                    <option value="random question">Random</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-4">Start Game</button>
        </form>
    </div>

    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this card?');
        }

        const toggleBtn = document.getElementById('toggleTable');
        if (toggleBtn) {
            toggleBtn.addEventListener('click', function () {
                var table = document.getElementById('cardsTable');
                if (table.style.display === 'none') {
                    table.style.display = 'block';
                } else {
                    table.style.display = 'none';
                }
            });
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
