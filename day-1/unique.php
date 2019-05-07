<?php

$input = [1, 11, 34, 11, 52, 61, 1, 34];

function unique($array)
{
    $temp_array = array();
    $i = 0;
    
    foreach ($array as $val) {
        if (!in_array($val, $temp_array)) {
            $temp_array[] = $val;
        }
        $i++;
    }
    return $temp_array;
}

echo '<pre>', var_dump(unique($input)), '</pre';

?>