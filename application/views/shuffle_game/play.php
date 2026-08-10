<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drunk Cards Game</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/custom.css') ?>">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">


</head>

<body>
    <div class="container mt-5 text-center fade-in">
        <h1 class="game-title">Drunk Cards Game 🍻</h1>

        <?php if (!empty($card)): ?>
            <!-- Display Category Label -->
            <h4 class="text-warning">Category: <?= htmlspecialchars($card['category']); ?></h4>

            <!-- Display Question -->
            <div class="card-container mx-auto mt-3">
                <div class="card">
                    <h3><?= htmlspecialchars($card['question']); ?></h3>
                </div>
            </div>

            <!-- Button Actions -->
            <div class="btn-container">
                <form action="<?= site_url('shuffle_game_controller/next'); ?>" method="POST">
                    <button type="submit" class="btn btn-primary">Spill</button>
                    <button type="button" class="btn btn-danger" id="shotButton">Shot</button>
                    <button type="button" class="btn btn-warning" id="dareButton" style="display: none;">Dare</button>
                </form>
            </div>

        <?php else: ?>
            <!-- Redirect to Game Over Page If No More Cards -->
            <script>
                window.location.href = "<?= site_url('shuffle_game_controller/gameover'); ?>";
            </script>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.getElementById('shotButton').addEventListener('click', function() {
            document.getElementById('dareButton').style.display = 'inline-block';
        });

        document.getElementById('dareButton').addEventListener('click', function() {
            window.location.href = "<?= site_url('shuffle_game_controller/dare'); ?>";
        });
    </script>
</body>

</html>