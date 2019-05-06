<?php 

$input = [3, 4, 5, 6, 7];

function reverseArray($array) {
    $reverse = [];
    $length = count($array);
    for ($i = $length - 1; $i >= 0 ; $i--) { 
        $reverse[] = $array[$i];
    }
    return $reverse;
}

echo '<pre>', var_dump($input), '</pre';
echo '<pre>', var_dump(reverseArray($input)), '</pre';
echo '<pre>', var_dump(array_reverse($input)), '</pre';