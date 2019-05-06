<?php

$input = [3, 4, 5, 6, 7];

$sumElements = function($array) {
    foreach ($array as $item) {
        $sum += $item;
    }
    return $sum;
};

echo '<p>Sum of content: '. $sumElements($input) . '</p>';
echo '<p>Sum of content: '. $sum = array_sum($input) . '</p>';

?>