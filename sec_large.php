<?php

$arr = array(0.9, 3, 0, 7, 2, 1);
$mymax = max($arr);
$mymin = min($arr);
$secondMax = 0;
echo "Max Element In Array is :- " . $mymax . "<br>";
echo "Min Element In Array is :- " . $mymin . "<br>";

foreach ($arr as $a) {

    if ($a != $mymax && $a > $mymin) {
        $secondMax = $a;
        $mymin = $secondMax;
    }
}

echo "Second Largest Element is :- " . $secondMax;
?>