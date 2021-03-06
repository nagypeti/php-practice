<?php

    // Task solved using for loops with basic operations, using string concatenation
    function drawPyramidForLoop($height)
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

    // Task solved with while loop and built in str_repeat function
    function drawPyramidWhileLoop($height)
    {
        $counter = 0;
        $pyramid = array();

        while ($counter < $height) {
            $space = '&nbsp;' . str_repeat('&nbsp;&nbsp;', $height - $counter);
            $block = '*' . str_repeat('**', $counter);
            $pyramid[] = "{$space}{$block}";
            $counter++;
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
    <div class="pyramidForLoop">
        <?php foreach (drawPyramidForLoop($height) as $item) : ?>
            <p><?= $item ?></p>
        <?php endforeach; ?>
    </div>
    <div class="pyramidWhileLoop">
        <?php foreach (drawPyramidWhileLoop($height) as $item) : ?>
            <p><?= $item ?></p>
        <?php endforeach; ?>
    </div>
</body>
</html>
