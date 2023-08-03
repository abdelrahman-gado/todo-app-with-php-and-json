<?php

$todos = [];
if (file_exists(__DIR__ . "/todo.json")) {
    $json = file_get_contents(__DIR__ . "/todo.json");
    $todos = json_decode($json, true);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="newtodo.php" method="POST">
        <input type="text" name="todo_name" placeholder="Enter your todo">
        <button>New Todo</button>
    </form>

    <br>

    <?php foreach ($todos as $todoName => $todo): ?>
        <div style="margin-bottom: 20px">
            <form action="change_status.php" method="POST" style="display: inline-block;">
                <input type="hidden" name="todo_name" value="<?= $todoName ?>">
                <input type="checkbox" <?php if ($todo['completed']): ?>checked<?php endif; ?>>
            </form>
            <?= $todoName ?>
            <form action="delete.php" method="POST" style="display: inline-block;">
                <input type="hidden" name="todo_name" value="<?= $todoName ?>">
                <button>delete</button>
            </form>
        </div>
    <?php endforeach; ?>

    <script>
        const checkboxes = document.querySelectorAll("input[type=checkbox]");
        checkboxes.forEach(ch => {
            ch.onclick = function (e) {
                this.parentNode.submit();
            }
        });
    </script>
</body>

</html>