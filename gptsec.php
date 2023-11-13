<?php

$arr = array(12, 3, -6, -7, -5);
$max = max($arr); 
$secondMax = min($arr);
echo $secondMax;

foreach ($arr as $a) {
    if ($a != $max && $a > $secondMax) {
        $secondMax = $a;  // Update second maximum if the current element is greater than the current second maximum
    }
}

if ($secondMax !== $secondMax) {
    echo "Second Largest Element is: " . $secondMax;
} else {
    echo "No valid second largest element found.";
}

?>
