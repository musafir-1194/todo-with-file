<?php

$task = $_POST['task'] ?? '';
$task = trim($task);

if ( $task ) 
{
    if ( file_exists('tasks.json') ) {
        // var_dump($task);
        $all_tasks = file_get_contents('tasks.json');
        $all_tasks = json_decode($all_tasks, true);
    } else {
        $all_tasks = [];
    }

    $all_tasks[$task] = [
        'completed' => false
    ];

    file_put_contents('tasks.json', json_encode($all_tasks, JSON_PRETTY_PRINT));

    // echo '<pre>'; print_r($all_tasks);
} 
// else 
// {
//     echo 'Ops!';
// }
header('location: index.php');