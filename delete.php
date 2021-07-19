<?php
$tasks = file_get_contents('tasks.json');
$tasksArray = json_decode($tasks, true);

$taskName = $_POST['task_name'];
unset( $tasksArray[$taskName] );

file_put_contents('tasks.json', json_encode($tasksArray, JSON_PRETTY_PRINT));

header('Location: index.php');