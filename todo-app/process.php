<?php

$hostname = 'localhost';
$username = 'todouser';
$password = 'Yu5KazuUM#9#wzA';
$database = 'todo';
$port = '3306';

$link = mysqli_connect("$hostname", "$username", "$password", "$database", "$port");

if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}

if (isset($_POST['submit'])) {
    $task = $_POST['task'];
    mysqli_query($link, "INSERT INTO todos VALUES (NULL, '$task')");
    header('location: index.php');
}

if(isset($_GET['del_task'])) {
    $id = $_GET['del_task'];
    mysqli_query($link, "DELETE FROM todos WHERE id=$id");
    header('location: index.php');
}
