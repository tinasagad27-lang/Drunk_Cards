<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Welcome to the Admin Dashboard</h1>
        <p>You are logged in as an admin.</p>
        <a href="<?= site_url('shuffle_game_controller/create'); ?>" class="btn btn-primary">Create Shuffle Card</a>
        <a href="<?= site_url('admin_controller/logout'); ?>" class="btn btn-danger">Logout</a>

        <h2 class="mt-4">Shuffle Cards List</h2>
        <table id="cardsTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Question</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($cards)) : ?>
                    <?php foreach ($cards as $card) : ?>
                        <tr>
                            <td><?php echo $card['id']; ?></td>
                            <td><?php echo $card['question']; ?></td>
                            <td><?php echo $card['category']; ?></td>
                            <td>
                                <a href="<?= site_url('shuffle_game_controller/edit/' . $card['id']); ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="<?= site_url('shuffle_game_controller/delete/' . $card['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?');">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="4">No cards found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#cardsTable').DataTable();
        });
    </script>
</body>
</html>
