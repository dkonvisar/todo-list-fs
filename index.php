<?php

$file_name = 'todo.json';
$todos = [];

if (file_exists($file_name)) {
    $json = file_get_contents($file_name);
    $todos = json_decode($json, true);
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To Do</title>
</head>
<body>

<form action="new_todo.php" method="post">
    <input type="text" name="todo_name" placeholder="Enter you code">
    <button>New Todo</button>
</form>
<br>

<?php foreach ($todos as $todo_name => $todo): ?>
    <div style="margin-bottom: 20px">
        <form style="display: inline-block" action="change_status.php" method="post">
            <input type="hidden" name="todo_name" value="<?php echo $todo_name ?>">
            <input type="checkbox" <?php echo $todo['completed'] ? 'checked' : ''; ?>>
        </form>
        <?php echo $todo_name ?>
        <form style="display: inline-block" action="delete.php" method="post">
            <input type="hidden" name="todo_name" value="<?php echo $todo_name ?>">
            <button>Delete</button>
        </form>
    </div>
<?php endforeach; ?>

<script>
    const checkboxes = document.querySelectorAll('input[type=checkbox');
    checkboxes.forEach(function (item) {
        item.addEventListener('click', function (e) {
            e.target.closest('form').submit();
        })
    })
</script>
</body>
</html>