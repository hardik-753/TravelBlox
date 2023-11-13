<?php

$str1 = "feet";
$str2 = "foot";

for($i=0;$i<strlen($str1);$i++)
{
    $match = false;

    for($j=0;$j<strlen($str2);$j++)
    {
        if($str1[$i] == $str2[$j])
        {
            $match = true;
            break;
        }
    }
    if($match == false)
    echo $str1[$i];
}

for($i=0;$i<strlen($str2);$i++)
{
    $match = false;

    for($j=0;$j<strlen($str1);$j++)
    {
        if($str2[$i] == $str1[$j])
        {
            $match = true;
            break;
        }
    }
    if($match == false)
    echo $str2[$i];
}

?>