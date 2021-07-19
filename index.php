<?php
$todos = [];
if ( file_exists('tasks.json') ) {
    $todos = file_get_contents('tasks.json');
    $todos = json_decode($todos, true);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo App with File System in PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="todos_app">
        <div class="todos_form">
            <form action="add.php" method="POST">
                <label for="task">Add New Task</label>
                <input type="text" name="task" id="task" placeholder="Enter your task here ..." />

                <input class="todo_btn" type="submit" value="+ Add" />
            </form>
        </div>
        <div class="todos_result">
            <?php foreach ($todos as $todoKey => $todoValue) : ?>
                <div class="todos_items">
                    <form action="markdone.php" method="POST">
                        <input type="hidden" name="task_name" value="<?php echo $todoKey; ?>" />
                        <input type="checkbox" <?php echo $todoValue['completed'] ? 'checked' : ''; ?> />
                    </form>
                    <h4><?php echo $todoKey; ?></h4>
                    <form action="delete.php" method="POST">
                        <input type="hidden" name="task_name" value="<?php echo $todoKey; ?>" />
                        <button type="submit">X</button>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <script>
        // 1
        let xhr = new XMLHttpRequest();
        // 2
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4){
                // window.location.href = 'index.php';
            }
        };
        // 3
        xhr.open('POST', 'add.php');
        // 4
        xhr.send()

        // Mark Done
        const checkboxes = document.querySelectorAll('input[type=checkbox]');
        checkboxes.forEach(checkbox => {
            checkbox.onclick = function() {
                this.parentNode.submit();
            };
        });
    </script>
</body>
</html>