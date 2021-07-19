<?php
// var_dump($_POST);

$tasks = file_get_contents('tasks.json');
$tasksArray = json_decode($tasks, true);

$taskName = $_POST['task_name'];
$tasksArray[$taskName]['completed'] = ! $tasksArray[$taskName]['completed'];

file_put_contents('tasks.json', json_encode($tasksArray, JSON_PRETTY_PRINT));

header('Location: index.php');