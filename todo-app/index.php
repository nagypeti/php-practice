<?php

$hostname = 'localhost';
$username = 'todouser';
$password = 'Yu5KazuUM#9#wzA';
$database = 'todo';
$port = '3306';

$link = mysqli_connect("$hostname", "$username", "$password", "$database", "$port");

$tasks = mysqli_query($link, "SELECT * FROM todos");

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link href = "https://fonts.googleapis.com/icon?family=Material+Icons" rel = "stylesheet">
    <title>iTodo</title>
</head>
<body>
    <h1>List of Todos:</h1>
    <form action="process.php" method="POST">
        <label for="task">What is your task?</label>
        <input type="text" name="task" id="task">
        <button type="submit" name="submit">Save</button>
    </form>
    <table>
        <tr class="thead">
            <td class="task">Task</td>
            <td class="delete">Delete</td>
            <td class="edit">Edit</td>
        </tr>
        <?php while ($row = mysqli_fetch_array($tasks)) { ?>
            <tr>
                <td class="task"><?php echo $row['task']; ?></td>
                <td class="delete">
                    <a href="process.php?del_task=<?php echo $row['id']; ?>"><i class = "material-icons">delete</i></a>
                </td>
                <td class="edit">
                    <a href="edit.php?edit_task=<?php echo $row['id']; ?>"><i class = "material-icons">create</i></a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
