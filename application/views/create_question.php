<!DOCTYPE html>
<html>
<head>
    <title>Create Question</title>
</head>
<body>
    <h1>Create a New Question</h1>
    <form action="<?php echo site_url('admin_controller/create_question'); ?>" method="post">
        <label for="question">Question:</label>
        <input type="text" id="question" name="question" required>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
