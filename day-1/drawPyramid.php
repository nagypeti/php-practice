<?php

function drawPyramid($height)
{
    $pyramid = [];
    for ($i = 0; $i < $height; $i++) {
        $line = '&nbsp;';
        for ($j = 0; $j < $height - $i; $j++) {
            $line = "{$line}&nbsp;&nbsp;";
        }
        $line = "{$line}*";
        for ($k = 0; $k < $i; $k++) {
            $line = "{$line}**";
        }
        $pyramid[] = $line;
    }
    return $pyramid;
}

if (isset($_GET['height'])) {
    $height = $_GET['height'];
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
    <h1>Let's build a pyramid!</h1>
    <form>
        <label for="height">How tall shoud it be?</label>
        <input type="text" name="height" id="height">
        <button type="submit">Build it!</button>
    </form>
    <div class="pyramid">
        <?php foreach (drawPyramid($height) as $item) {?>
            <p><?php echo $item ?></p>
        <?php }?>
    </div>
</body>
</html>
