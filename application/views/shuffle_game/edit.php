<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Card</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Edit Card</h1>
        <form action="<?= site_url('shuffle_game_controller/update/' . $card['id']); ?>" method="post">
            <div class="form-group">
                <label for="question">Question:</label>
                <input type="text" class="form-control" id="question" name="question" value="<?= set_value('question', $card['question']); ?>" required>
            </div>
            <div class="form-group">
                <label for="category">Category:</label>
                <select class="form-control" id="category" name="category" required>
                    <option value="+18 adults question" <?= $card['category'] === '+18 adults question' ? 'selected' : ''; ?>>+18 Adults</option>
                    <option value="drunk question" <?= $card['category'] === 'drunk question' ? 'selected' : ''; ?>>Drunk Question</option>
                    <option value="comfort question" <?= $card['category'] === 'comfort question' ? 'selected' : ''; ?>>Comfort Question</option>
                    <option value="for single only question" <?= $card['category'] === 'for single only question' ? 'selected' : ''; ?>>For Single Only</option>
                    <option value="random question" <?= $card['category'] === 'random question' ? 'selected' : ''; ?>>Random</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="<?= site_url('admin_controller/dashboard'); ?>" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>