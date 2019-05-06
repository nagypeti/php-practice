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

echo $getTodo();
$id;

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
}

$selectedTask = mysqli_query($link, "SELECT * FROM todos WHERE id=$id");

if (isset($_POST['edit'])) {
    mysqli_query($link, "UPDATE todos SET task = $task WHERE id=$id");
    header('location: index.php');
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit todo</title>
</head>
<body>
    <form action="edit.php" method="POST">
        <label for="task">Edit task:</label>
        <?php echo '<input type="text" name="task" id="task" value="'.$selectedTask['task'].'">' ?>
        <button type="submit" name="edit">Edit</button>
    </form>
</body>
</html>