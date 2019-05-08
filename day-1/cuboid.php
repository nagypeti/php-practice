<?php

    $calcVolume = function($length, $width, $height) {
        return ($length * $width * $height);
    };

    $calcSurface = function($length, $width, $height) {
        return (2 * $width * $length) + (2 * $length * $height) + (2* $height * $width);
    };

    if(isset($_POST['calculate'])) {
        $volume = $calcVolume($_POST['length'], $_POST['width'], $_POST['height']);
        $surface = $calcSurface($_POST['length'], $_POST['width'], $_POST['height']);
    }
    
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Calculate the surface and the volume of a cuboid:</h1>
    <?php if(!isset($_POST['calculate'])) { ?>
        <?= "<p>Please provide input!</p>"; ?>
    <?php } ?>
    <?php if(isset($_POST['calculate'])) { ?>
        <?= "<h1>The volume of your cuboid: $volume</h1>"; ?>
        <?= "<h1>The surface of your cuboid: $surface</h1>"; ?>
    <?php } ?>
    <form method="post">
        <label for="length">Length:</label>
        <input type="text" name="length" id="length" required>
        <label for="height">Heigth:</label>
        <input type="text" name="height" id="height" required>
        <label for="width">Width:</label>
        <input type="text" name="width" id="width" required>
        <button type="submit" name="calculate">Calculate, please!</button>
    </form>
</body>
</html>