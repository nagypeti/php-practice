<?php

$massInKg = 81.2;
$heightInM = 1.78;

$bmi = function($massInKg, $heightInMeter) {
    return number_format($massInKg / ($heightInMeter ** 2), 2);
};

echo "Your bmi index is: {$bmi($massInKg, $heightInM)}";
